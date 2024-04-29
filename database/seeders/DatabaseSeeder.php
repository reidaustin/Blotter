<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdminSeeder::class,
            OfficerSeeder::class,
            JobFinalSeeder::class,
            CrimeSeeder::class,
            RequestSeeder::class,
            MedicalRequestSeeder::class,
            CodesAlarmSeeder::class,
            OtherSeeder::class,
            BuildingSeeder::class,
            ParkingLotSeeder::class,
            AreaSeeder::class,
            IncidentTypeSeeder::class,
            TourCommanderSeeder::class,
            SupervisorSeeder::class,
            SerialNumberSeeder::class,
            SerialNumber2Seeder::class,
            SerialNumber3Seeder::class
        ]);
    }
}
