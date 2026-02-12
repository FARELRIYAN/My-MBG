<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use App\Interfaces\ComplaintRepositoryInterface;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    private ComplaintRepositoryInterface $complaintRepository;

    public function __construct(ComplaintRepositoryInterface $complaintRepository)
    {
        $this->complaintRepository = $complaintRepository;
    }

    public function index()
    {
        $complaints = $this->complaintRepository->getAllComplaints();
        return view('pengaduan.complaints.index', compact('complaints'));
    }

    public function edit($id)
    {
        $complaint = $this->complaintRepository->getComplaintById($id);
        return view('pengaduan.complaints.edit', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,process,done',
            'response_note' => 'required|string',
        ]);

        $this->complaintRepository->updateComplaintStatus($id, $data);

        return redirect()->route('pengaduan.complaints.index')->with('success', 'Complaint updated successfully.');
    }

    public function destroy($id)
    {
        $this->complaintRepository->deleteComplaint($id);
        return redirect()->route('pengaduan.complaints.index')->with('success', 'Complaint deleted successfully.');
    }
}
