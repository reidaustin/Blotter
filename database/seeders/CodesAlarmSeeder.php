<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CodeAlarm;

class CodesAlarmSeeder extends Seeder
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
            ['name'=>'Red/Fire Alarm'],
            ['name'=>'Blue'],['name'=>'Bert'],[ 'name'=>'Elopement/Flight'],[ 'name'=>'Pink/ Baby Safe'],
            [ 'name'=>'Drills'],


        ];
        DB::table('code_alarms')->insert($data);
    }
}
