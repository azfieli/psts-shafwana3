<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel' => 'required|unique:subjects',
            'skks' => 'required|integer',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'mapel' => 'required|unique:subjects,mapel,' . $subject->id,
            'skks' => 'required|integer',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Mata pelajaran berhasil diupdate');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Mata pelajaran berhasil dihapus');
    }
}