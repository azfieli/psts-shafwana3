@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran')
@section('header', 'Tambah Mata Pelajaran')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">SKKS (Jam Pelajaran)</label>
                <input type="number" name="skks" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection