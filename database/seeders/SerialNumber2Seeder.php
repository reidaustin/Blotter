<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SerialNumber2;


class SerialNumber2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $numbers = new SerialNumber2;
        $numbers->serial_numbers_2="00000.1";
        $numbers->save();
    }
}
