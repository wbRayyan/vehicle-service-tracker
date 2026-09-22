<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    protected $fillable = [
        'car_id',
        'service_date',
        'mileage',
        'service_type',
        'notes'
    ];
}