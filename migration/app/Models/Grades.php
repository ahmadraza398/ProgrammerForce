<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'grades',
    ];
    public function studentgrades()
    {
        return $this->belongsTo(Student::class,"grades");
    }
}
