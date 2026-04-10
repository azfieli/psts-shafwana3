<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Score;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKelas = Classroom::count();
        $totalGuru = Teacher::count();
        $totalMapel = Subject::count();
        $totalSiswa = Student::count();
        $totalNilai = Score::count();

        $recentStudents = Student::with('classroom')->latest()->limit(5)->get();
        $recentGrades = Score::with(['student', 'subject', 'teacher'])->latest()->limit(5)->get();

        return view('dashboard', compact('totalKelas', 'totalGuru', 'totalMapel', 'totalSiswa', 'totalNilai', 'recentStudents', 'recentGrades'));
    }
}