<?php

namespace App\Http\Controllers;

use App\Interfaces\SchoolRepositoryInterface;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    private SchoolRepositoryInterface $schoolRepository;

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
            'name' => 'required',
            'address' => 'required',
            'total_students' => 'required|integer',
        ]);

        $this->schoolRepository->create($data);
        return redirect()->route('admin.schools.index')->with('success', 'Sekolah berhasil ditambahkan');
    }

    // ... lanjut untuk edit, update, destroy pakai $this->schoolRepository->...
}