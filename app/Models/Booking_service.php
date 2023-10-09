<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_service extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'booking_id',
        'service_id',
    ];


}
