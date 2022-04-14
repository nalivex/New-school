<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_subject', 'subject_id', 'user_id');
    }
}
