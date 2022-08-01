<?php

namespace Database\Seeders;

use App\Models\Calendar as ModelsCalendar;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Calendar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classTime  = \App\Models\ClassTime::all();

        \App\Models\Classroom::all()->each(function ($class) use ($classTime) {
            \App\Models\Calendar::create([
                'class_id' => $class->id,
                'class_time_id' => $classTime->random()->id,
                'detail' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse consequuntur, maiores eaque dolore dicta quam repellat distinctio facilis ex odio maxime excepturi deleniti at iure ipsa vitae aspernatur, neque aliquid.',
                'date' => Carbon::today()->subDays(rand(0, 365)),
            ]);
        });
    }
}