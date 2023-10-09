<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakeServices extends Model
{
    use HasFactory;
    protected $fillable=[
        'categor_id',
        'name',
        'price',
        'description',
        'images',
        'is_active'
    ];
}
