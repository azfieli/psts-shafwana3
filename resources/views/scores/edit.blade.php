@extends('layouts.app')

@section('title', 'Edit Nilai')
@section('header', 'Edit Nilai')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('scores.update', $score->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Siswa</label>
                    <select name="siswa_id" class="form-control" required>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ $score->siswa_id == $student->id ? 'selected' : '' }}>
                                {{ $student->nama }} ({{ $student->nis }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <select name="mapel_id" class="form-control" required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $score->mapel_id == $subject->id ? 'selected' : '' }}>
                                {{ $subject->mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Guru Pengajar</label>
                    <select name="guru_id" class="form-control" required>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $score->guru_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Nilai Pengetahuan</label>
                    <input type="number" name="nilai_pengetahuan" class="form-control" step="0.01" value="{{ $score->nilai_pengetahuan }}" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Nilai Keterampilan</label>
                    <input type="number" name="nilai_keterampilan" class="form-control" step="0.01" value="{{ $score->nilai_keterampilan }}" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-control" required>
                        <option value="1" {{ $score->semester == '1' ? 'selected' : '' }}>Semester 1</option>
                        <option value="2" {{ $score->semester == '2' ? 'selected' : '' }}>Semester 2</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tahun Ajaran</label>
                    <input type="number" name="tahun_ajaran" class="form-control" value="{{ $score->tahun_ajaran }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('scores.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection