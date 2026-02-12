<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\SchoolRepositoryInterface;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected $schoolRepository;

    public function __construct(SchoolRepositoryInterface $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function index()
    {
        $schools = $this->schoolRepository->getAll();
        return view('admin.schools.index', compact('schools'));
    }

    public function create()
    {
        return view('admin.schools.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'total_students' => 'required|integer|min:1',
            'phone' => 'nullable|string|max:20',
        ]);

        $this->schoolRepository->create($data);

        return redirect()->route('admin.schools.index')->with('success', 'School created successfully.');
    }

    public function edit($id)
    {
        $school = $this->schoolRepository->getById($id);
        return view('admin.schools.edit', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'total_students' => 'required|integer|min:1',
            'phone' => 'nullable|string|max:20',
        ]);

        $this->schoolRepository->update($id, $data);

        return redirect()->route('admin.schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        $this->schoolRepository->delete($id);
        return redirect()->route('admin.schools.index')->with('success', 'School deleted successfully.');
    }
}
