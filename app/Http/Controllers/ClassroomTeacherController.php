<?php

namespace App\Http\Controllers;

use App\Models\ClassroomTeacher;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomTeacherController extends Controller
{
    public function index()
    {
        $classroomTeachers = ClassroomTeacher::with(['classroom', 'teacher'])->get()->map(function($ct) {
            $ct->guru_nama = $ct->teacher?->nama;
            $ct->kelas = $ct->classroom?->kelas;
            return $ct;
        });
        return view('classroom-teachers.index', compact('classroomTeachers'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        return view('classroom-teachers.create', compact('classrooms', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelas_id' => 'required|exists:classrooms,id',
            'guru_id' => 'required|exists:teachers,id|unique:classroom_teachers,guru_id,NULL,id,kelas_id,' . $request->kelas_id,
        ]);

        ClassroomTeacher::create($validated);
        return redirect()->route('classroom-teachers.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $classroomTeacher = ClassroomTeacher::findOrFail($id);
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        return view('classroom-teachers.edit', compact('classroomTeacher', 'classrooms', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kelas_id' => 'required|exists:classrooms,id',
            'guru_id' => 'required|exists:teachers,id|unique:classroom_teachers,guru_id,' . $id . ',id,kelas_id,' . $request->kelas_id,
        ]);

        $classroomTeacher = ClassroomTeacher::findOrFail($id);
        $classroomTeacher->update($validated);
        return redirect()->route('classroom-teachers.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        ClassroomTeacher::findOrFail($id)->delete();
        return redirect()->route('classroom-teachers.index')->with('success', 'Data berhasil dihapus');
    }
}