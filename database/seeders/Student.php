<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Student extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(DB $dB)
    {
        $studentArr = [];

        $trangThai = [0, 1];
        for ($i = 0; $i < 10; $i++) {
            // $couser_id = Course::inRandomOrder()->first()->id;
            $couser_id = Course::all()->random()->id;
            array_push($studentArr, [
                'user_id' => User::all()->random()->id,
                'status' =>  $trangThai[array_rand($trangThai)],
                'class_id' => Classroom::where('course_id', $couser_id)->get()->random()->id,
                'course_id' => $couser_id,
                'price' => Course::find($couser_id)->price,
                'code' => time() . rand(000001, 999999),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
        $dB::table('students')->insert($studentArr);
    }
}