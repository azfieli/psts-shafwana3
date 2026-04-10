<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassroomTeacher extends Model
{
    protected $table = 'classroom_teachers';
    protected $fillable = ['kelas_id', 'guru_id'];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'kelas_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'guru_id');
    }
}
