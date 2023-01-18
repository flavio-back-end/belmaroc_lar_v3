<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settingmodel extends Model
{
    protected $fillable = [
        'site_name',
        'phone',
        'email',
        'map',
        'address',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'logo',

    ];
    use HasFactory;
}
