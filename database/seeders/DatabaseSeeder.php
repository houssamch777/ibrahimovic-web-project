<?php

namespace Database\Seeders;

use App\Models\FeaturedProject;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Baraka Admin',
            'email' => 'houssamcheriet01@gmail.com',
            'password' => Hash::make('hOussamch@1'), // كلمة المرور مشفرة
            'role' => 'admin', // تحديد الدور كـ admin
            'is_active' => true, // جعل الحساب نشطًا
        ]);
        FeaturedProject::create([
            'title' => 'مشروع كفالة الأطفال الأيتام في غزة',
            'target_goal' => '10000 يتيم',
            'achieved_value' => '4632 يتيم',
            'progress_percentage' => 45,
            'campaign_name' => 'حملة الوعد المفعول',
            'subtitle' => 'ابدأ بالمساهمة في دعم أطفال غزة',
            'description' => 'مشروع كفالة الأيتام في غزة هو مبادرة تهدف إلى توفير الدعم المالي والنفسي والاجتماعي للأطفال الأيتام، لضمان حياة كريمة ومستقبل مشرق لهم. هدفنا دعم 10,000 يتيم كمرحلة أولى أثناء الحرب.',
        ]);
    }
}
