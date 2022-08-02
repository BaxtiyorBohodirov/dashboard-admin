<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    protected $table='employment';
    protected $fillable=[
       'soato_new_id',
       'unemployed',
       'vacancies',
       'applicants',
       'number_employed',
        'date',
    ];
}
