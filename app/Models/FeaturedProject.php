<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedProject extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'title',
        'target_goal',
        'achieved_value',
        'progress_percentage',
        'campaign_name',
        'subtitle',
        'description',
    ];
}
