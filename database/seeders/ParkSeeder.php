<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Park;

class ParkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //I used a seeder to add park data as time was limited on the test
        Park::upsert([['name' => 'Sywell Country park'],
        ['name'=>'Brixworth Country Park'],
        ['name'=>'St Davids Park'] 
        ], uniqueBy: ['name'], update: ['name']);
    }
}
