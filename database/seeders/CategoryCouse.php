<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryCouse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate  = Category::all();
        Course::all()->each(function ($couse) use ($cate) {
            $couse->categorys()->syncWithoutDetaching(
                $cate->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}