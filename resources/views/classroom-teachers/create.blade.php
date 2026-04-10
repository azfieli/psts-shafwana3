@extends('layouts.app')

@section('title', 'Tambah Guru Kelas')
@section('header', 'Tambah Guru Kelas')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('classroom-teachers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Guru</label>
                <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror" required>
                    <option value="">Pilih Guru</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('guru_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->nama }} ({{ $teacher->nip }})</option>
                    @endforeach
                </select>
                @error('guru_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror" required>
                    <option value="">Pilih Kelas</option>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" {{ old('kelas_id') == $classroom->id ? 'selected' : '' }}>{{ $classroom->kelas }}</option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('classroom-teachers.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection