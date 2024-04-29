<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\IncidentType;

class IncidentTypeSeeder extends Seeder
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
            ['name'=>'MDS



            '],
            ['name'=>'ESC FL-FL



            '],['name'=>'MED



            '],[ 'name'=>'REST



            '],[ 'name'=>'VIS_ISS



            '],
            [ 'name'=>'SP



            '],[ 'name'=>'Assault



            '],[ 'name'=>'MTA



            '],[ 'name'=>'VIS_INJ



            '],[ 'name'=>'Arrest





            '],
            [ 'name'=>'Heli



            '],[ 'name'=>'Code Red



            '],[ 'name'=>'Elope



            '],[ 'name'=>'Elev



            '],[ 'name'=>'Disch PT




            '],
            ['name'=>'EV_IN




            '],
            ['name'=>'EV_OT





            '],['name'=>'STAT




            '],[ 'name'=>'OTP RUN




            '],[ 'name'=>'SICK




            '],
            [ 'name'=>'AID LE

            ry



            '],[ 'name'=>'BERT




            '],[ 'name'=>'DISTB




            '],[ 'name'=>'DETOX




            '],[ 'name'=>'INJ




            '],
            [ 'name'=>'Doors




            '],[ 'name'=>'10th FL




            '],
            ['name'=>'Other']



        ];
        DB::table('incident_types')->insert($data);
    }
}
