@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <h1>Selamat Datang di Pesat Boarding School</h1>
    <p>Platform Manajemen Nilai Pendidikan Digital</p>
</div>

<!-- Statistics Section -->
<h2 style="margin-top: 2rem; margin-bottom: 1.5rem; color: #1e5a96; font-weight: 700; font-size: 28px;">📊 Statistik Sistem</h2>
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="stat-title">Total Kelas</div>
        <div class="stat-value">{{ $totalKelas }}</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="stat-title">Total Siswa</div>
        <div class="stat-value">{{ $totalSiswa }}</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chalkboard-user"></i>
        </div>
        <div class="stat-title">Total Guru</div>
        <div class="stat-value">{{ $totalGuru }}</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="stat-title">Mata Pelajaran</div>
        <div class="stat-value">{{ $totalMapel }}</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-star"></i>
        </div>
        <div class="stat-title">Total Nilai</div>
        <div class="stat-value">{{ $totalNilai }}</div>
    </div>
</div>

<!-- Recent Data Section -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
    <!-- Recent Students -->
    <div>
        <h3 style="margin-bottom: 1.5rem; color: #1e5a96; font-weight: 700; font-size: 22px;">
            <i class="fas fa-user-graduate"></i> Siswa Terbaru
        </h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="font-size: 13px; font-weight: 600;">NIS</th>
                        <th style="font-size: 13px; font-weight: 600;">Nama</th>
                        <th style="font-size: 13px; font-weight: 600;">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentStudents as $s)
                        <tr>
                            <td style="font-size: 12px; padding: 10px;">{{ $s->nis }}</td>
                            <td style="font-size: 12px; padding: 10px;">{{ $s->nama }}</td>
                            <td style="font-size: 12px; padding: 10px;">{{ $s->classroom?->kelas ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted" style="padding: 2rem; font-size: 13px;">
                                <i class="fas fa-inbox"></i> Belum ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Grades -->
    <div>
        <h3 style="margin-bottom: 1.5rem; color: #1e5a96; font-weight: 700; font-size: 22px;">
            <i class="fas fa-star"></i> Nilai Terbaru
        </h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="font-size: 13px; font-weight: 600;">Siswa</th>
                        <th style="font-size: 13px; font-weight: 600;">Mapel</th>
                        <th style="font-size: 13px; font-weight: 600;">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentGrades as $g)
                        <tr>
                            <td style="font-size: 12px; padding: 10px;">{{ $g->student?->nama ?? '-' }}</td>
                            <td style="font-size: 12px; padding: 10px;">{{ $g->subject?->mapel ?? '-' }}</td>
                            <td style="font-size: 12px; padding: 10px;"><strong>{{ number_format($g->nilai_pengetahuan, 2) }}</strong></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted" style="padding: 2rem; font-size: 13px;">
                                <i class="fas fa-inbox"></i> Belum ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection