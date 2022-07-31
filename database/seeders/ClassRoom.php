<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Classroom as ModelsClassroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassRoom extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     ModelsClassroom::factory(100)->create();
    // }
    public function run(DB $dB)
    {
        $classArr = [];

        $name = 'Phòng : ';

        for ($i = 0; $i < 100; $i++) {
            array_push($classArr, [
                'name' => $name . Str::random(5),
                'status' => 1,
                'lecturer_id' =>  User::all()->random()->id,
                'course_id' => Course::all()->random()->id,
                'date_open' => Carbon::now()->subDays(rand(0, 7))->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
        $dB::table('class')->insert($classArr);
    }
}