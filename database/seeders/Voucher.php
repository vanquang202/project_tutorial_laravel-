<?php

namespace Database\Seeders;

use App\Models\Voucher as ModelsVoucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Voucher extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsVoucher::factory(20)->create();
    }
}