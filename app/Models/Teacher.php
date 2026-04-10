<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['nip', 'nama', 'jk', 'tempat_lahir', 'tanggal_lahir', 'telepon', 'foto'];
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
    
    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'classroom_teachers', 'guru_id', 'kelas_id');
    }
    
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_teachers', 'guru_id', 'mapel_id');
    }
    
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class, 'guru_id');
    }
}