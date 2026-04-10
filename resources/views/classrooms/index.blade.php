@extends('layouts.app')

@section('title', 'Kelas')
@section('header', 'Manajemen Kelas')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Data Kelas</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('classrooms.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Kelas
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Kapasitas</th>
                        <th>Terisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classrooms as $key => $classroom)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $classroom->kelas }}</td>
                        <td>{{ $classroom->kapasitas }}</td>
                        <td>{{ $classroom->terisi }}</td>
                        <td>
                            <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data kelas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
