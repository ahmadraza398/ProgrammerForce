<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'subject','message',
    ];
    public function contactdata()
    {
        return $this->belongsTo(Contact::class,"contacts");
    }
}
