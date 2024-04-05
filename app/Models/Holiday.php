<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holiday extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'from',
        'to',
        'number_of_days',
    ];

    protected $dates = ['from', 'to']; 

    public function getNumberOfDaysAttribute()
    {
        // Ensure 'from' and 'to' attributes are Carbon instances
        $from = Carbon::parse($this->from);
        $to = Carbon::parse($this->to);

        // Calculate the number of days between 'from' and 'to' dates
        return $from->diffInDays($to);
    }
}
