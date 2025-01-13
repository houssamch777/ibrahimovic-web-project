<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->sentence(3), // اسم المشروع
            'description' => $this->faker->paragraph, // وصف المشروع
            'status' => $this->faker->randomElement(['قيد التنفيذ', 'مكتمل', 'مؤجل']), // حالة المشروع
            'end_date' => $this->faker->optional()->date(), // تاريخ الانتهاء
            'budget' => $this->faker->optional()->randomFloat(2, 1000, 50000), // الميزانية
            'category' => $this->faker->randomElement(['تعليم', 'إغاثة', 'بنية تحتية', 'رعاية صحية']), // الفئة
            'location' => $this->faker->city, // الموقع
            'images' => json_encode([$this->faker->imageUrl(640, 480, 'projects', true)]), // صور المشروع
            'is_featured' => $this->faker->boolean, // إذا كان المشروع مميزًا
            'image_url' => $this->faker->optional()->imageUrl(), // رابط الصورة
            'created_by' => null, // يتم تحديده من Seeder

        ];
    }
}
