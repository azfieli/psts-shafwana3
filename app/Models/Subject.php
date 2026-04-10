<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['mapel', 'skks'];
    
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'subject_teachers', 'mapel_id', 'guru_id');
    }
    
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class, 'mapel_id');
    }
}