<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'courses',
    ];
    public function studentcourse()
    {
        return $this->belongsTo(Student::class,"course");
    }
}
