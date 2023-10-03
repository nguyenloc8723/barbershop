<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $test = [];
        for($i= 1; $i<=10; $i++){
            $test[] = [
                "name"=>    "Nguyễn Văn A",
                'password' => Hash::make('12345678')
                
            ];
        }
        DB::table('users')->insert($test);
    }
}
