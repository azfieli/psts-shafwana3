<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['nis', 'nama', 'jk', 'tempat_lahir', 'tanggal_lahir', 'kelas_id', 'foto'];
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
    
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'kelas_id');
    }
    
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class, 'siswa_id');
    }
}