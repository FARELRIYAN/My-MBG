<?php

namespace App\Repositories;

use App\Interfaces\SchoolRepositoryInterface;
use App\Models\School;

class SchoolRepository implements SchoolRepositoryInterface
{
    public function getAll()
    {
        return School::all();
    }

    public function getById($id)
    {
        return School::findOrFail($id);
    }

    public function create(array $data)
    {
        return School::create($data);
    }

    public function update($id, array $data)
    {
        $school = School::findOrFail($id);
        $school->update($data);
        return $school;
    }

    public function delete($id)
    {
        $school = School::findOrFail($id);
        return $school->delete();
    }
}
