<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stylist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'excerpt',
        'image',
        'is_vip',
    ];

    public function timesheet(){
        return $this->belongsToMany(Timesheet::class);
    }
    public function booking(){
        return $this->hasOne(Booking::class);
    }
}
