<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Building;

class BuildingSeeder extends Seeder
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
            ['name'=>'DCB
            '],
            ['name'=>'A Building
            '],['name'=>'B Building
            '],[ 'name'=>'D Building
            '],[ 'name'=>'J Building
            '],
            [ 'name'=>'E Building
            '],[ 'name'=>'F Building
            '],[ 'name'=>'H Building
            '],[ 'name'=>'K Building
            '],[ 'name'=>'Q Building
            '],
            [ 'name'=>'R Building
            '],[ 'name'=>'S Building
            '],[ 'name'=>'Z Building
            '],[ 'name'=>'Apartment A
            '],[ 'name'=>'Apartment B
            '],
            [ 'name'=>'Apartment C

            '],[ 'name'=>'Apartment D

            '],[ 'name'=>'Apartment E

            '],[ 'name'=>'Apartment F

            '],
            [ 'name'=>'Apartment G

            '],[ 'name'=>'Apartment H

            '],[ 'name'=>'Power House

            '],[ 'name'=>'Facilities/Grounds Building


            '],[ 'name'=>'Greenhouse

            '],



        ];
        DB::table('buildings')->insert($data);
    }
}
