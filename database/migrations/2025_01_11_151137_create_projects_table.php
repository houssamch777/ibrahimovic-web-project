<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // معرف المشروع
            $table->string('name'); // اسم المشروع
            $table->text('description'); // وصف المشروع
            $table->enum('status', ['قيد التنفيذ', 'مكتمل', 'مؤجل']); // حالة المشروع
            $table->date('end_date')->nullable(); // تاريخ انتهاء المشروع (إن وجد)
            $table->decimal('budget', 15, 2)->nullable(); // الميزانية المخصصة للمشروع
            $table->string('category'); // تصنيف المشروع
            $table->string('location')->nullable(); // موقع المشروع
            $table->json('images')->nullable(); // قائمة صور المشروع
            $table->boolean('is_featured')->default(false); // إذا كان المشروع مميزًا
            $table->string('image_url')->nullable(); // رابط الصورة الرئيسية
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // معرف المستخدم الذي أنشأ المشروع
            $table->timestamps(); // طوابع الوقت
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
