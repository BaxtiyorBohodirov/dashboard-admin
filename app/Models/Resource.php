<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;


    protected $fillable=[
        'soato_new_id',
        'total_employees',
        'active_population',
        'employees',
        'average_populartion',
        'unemployed',
        'rate_unemployement',
        'unactive_population',
        'date'
    ];
  
}
