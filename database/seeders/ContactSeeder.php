<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Contact::create([
            'address' => 'تعاونية الصومام 2 مكرر- لاكوت, بئر مراد رايس, الجزائر العاصمة, الجزائر.',
            'phone' => '+213-797-6910-31',
            'alt_phone' => '+213-798-1234-56',
            'email' => 'example@domain.com',
            'google_map' => 'https://www.google.com/maps',
            'working_hours' => '08:00 صباحاً - 05:00 مساءً',
            'facebook' => 'https://www.facebook.com',
            'youtube' => 'https://www.youtube.com',
            'telegram' => 'https://www.telegram.me',
            'tiktok' => 'https://www.tiktok.com',
            'instagram' => 'https://www.instagram.com',
            'twitter' => 'https://www.twitter.com',
        ]);
    }
}
