<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VocantionalTraining extends Model
{
    use HasFactory;


    protected $table='vocational_training';



    protected $fillable=[
        'soato_new_id',
        'number_centers',
        'capacity_centers',
        'number_scholarships',
        'number_students',
        'number_graduates',
        'number_dropouts',
        'number_employed',
        'date'
    ];
}
