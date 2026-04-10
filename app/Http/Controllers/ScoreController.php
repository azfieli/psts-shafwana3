<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $scores = Score::with(['student', 'subject', 'teacher'])->get();
        return view('scores.index', compact('scores'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('scores.create', compact('students', 'subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:students,id',
            'mapel_id' => 'required|exists:subjects,id',
            'guru_id' => 'required|exists:teachers,id',
            'nilai_pengetahuan' => 'required|numeric|min:0|max:100',
            'nilai_keterampilan' => 'required|numeric|min:0|max:100',
            'semester' => 'required|in:1,2',
            'tahun_ajaran' => 'required|digits:4|integer|min:2000|max:2100',
        ]);

        Score::create($request->all());

        return redirect()->route('scores.index')->with('success', 'Nilai berhasil ditambahkan');
    }

    public function edit(Score $score)
    {
        $students = Student::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('scores.edit', compact('score', 'students', 'subjects', 'teachers'));
    }

    public function update(Request $request, Score $score)
    {
        $request->validate([
            'siswa_id' => 'required|exists:students,id',
            'mapel_id' => 'required|exists:subjects,id',
            'guru_id' => 'required|exists:teachers,id',
            'nilai_pengetahuan' => 'required|numeric|min:0|max:100',
            'nilai_keterampilan' => 'required|numeric|min:0|max:100',
            'semester' => 'required|in:1,2',
            'tahun_ajaran' => 'required|digits:4|integer|min:2000|max:2100',
        ]);

        $score->update($request->all());

        return redirect()->route('scores.index')->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy(Score $score)
    {
        $score->delete();
        return redirect()->route('scores.index')->with('success', 'Nilai berhasil dihapus');
    }
}