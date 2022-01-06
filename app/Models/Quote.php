<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_type_id',
        'name',
        'email',
        'number_phone',
        'department_id',
        'municipality_id',
        'policies'
    ];

    public function carType(){
        return $this->belongsTo(CarType::class);
    }
}
