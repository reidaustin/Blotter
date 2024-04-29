<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Officer;
use Carbon\Carbon;


class OfficerSeeder extends Seeder
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
            ['full_name'=>'None


            '],
            ['full_name'=>'ADDIEGO, JOSEPH'],
            ['full_name'=>'ATTA, KWAKU'],['full_name'=>'BEATO, PASQUALE'],[ 'full_name'=>'BELL ANDRE'],[ 'full_name'=>'BHIM, STEVEN'],
            [ 'full_name'=>'BONDY, MICHELLE'],[ 'full_name'=>'BONILLA, TITO'],[ 'full_name'=>'BRATCHER, MICHAEL'],[ 'full_name'=>'CAPISTRANO, RODEL'],[ 'full_name'=>'CASTAGNARO, MARIO'],
            [ 'full_name'=>'CHAHAL, SUNDEEP'],[ 'full_name'=>'COBBS, AUSTIN'],[ 'full_name'=>'COBHAM-PENA, LUIS'],[ 'full_name'=>'D’ANGELIS, CHRIS'],[ 'full_name'=>'DAVY, RHEA'],
            [ 'full_name'=>'DELLE, JAMES
            '],[ 'full_name'=>'DORI, KEITH
            '],[ 'full_name'=>'ECCLES, JEROME
            '],[ 'full_name'=>'EPPER, NICHOLAS
            '],
            [ 'full_name'=>'GRANNUM, ROHAN
            '],[ 'full_name'=>'GUNTER, SHARNEL
            '],[ 'full_name'=>'HOLLINGSWORTH, TYQUAN
            '],[ 'full_name'=>'IADEVAIA, VERONICA
            '],[ 'full_name'=>'JACKSON, RACINE
            '],
            [ 'full_name'=>'JEAN-BAPTISTE, MICHAEL
            '],[ 'full_name'=>'JOHNSON, MAKEBA
            '],[ 'full_name'=>'LUCAS, JAIME
            '],[ 'full_name'=>'MCCARTNEY, DENNIS
            '],[ 'full_name'=>'MCCLOUD, LARRY
            '],
            [ 'full_name'=>'MACK, KASION
            '],[ 'full_name'=>'MAJEWSKI, STANLEY
            '],[ 'full_name'=>'MORISSET, MOISE
            '],[ 'full_name'=>'NAPOLES, BRYANT
            '],[ 'full_name'=>'PETERSON, FILIP
            '],
            [ 'full_name'=>'ROBINSON, SASHA
            '],[ 'full_name'=>'RYAN, KENNETH
            '],[ 'full_name'=>'SAINT MARC, JEAN
            '],[ 'full_name'=>'SINGH, ZORAWAR
            '],[ 'full_name'=>'SISON
            '],[ 'full_name'=>'SPENCER, MARK
            '],
            [ 'full_name'=>'SPEROUNIS, MATTHEW
            '],[ 'full_name'=>'ST.MARC, YVON
            '],[ 'full_name'=>'THOMAS, TYRESE
            '],[ 'full_name'=>'TSANTILAS, WILLIAM
            '],[ 'full_name'=>'WALSH, JAMES
            '],
            [ 'full_name'=>'WHITE, CALEB
            '],[ 'full_name'=>'WILLIAMS, RODERICK
            '],


        ];
        DB::table('officers')->insert($data);
    }
}
