<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylistTimeSheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'stylist_id',
        'timesheet_id',
        'is_active',
        'is_block',
    ];
}
