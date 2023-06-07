<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormExtra extends Model
{
    use HasFactory;

    protected $fillable = ['forms_id', 'name', 'textbox', 'enabled'];
}
