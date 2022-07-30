<?php

namespace Database\Seeders;

use App\Models\ClassTime as ModelsClassTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTime extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsClassTime::create([
            'name' => 'Ca 1',
            'opening_hour' => '07:10:00',
            'closing_time' => '09:10:00',
        ]);

        ModelsClassTime::create([
            'name' => 'Ca 2',
            'opening_hour' => '09:25:00',
            'closing_time' => '11:25:00',
        ]);
        ModelsClassTime::create([
            'name' => 'Ca 3',
            'opening_hour' => '12:00:00',
            'closing_time' => '14:00:00',
        ]);

        ModelsClassTime::create([
            'name' => 'Ca 4',
            'opening_hour' => '14:10:00',
            'closing_time' => '16:10:00',
        ]);
        ModelsClassTime::create([
            'name' => 'Ca 5',
            'opening_hour' => '16:20:00',
            'closing_time' => '18:20:00',
        ]);
        ModelsClassTime::create([
            'name' => 'Ca 6',
            'opening_hour' => '18:30:00',
            'closing_time' => '20:30:00',
        ]);
    }
}