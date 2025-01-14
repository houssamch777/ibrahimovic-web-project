<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('عنوان المنشور');
            $table->text('description')->nullable()->comment('وصف المنشور');
            $table->enum('type', ['video', 'image'])->comment('نوع المنشور: فيديو أو صورة');
            $table->string('video_url')->nullable()->comment('رابط الفيديو');
            $table->string('image')->nullable()->comment('صورة المنشور الرئيسية (في حالة النوع صور)');
            $table->json('images')->nullable()->comment('صور المنشور (في حالة النوع صور)');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade')->comment('معرف المستخدم الذي أنشأ المنشور');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
