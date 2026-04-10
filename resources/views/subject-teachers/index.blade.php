    @extends('layouts.app')

@section('title', 'Guru Mapel')
@section('header', 'Manajemen Guru Mapel')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Data Guru Mapel</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('subject-teachers.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Guru Mapel
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subjectTeachers as $key => $st)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $st->guru_nama }}</td>
                        <td>{{ $st->mapel }}</td>
                        <td>
                            <a href="{{ route('subject-teachers.edit', $st->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('subject-teachers.destroy', $st->id) }}" method="POST" class="d-inline">
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
                        <td colspan="4" class="text-center">Belum ada data guru mapel</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection