<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    use HasFactory;

    /**
     * الحقول القابلة للملء
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'end_date',
        'budget',
        'category',
        'location',
        'images',
        'is_featured',
        'image_url',
        'created_by',
    ];

    /**
     * أنواع الحقول
     */
    protected $casts = [
        'images' => 'array', // الحقل images سيتم تحويله تلقائيًا إلى مصفوفة
        'is_featured' => 'boolean',
        'end_date' => 'date',
        'budget' => 'decimal:2',
    ];

    /**
     * علاقة المشروع مع المستخدم
     * كل مشروع ينتمي إلى مستخدم (الذي قام بإنشائه)
     */
    // علاقة المشروع بالمستخدم الذي أنشأه
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


}
