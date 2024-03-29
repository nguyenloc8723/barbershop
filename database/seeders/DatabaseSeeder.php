<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Stylist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         \App\Models\Service::factory(10)->create();
//         \App\Models\User::factory(5)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            resultSeeder::class,
            bookingSeeder::class,
            Stylist::class,
            timeSheetSeed::class,
            userSeed::class,
            
        ]);
    }
}
