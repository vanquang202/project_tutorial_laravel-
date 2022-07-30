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

        //         $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
        // $rand_keys = array_rand($input, 2);
        // echo $input[$rand_keys[0]] . "\n";
        // echo $input[$rand_keys[1]] . "\n";


        $files = Storage::disk('public')->allFiles();
        $key = array_rand($files);
        return [
            'name' => $this->faker->name,
            'image' => $files[$key],
            'images' => null,
            'status' => 1,
            'price' => rand(100000, 999999),
            'detail' => $this->faker->sentence(15),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}