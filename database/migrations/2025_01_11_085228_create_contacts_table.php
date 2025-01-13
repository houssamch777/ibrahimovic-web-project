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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable()->comment('عنوان المقر');
            $table->string('phone', 20)->nullable()->comment('رقم الهاتف');
            $table->string('alt_phone', 20)->nullable()->comment('رقم الهاتف الدولي البديل');
            $table->string('email')->nullable()->comment('البريد الإلكتروني');
            $table->string('google_map')->nullable()->comment('رابط موقع خرائط Google');
            $table->string('working_hours')->nullable()->comment('ساعات العمل');
            $table->string('facebook')->nullable()->comment('رابط صفحة الفيسبوك');
            $table->string('youtube')->nullable()->comment('رابط قناة اليوتيوب');
            $table->string('telegram')->nullable()->comment('رابط قناة التلقرام');
            $table->string('tiktok')->nullable()->comment('رابط صفحة التيكتوك');
            $table->string('instagram')->nullable()->comment('رابط صفحة الانستقرام');
            $table->string('twitter')->nullable()->comment('رابط صفحة تويتر');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
