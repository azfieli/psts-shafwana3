@extends('layouts.app')

@section('title', 'Edit Mata Pelajaran')
@section('header', 'Edit Mata Pelajaran')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control" value="{{ $subject->mapel }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">SKKS (Jam Pelajaran)</label>
                <input type="number" name="skks" class="form-control" value="{{ $subject->skks }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection