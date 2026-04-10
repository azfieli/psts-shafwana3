<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::withCount('students')->get();
        return view('classrooms.index', compact('classrooms'));
    }
    
    public function create()
    {
        return view('classrooms.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelas' => 'required|string|max:50|unique:classrooms',
            'kapasitas' => 'required|integer|min:1',
            'terisi' => 'nullable|integer|min:0',
        ]);
        
        $validated['terisi'] = $validated['terisi'] ?? 0;
        
        Classroom::create($validated);
        
        return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil ditambahkan');
    }
    
    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }
    
    public function update(Request $request, Classroom $classroom)
    {
        $validated = $request->validate([
            'kelas' => 'required|string|max:50|unique:classrooms,kelas,' . $classroom->id,
            'kapasitas' => 'required|integer|min:1',
            'terisi' => 'required|integer|min:0|max:' . $classroom->kapasitas,
        ]);
        
        $classroom->update($validated);
        
        return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil diupdate');
    }
    
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil dihapus');
    }
}