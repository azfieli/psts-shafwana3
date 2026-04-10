@extends('layouts.app')

@section('title', 'Edit Guru Kelas')
@section('header', 'Edit Guru Kelas')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('classroom-teachers.update', $classroomTeacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Guru</label>
                <select name="guru_id" class="form-control" required>
                    <option value="">Pilih Guru</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $classroomTeacher->guru_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->nama }} ({{ $teacher->nip }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="kelas_id" class="form-control" required>
                    <option value="">Pilih Kelas</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" {{ $classroomTeacher->kelas_id == $classroom->id ? 'selected' : '' }}>{{ $classroom->kelas }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('classroom-teachers.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection