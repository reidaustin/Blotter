<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SerialNumber3;


class SerialNumber3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $numbers = new SerialNumber3;
        $numbers->serial_numbers_3="00000.1";
        $numbers->save();
    }
}
