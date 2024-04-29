<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ParkingLot;

class ParkingLotSeeder extends Seeder
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
            ['name'=>'Lot 1 Visitor Parking

            '],
            ['name'=>'Lot 2/3 Employee Parking

            '],['name'=>'Lot 4 Doctors Lot

            '],[ 'name'=>'Lot 5 Employee Parking

            '],[ 'name'=>'Lot 6 Employee Parking

            '],
            [ 'name'=>'Lot 7 Employee Parking

            '],[ 'name'=>'Lot 8 Employee Parking

            '],[ 'name'=>'Lot 9 Employee Parking

            '],[ 'name'=>'Lot 10 Employee Parking

            '],[ 'name'=>'Lot 11 VA Parking

            '],
            [ 'name'=>'Lot 12 Sheriff/Employee Parking

            '],[ 'name'=>'Lot 13 Employee Parking

            '],[ 'name'=>'Lot 14 Old Receiving Lot/Morgue

            '],[ 'name'=>'Old ED/Helipad Lot

            '],[ 'name'=>'Lower Level Parking


            '],




        ];
        DB::table('parking_lots')->insert($data);
    }
}
