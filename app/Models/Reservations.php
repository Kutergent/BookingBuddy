<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable;
use Kyslik\ColumnSortable\Sortable;

class Reservations extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ['name', 'email', 'phone_number', 'dob', 'reserve_date','reserve_time', 'reserve_duration', 'status'];

    public $sortable = ['name', 'email', 'reserve_date', 'reserve_duration', 'status'];
}
