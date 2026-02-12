<?php

namespace App\Interfaces;

interface ComplaintRepositoryInterface
{
    public function getAllComplaints();
    public function createComplaint(array $data);
    public function getComplaintById($id);
    public function updateComplaintStatus($id, array $data);
    public function deleteComplaint($id);
}
