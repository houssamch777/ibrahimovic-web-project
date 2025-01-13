<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'alt_phone',
        'email',
        'google_map',
        'working_hours',
        'facebook',
        'youtube',
        'telegram',
        'tiktok',
        'instagram',
        'twitter',
    ];
}
