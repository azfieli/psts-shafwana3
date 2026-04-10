<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $fillable = ['kelas', 'kapasitas', 'terisi'];
    
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'kelas_id');
    }
    
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'classroom_teachers', 'kelas_id', 'guru_id');
    }
}