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
        'excerpt',
        'image',
    ];

    public $timestamps = true; // This line will enable the created_at and updated_at timestamps.

    public function timeSheet()
    {
        return $this->belongsToMany(Timesheet::class, 'stylist_time_sheet');
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}


