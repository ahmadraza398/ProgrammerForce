<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=
        [
            'ptitle',
            'pdescription',
            'pimage',
            'pprice',
            'cid'

        ];
    public function category()
    {
        return $this->belongsTo(Category::class,"categories");
    }
    public function user()
    {
        return $this->belongsTo(User::class,"users");
    }
}
