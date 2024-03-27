<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspension extends Model
{
    use HasFactory;
    protected $fillable = [
        'c_grade',
        'sus_day'
    ];
}
