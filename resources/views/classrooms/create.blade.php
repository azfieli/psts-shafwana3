@extends('layouts.app')

@section('title', 'Tambah Kelas')
@section('header', 'Tambah Kelas')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('classrooms.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas') }}" placeholder="Contoh: 7A" required>
                @error('kelas')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" value="{{ old('kapasitas') }}" min="1" required>
                @error('kapasitas')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Terisi</label>
                <input type="number" name="terisi" class="form-control @error('terisi') is-invalid @enderror" value="{{ old('terisi', 0) }}" min="0" required>
                @error('terisi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('classrooms.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
