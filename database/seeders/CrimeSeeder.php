<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Crime;

class CrimeSeeder extends Seeder
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
            ['name'=>'Homicide
            '],
            ['name'=>'Rape
            '],['name'=>'Robbery
            '],[ 'name'=>'Assault
            '],[ 'name'=>'Burglary
            '],
            [ 'name'=>'Grand Larceny
            '],[ 'name'=>'Grand Larceny Auto
            '],[ 'name'=>'Criminal Mischief
            '],[ 'name'=>'Poss of a Weapon
            '],
            [ 'name'=>'Poss of Narcotics

            '],[ 'name'=>'Suspicious Incident

            '],[ 'name'=>'Bomb Threat

            '],[ 'name'=>'Poss of a Weapon'],[ 'name'=>'Other
            '],

        ];
        DB::table('crimes')->insert($data);
    }
}
