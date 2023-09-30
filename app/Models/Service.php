<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'price',
        'description',
        'slug',
        'is_active',
    ];

    public function category(){
        return $this->belongsTo(Service_categories::class,'category_id', 'id');
    }
    public function booking(){
        return $this->belongsToMany(Booking::class);
    }
    public function images(){
        return $this->hasMany(ImageService::class);
    }
}
