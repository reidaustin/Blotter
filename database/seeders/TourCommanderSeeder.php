<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TourCommander;

class TourCommanderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['name'=>'None


            '],
            ['name'=>'C.O Davis'],
            ['name'=>'Capt Davy'],['name'=>'Lt Acquavella'],[ 'name'=>'Lt Bell'],

        ];
        DB::table('tour_commanders')->insert($data);
    }
}
