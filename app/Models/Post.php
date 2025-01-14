<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'video_url',
        'images',
        'image',
        'created_by',
    ];


    protected $casts = [
        'images' => 'array', // الحقل images سيتم تحويله تلقائيًا إلى مصفوفة
    ];
    // العلاقة مع المستخدم
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
