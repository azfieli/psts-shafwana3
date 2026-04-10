@extends('layouts.app')

@section('title', 'Tambah Guru Mapel')
@section('header', 'Tambah Guru Mapel')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('subject-teachers.store') }}" method="POST">
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
                <label class="form-label">Mata Pelajaran</label>
                <select name="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ old('mapel_id') == $subject->id ? 'selected' : '' }}>{{ $subject->mapel }}</option>
                    @endforeach
                </select>
                @error('mapel_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('subject-teachers.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
