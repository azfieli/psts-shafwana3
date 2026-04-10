@extends('layouts.app')

@section('title', 'Data Nilai')
@section('header', 'Manajemen Nilai')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Data Nilai</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('scores.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Nilai
        </a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Nilai Pengetahuan</th>
                        <th>Nilai Keterampilan</th>
                        <th>Nilai Akhir</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($scores as $key => $score)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $score->student->nama ?? '-' }}</td>
                        <td>{{ $score->subject->mapel ?? '-' }}</td>
                        <td>{{ $score->teacher->nama ?? '-' }}</td>
                        <td>{{ $score->nilai_pengetahuan }}</td>
                        <td>{{ $score->nilai_keterampilan }}</td>
                        <td>{{ number_format($score->nilai_akhir, 2) }}</td>
                        <td>{{ $score->semester }}</td>
                        <td>{{ $score->tahun_ajaran }}</td>
                        <td>
                            <a href="{{ route('scores.edit', $score->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('scores.destroy', $score->id) }}" method="POST" class="d-inline">
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
                        <td colspan="10" class="text-center">Belum ada data nilai</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection