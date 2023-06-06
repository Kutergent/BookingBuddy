<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'dob', 'reserve_date', 'reserve_duration'];
}
