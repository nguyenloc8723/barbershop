<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StylistTimeSheet extends Model
{
    use HasFactory;
    protected $table = 'stylist_time_sheet';
    protected $fillable = [
        'id',
        'stylist_id',
        'timesheet_id',
        'is_active',
        'is_block',
    ];
    public function stylist(){
        return $this->belongsTo(Stylist::class,'stylist_id','id');
    }

    public function TimeSheet(){
        return $this->belongsTo(Timesheet::class,'timesheet_id','id');
    }
}
