<?php

namespace Database\Seeders;

use App\Models\Course as ModelsCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Course extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsCourse::factory(59)->create();
    }
}