<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Score extends Model
{
    protected $table = 'scores';
    protected $fillable = ['siswa_id', 'mapel_id', 'guru_id', 'nilai_pengetahuan', 'nilai_keterampilan', 'semester', 'tahun_ajaran'];
    
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'siswa_id');
    }
    
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'mapel_id');
    }
    
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'guru_id');
    }

    /**
     * Nilai Akhir (rata-rata Pengetahuan dan Keterampilan)
     */
    protected function nilaiAkhir(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->nilai_pengetahuan + $this->nilai_keterampilan) / 2,
        );
    }
}