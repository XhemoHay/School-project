<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function problems()
    {
        return $this->hasMany(Problem::class);
    }

    public function prayers()
    {
        return $this->hasMany(Prayer::class);
    }
}
