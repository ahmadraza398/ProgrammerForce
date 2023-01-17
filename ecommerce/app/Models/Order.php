<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=
        [
            'pid',
            'uid',
        ];
    public function product()
    {
        return $this->belongsTo(Product::class,"products");
    }
    public function user()
    {
        return $this->belongsTo(User::class,"users");
    }
}
