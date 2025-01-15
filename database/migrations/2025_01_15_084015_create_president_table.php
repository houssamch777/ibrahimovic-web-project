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
        Schema::create('president', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الرئيس
            $table->string('designation')->nullable(); // المنصب
            $table->json('achievements')->nullable(); // روابط الشبكات الاجتماعية
            $table->text('description')->nullable(); // وصف عن الرئيس
            $table->text('speech')->nullable(); // كلمة الرئيس
            $table->string('image')->nullable(); // صورة الرئيس
            $table->json('social_links')->nullable(); // روابط الشبكات الاجتماعية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('president');
    }
};
