<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Supervisor;

class SupervisorSeeder extends Seeder
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
            ['name'=>'Capt Davy

            '],
            ['name'=>'Sgt Lahtonen

            '],['name'=>'C.O Davis

            '],[ 'name'=>'Lt Bell

            '],
            ['name'=>'Sgt Sison

            '],
            ['name'=>'Sgt White

            '],['name'=>'Sgt Delle

            '],[ 'name'=>'Lt Acquavella

            '], ['name'=>'Sgt Williams

            '],
            ['name'=>'Sgt DAngelis

            '],['name'=>'Sgt Castagnaro

            '],[ 'name'=>'Sgt Epper

            '],
            [ 'name'=>'Sgt Peterson

            '],
            
        ];
        DB::table('supervisors')->insert($data);
    }
}
