<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'time_type',
        'quantity_time',
        'comment',
        'bike_id',
        'user_id',
        'confirmed'
    ];
}
