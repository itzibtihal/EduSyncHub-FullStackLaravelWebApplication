<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'start_time',
        'finish_time',
        'comments',
        'created_by',
    ];

    protected $dates = [
        'start_time',
        'finish_time',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
