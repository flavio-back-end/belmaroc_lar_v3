<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutmodel extends Model
{
    protected $fillable = [
        'image',
        'info',
        'ceo',
        'info_mission',
        'info_version',
        'info_value',
        'title',
        'descrip',
    ];
    use HasFactory;
}
