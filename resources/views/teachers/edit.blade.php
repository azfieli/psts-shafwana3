@extends('layouts.app')

@section('title', 'Edit Guru')
@section('header', 'Edit Guru')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{ $teacher->nip }}" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ $teacher->nama }}" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="L" {{ $teacher->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $teacher->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $teacher->tempat_lahir }}" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $teacher->tanggal_lahir }}" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ $teacher->telepon }}">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection