<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $files = Storage::disk('public')->allFiles();
        $key = array_rand($files);
        $rand_keys = array_rand($files, 5);
        return [
            'name' => $this->faker->name,
            'image' => $files[$key],
            'images' => json_encode([
                $files[$rand_keys[0]],
                $files[$rand_keys[1]],
                $files[$rand_keys[2]],
                $files[$rand_keys[3]],
                $files[$rand_keys[4]],
            ]),
            'status' => 1,
            'price' => rand(100000, 999999),
            'detail' => $this->faker->sentence(15),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}