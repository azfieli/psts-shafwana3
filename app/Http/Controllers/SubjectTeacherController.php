<?php

namespace App\Http\Controllers;

use App\Models\SubjectTeacher;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectTeacherController extends Controller
{
    public function index()
    {
        $subjectTeachers = SubjectTeacher::with(['subject', 'teacher'])->get()->map(function($st) {
            $st->guru_nama = $st->teacher?->nama;
            $st->mapel = $st->subject?->mapel;
            return $st;
        });
        return view('subject-teachers.index', compact('subjectTeachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('subject-teachers.create', compact('subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mapel_id' => 'required|exists:subjects,id',
            'guru_id' => 'required|exists:teachers,id|unique:subject_teachers,guru_id,NULL,id,mapel_id,' . $request->mapel_id,
        ]);

        SubjectTeacher::create($validated);
        return redirect()->route('subject-teachers.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('subject-teachers.edit', compact('subjectTeacher', 'subjects', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'mapel_id' => 'required|exists:subjects,id',
            'guru_id' => 'required|exists:teachers,id|unique:subject_teachers,guru_id,' . $id . ',id,mapel_id,' . $request->mapel_id,
        ]);

        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $subjectTeacher->update($validated);
        return redirect()->route('subject-teachers.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        SubjectTeacher::findOrFail($id)->delete();
        return redirect()->route('subject-teachers.index')->with('success', 'Data berhasil dihapus');
    }
}