@extends('layouts.app')

@section('title', 'Guru Kelas')
@section('header', 'Manajemen Guru Kelas')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Data Guru Kelas</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('classroom-teachers.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Guru Kelas
        </a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classroomTeachers as $key => $ct)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $ct->guru_nama }}</td>
                        <td>{{ $ct->kelas }}</td>
                        <td>
                            <a href="{{ route('classroom-teachers.edit', $ct->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('classroom-teachers.destroy', $ct->id) }}" method="POST" class="d-inline">
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
                        <td colspan="4" class="text-center">Belum ada data guru kelas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection