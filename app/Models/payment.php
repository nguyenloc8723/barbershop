<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        "booking_id",
        "money",
        "note",
        "vnp_response_code",
        "code_vnpay",
        "code_bank",
        "time"
    ];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
