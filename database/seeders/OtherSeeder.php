<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Other;

class OtherSeeder extends Seeder
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
            ['name'=>'None'],
            ['name'=>'NCPD'],
            ['name'=>'Fire Depart'],
            ['name'=>'EMS'],
            [ 'name'=>'Other'],
            [ 'name'=>'Job type']
        ];
        DB::table('others')->insert($data);
    }
}
