<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectTeacher extends Model
{
    protected $table = 'subject_teachers';
    protected $fillable = ['mapel_id', 'guru_id'];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'mapel_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'guru_id');
    }
}
