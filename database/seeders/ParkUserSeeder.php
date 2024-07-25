<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ParkUser;

class ParkUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ParkUser::create([
            'name' => 'Test User1',
            'email' => 'test1@example.com',
            'location' => 'Leicester'
        ]);
    }
}
