@extends('layouts.app')

@section('title', 'Data Guru')
@section('header', 'Manajemen Guru')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Data Guru</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Guru
        </a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $key => $teacher)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $teacher->nip }}</td>
                        <td>{{ $teacher->nama }}</td>
                        <td>{{ $teacher->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $teacher->tempat_lahir }}</td>
                        <td>{{ date('d/m/Y', strtotime($teacher->tanggal_lahir)) }}</td>
                        <td>{{ $teacher->telepon ?? '-' }}</td>
                        <td>
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
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
                        <td colspan="8" class="text-center">Belum ada data guru</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection