<?php

namespace Database\Seeders;

use App\Models\President;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // حذف البيانات القديمة
        President::truncate();

        // إدخال بيانات الرئيس
        // إدخال بيانات الرئيس
        President::create([
            'name' => 'الشيخ أحمد إبراهيمي',
            'designation' => 'رئيس جمعية البركة الجزائرية',
            'achievements' => [
                'نائب رئيس الائتلاف العالمي لنصرة القدس وفلسطين.',
                'الأمين الوطني لفلسطين والقضايا العادلة وحقوق الإنسان.',
                'عضو مؤسسة القدس الدولية.',
                'عضو هيئة إعمار فلسطين.',
                'منسق غرب إفريقيا لكسر الحصار عن غزة.',
                'منسق الوفد الجزائري في اسطول الحرية.',
                'منسق قوافل المغرب العربي الكبير لكسر الحصار عن غزة.',
                'رئيس التنسيقية الإفريقية للإغاثة والتنمية.',
                'رئيس أكاديمية أبي مدين الغوث للعلوم والدراسات الفلسطينية.',
                'ماجستير في العلوم السياسية.',
            ],
            'description' => 'أحمد إبراهيمي هو رئيس جمعية البركة وهو الحاصل على شهادة مبعوث في مجال السلام الدولية وقد شغل خلال مسيرته عدة مناصب هامة.',
            'speech' => 'رسالة الرئيس: نحن في جمعية البركة نؤمن بأن العمل الخيري ليس فقط مساعدة مادية، ولكنه رسالة إنسانية ودينية سامية تهدف إلى بناء مجتمع قوي ومتكافل.',
            'image' => 'president_images/default.jpg', // قم بتحميل صورة افتراضية إلى هذا المسار
            'social_links' => [
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'linkedin' => 'https://www.linkedin.com/',
            ],
        ]);
    }
}
