<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classroom')->get();
        return view('students.index', compact('students'));
    }
    
    public function create()
    {
        $classrooms = Classroom::all();
        return view('students.create', compact('classrooms'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|unique:students',
            'nama' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'kelas_id' => 'nullable|exists:classrooms,id',
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan');
    }
    
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classrooms = Classroom::all();
        return view('students.edit', compact('student', 'classrooms'));
    }
    
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        
        $validated = $request->validate([
            'nis' => 'required|string|unique:students,nis,' . $id,
            'nama' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'kelas_id' => 'nullable|exists:classrooms,id',
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Siswa berhasil diupdate');
    }
    
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus');
    }
}