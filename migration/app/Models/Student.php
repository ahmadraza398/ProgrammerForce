<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'gid','cid',
    ];
    public function studentdata()
    {
        return $this->belongsTo(Student::class,"student");
    }
}
