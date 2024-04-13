<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyTimesheet extends Model
{
    use HasFactory;
    protected $table = 'yearlytimesheets';
    protected $fillable = ['year', 'file'];

}
