<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Banner extends Model
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
