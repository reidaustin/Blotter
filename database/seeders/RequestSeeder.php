<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PersonRequest;


class RequestSeeder extends Seeder
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
            ['name'=>'Open Door

            '],
            ['name'=>'Disorderly

            '],['name'=>'Refuse to leave Hospital

            '],[ 'name'=>'Smoke Condition

            '],[ 'name'=>'Traffic Condition

            '],
            [ 'name'=>'Parking Condition

            '],[ 'name'=>'Elevator Entrapment

            '],[ 'name'=>'Unusual Occurrence

            '],

        ];
        DB::table('person_requests')->insert($data);
    }
}
