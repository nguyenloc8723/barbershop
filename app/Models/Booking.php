<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stylist_id',
        'timesheet_id',
        'date',
        'special_requirement',
        'is_consultant',
        'is_accept_take_a_photo',
        'status',
    ];

//    public function service(){
//        return $this->belongsToMany(Service::class);
//    }
    // Booking.php
    public function service()
    {
        return $this->belongsToMany(Service::class, 'booking_services', 'booking_id', 'service_id');
    }

    public function results(){
        return $this->hasMany(Results::class);
    }
    public function timesheet(){
        return $this->belongsTo(Timesheet::class);
    }
    public function stylist(){
        return $this->belongsTo(Stylist::class, 'stylist_id');
    }
    public function review(){
        return $this->hasMany(Reviews::class, 'booking_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
