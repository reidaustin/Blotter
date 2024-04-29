<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *ttttttt
     * @return void
     */
    public function run()
    {
        //
        $admin = new Admin;
        $admin->name = 'blotter';
        $admin->email= "admin@blotter.com";
        $admin->password =Hash::make('blotter');
        //$admin->image= "user.jpg";
        $admin->save(); 
    }
}
