<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $timestamps = false;
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

    public function service(){
        return $this->belongsToMany(Service::class, 'booking_services');
    }
    public function results(){
        return $this->belongsTo(Results::class);
    }
    public function timeSheet(){
        return $this->belongsTo(Timesheet::class, 'timesheet_id');
    }
    public function stylist(){
        return $this->belongsTo(Stylist::class);
    }
    public function reviews(){
        return $this->hasMany(Reviews::class, 'booking_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
