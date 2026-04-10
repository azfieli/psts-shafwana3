@extends('layouts.app')

@section('title', 'Mata Pelajaran')
@section('header', 'Manajemen Mata Pelajaran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Data Mata Pelajaran</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Mata Pelajaran
        </a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>SKKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subjects as $key => $subject)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $subject->mapel }}</td>
                        <td>{{ $subject->skks }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="d-inline">
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
                        <td colspan="4" class="text-center">Belum ada data mata pelajaran</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection