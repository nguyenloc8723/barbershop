<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_service extends Model
{
    use HasFactory;
    protected $table="booking_service";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'booking_id',
        'service_id',
    ];

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

}
