<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\JobFinal;

class JobFinalSeeder extends Seeder
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
            ['name'=>'Condition Corrected'],
            ['name'=>'Unnecessary'],['name'=>'Arrest'],[ 'name'=>'Summons'],[ 'name'=>'Report Prepared'],
            [ 'name'=>'Unfounded'],[ 'name'=>'Incident Referred'],[ 'name'=>'Outside Agency Notified'],[ 'name'=>'Other'],

        ];
        DB::table('job_finals')->insert($data);
    }
}
