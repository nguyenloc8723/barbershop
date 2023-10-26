<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stylist extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'image',
        'excerpt'
    ];


    public function timeSheet(){
        return $this->belongsToMany(Timesheet::class,'stylist_time_sheet');
    }
    public function booking(){
        return $this->hasOne(Booking::class);
    }
}
