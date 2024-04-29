<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalRequest;

class MedicalRequestSeeder extends Seeder
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
            ['name'=>'Medication


            '],
            ['name'=>'Restraints


            '],['name'=>'Transport To/Form


            '],[ 'name'=>'Helicopter Landing


            '],[ 'name'=>'Stand By


            '],


        ];
        DB::table('medical_requests')->insert($data);
    }
}
