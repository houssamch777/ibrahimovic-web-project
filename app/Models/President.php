<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class President extends Model
{
    //
    protected $table = 'president';

    protected $fillable = [
        'name',
        'designation',
        'achievements',
        'description',
        'speech',
        'image',
        'social_links',
    ];

    protected $casts = [
        'achievements' => 'array', // تحويل النص JSON إلى مصفوفة تلقائيًا // تحويل الإنجازات إلى مصفوفة
        'social_links' => 'array', // تحويل روابط الشبكات الاجتماعية إلى مصفوفة
    ];
}
