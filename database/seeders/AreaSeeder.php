<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Area;


class AreaSeeder extends Seeder
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
            ['name'=>'Floor


            '],
            ['name'=>'Patient Rooms


            '],['name'=>'Clinics


            '],[ 'name'=>'MRI


            '],[ 'name'=>'Hallway


            '],
            [ 'name'=>'Elevator


            '],[ 'name'=>'Employee Health


            '],[ 'name'=>'Closet


            '],[ 'name'=>'Staircase


            '],[ 'name'=>'Helipad


            '],
            [ 'name'=>'ED


            '],[ 'name'=>'Service Elevator


            '],[ 'name'=>'Morgue


            '],[ 'name'=>'Labs


            '],[ 'name'=>'Blood Banks



            '],
            ['name'=>'X-Ray/Radiology



            '],
            ['name'=>'Employee Entrance




            '],['name'=>'Visitor Entrance



            '],[ 'name'=>'Kitchen/Dietary



            '],[ 'name'=>'Cafeteria



            '],
            [ 'name'=>'Library



            '],[ 'name'=>'Ambulance Entrance



            '],[ 'name'=>'Pharmacy



            '],[ 'name'=>'Laundy



            '],[ 'name'=>'Housekeeping



            '],
            [ 'name'=>'Maintenance Shops



            '],[ 'name'=>'Psych Ed



            '],[ 'name'=>'Ward 01



            '],[ 'name'=>'Psych 02



            '],[ 'name'=>'Offices




            '],




        ];
        DB::table('areas')->insert($data);
    }
}
