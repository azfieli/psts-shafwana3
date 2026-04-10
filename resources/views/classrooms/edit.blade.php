@extends('layouts.app')

@section('title', 'Edit Kelas')
@section('header', 'Edit Kelas')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ $classroom->kelas }}" required>
                @error('kelas')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" value="{{ $classroom->kapasitas }}" min="1" required>
                @error('kapasitas')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Terisi</label>
                <input type="number" name="terisi" class="form-control @error('terisi') is-invalid @enderror" value="{{ $classroom->terisi }}" min="0" max="{{ $classroom->kapasitas }}" required>
                @error('terisi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('classrooms.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
