<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Score;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Kelas
        $classes = [
            ['kelas' => '2B', 'kapasitas' => 36, 'terisi' => 1],
            ['kelas' => 'X-A', 'kapasitas' => 36, 'terisi' => 5],
            ['kelas' => 'X-B', 'kapasitas' => 36, 'terisi' => 5],
            ['kelas' => 'XI-A', 'kapasitas' => 36, 'terisi' => 5],
            ['kelas' => 'XI-B', 'kapasitas' => 36, 'terisi' => 5],
            ['kelas' => 'XII-A', 'kapasitas' => 36, 'terisi' => 5],
        ];
        foreach ($classes as $c) Classroom::create($c);

        // Guru
        $teachers = [
            ['nama' => 'Pak Bambang Setiawan', 'nip' => '198001012008011001', 'jk' => 'L', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '1980-01-01', 'telepon' => '081234567890'],
            ['nama' => 'Dr. Ahmad Sugianto, M.Kom', 'nip' => '198001012008011002', 'jk' => 'L', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '1980-01-01', 'telepon' => '081234567890'],
            ['nama' => 'Dewi Kartika, S.Pd', 'nip' => '198502152010012002', 'jk' => 'P', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '1985-02-15', 'telepon' => '081234567891'],
            ['nama' => 'Budi Santoso, S.Kom', 'nip' => '199003202012011003', 'jk' => 'L', 'tempat_lahir' => 'Surabaya', 'tanggal_lahir' => '1990-03-20', 'telepon' => '081234567892'],
            ['nama' => 'Siti Aminah, S.Pd.I', 'nip' => '198812102009012004', 'jk' => 'P', 'tempat_lahir' => 'Semarang', 'tanggal_lahir' => '1988-12-10', 'telepon' => '081234567893'],
            ['nama' => 'Eko Prasetyo, M.Pd', 'nip' => '199506252015011005', 'jk' => 'L', 'tempat_lahir' => 'Yogyakarta', 'tanggal_lahir' => '1995-06-25', 'telepon' => '081234567894'],
        ];
        foreach ($teachers as $t) Teacher::create($t);

        // Mapel
        // Mapel
        $subjects = [
            ['mapel' => 'Bahasa Indonesia', 'skks' => 3],
            ['mapel' => 'Pemrograman Web', 'skks' => 4],
            ['mapel' => 'Basis Data', 'skks' => 4],
            ['mapel' => 'PBO', 'skks' => 4],
            ['mapel' => 'Matematika', 'skks' => 3],
            ['mapel' => 'Bahasa Inggris', 'skks' => 2],
        ];
        foreach ($subjects as $s) Subject::create($s);

        // Siswa
        $students = [
            ['nis' => '222', 'nama' => 'Rida Saputra', 'jk' => 'L', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '2008-05-15', 'kelas_id' => 1],
            ['nis' => '2023001', 'nama' => 'Ahmad Fauzi', 'jk' => 'L', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '2008-05-15', 'kelas_id' => 2],
            ['nis' => '2023002', 'nama' => 'Budi Raharjo', 'jk' => 'L', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '2008-07-20', 'kelas_id' => 2],
            ['nis' => '2023003', 'nama' => 'Citra Dewi', 'jk' => 'P', 'tempat_lahir' => 'Surabaya', 'tanggal_lahir' => '2008-03-10', 'kelas_id' => 2],
            ['nis' => '2023004', 'nama' => 'Dian Sastro', 'jk' => 'P', 'tempat_lahir' => 'Semarang', 'tanggal_lahir' => '2008-09-25', 'kelas_id' => 3],
            ['nis' => '2023005', 'nama' => 'Eka Pratama', 'jk' => 'L', 'tempat_lahir' => 'Yogyakarta', 'tanggal_lahir' => '2008-11-30', 'kelas_id' => 3],
        ];
        foreach ($students as $st) Student::create($st);

        // Nilai (Scores)
        $scores = [
            ['siswa_id' => 1, 'mapel_id' => 1, 'guru_id' => 1, 'nilai_pengetahuan' => 40.00, 'nilai_keterampilan' => 40.00, 'semester' => 1, 'tahun_ajaran' => '2025/2026'],
            ['siswa_id' => 1, 'mapel_id' => 2, 'guru_id' => 1, 'nilai_pengetahuan' => 85.00, 'nilai_keterampilan' => 88.00, 'semester' => 1, 'tahun_ajaran' => '2025/2026'],
            ['siswa_id' => 2, 'mapel_id' => 2, 'guru_id' => 1, 'nilai_pengetahuan' => 82.00, 'nilai_keterampilan' => 84.00, 'semester' => 1, 'tahun_ajaran' => '2025/2026'],
            ['siswa_id' => 3, 'mapel_id' => 2, 'guru_id' => 1, 'nilai_pengetahuan' => 90.00, 'nilai_keterampilan' => 92.00, 'semester' => 1, 'tahun_ajaran' => '2025/2026'],
            ['siswa_id' => 4, 'mapel_id' => 3, 'guru_id' => 2, 'nilai_pengetahuan' => 78.00, 'nilai_keterampilan' => 80.00, 'semester' => 1, 'tahun_ajaran' => '2025/2026'],
            ['siswa_id' => 5, 'mapel_id' => 3, 'guru_id' => 2, 'nilai_pengetahuan' => 88.00, 'nilai_keterampilan' => 86.00, 'semester' => 1, 'tahun_ajaran' => '2025/2026'],
        ];
        foreach ($scores as $g) Score::create($g);

        // Relasi guru kelas
        DB::table('classroom_teachers')->insert([
            ['kelas_id' => 1, 'guru_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['kelas_id' => 2, 'guru_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['kelas_id' => 3, 'guru_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['kelas_id' => 4, 'guru_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['kelas_id' => 5, 'guru_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['kelas_id' => 6, 'guru_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Relasi guru mapel
        DB::table('subject_teachers')->insert([
            ['mapel_id' => 1, 'guru_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['mapel_id' => 2, 'guru_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['mapel_id' => 3, 'guru_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['mapel_id' => 4, 'guru_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['mapel_id' => 5, 'guru_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['mapel_id' => 6, 'guru_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}