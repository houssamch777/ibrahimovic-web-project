<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::first();
        if (!$user) {
            $this->command->warn('لا يوجد مستخدمون في قاعدة البيانات. تأكد من إنشاء مستخدم قبل تشغيل هذا السيدر.');
            return;
        }

        // إنشاء مشاريع تجريبية
        Project::factory()->count(10)->create([
            'created_by' => $user->id, // استخدم أول مستخدم لإنشاء المشاريع
        ]);

        $this->command->info('تم إنشاء 10 مشاريع تجريبية بنجاح.');
    }
}
