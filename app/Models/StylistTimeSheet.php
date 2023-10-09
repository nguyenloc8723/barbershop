<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StylistTimeSheet extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'stylist_id',
        'timesheet_id',
        'is_active',
        'is_block',
    ];
}
