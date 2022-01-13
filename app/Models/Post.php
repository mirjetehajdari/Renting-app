<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'bike_type',
        'city_location',
        'price_hour',
        'price_day',
        'price_week',
        'description',
        'main_photo',
        'second_photo',
        'third_photo',
        'email',
    ];
}
