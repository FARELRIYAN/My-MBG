<?php

namespace App\Repositories;

use App\Interfaces\ComplaintRepositoryInterface;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class ComplaintRepository implements ComplaintRepositoryInterface
{
    public function getAllComplaints()
    {
        return Complaint::latest()->get();
    }

    public function createComplaint(array $data)
    {
        // Handle Photo Upload
        if (isset($data['photo_evidence']) && $data['photo_evidence'] instanceof \Illuminate\Http\UploadedFile && $data['photo_evidence']->isValid()) {
            $photoPath = $data['photo_evidence']->store('complaint_evidence', 'public');
            $data['photo_evidence'] = \Illuminate\Support\Facades\Storage::url($photoPath);
        }

        // Generate Ticket Code
        $data['ticket_code'] = 'TICKET-' . strtoupper(\Illuminate\Support\Str::random(8));
        $data['status'] = 'pending';

        return Complaint::create($data);
    }

    public function getComplaintById($id)
    {
        return Complaint::findOrFail($id);
    }

    public function updateComplaintStatus($id, array $data)
    {
        $complaint = Complaint::findOrFail($id);

        // Auto fill responder_id with current logged in user
        $data['responder_id'] = Auth::id();

        $complaint->update($data);
        return $complaint;
    }

    public function deleteComplaint($id)
    {
        return Complaint::destroy($id);
    }
}
