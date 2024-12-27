<?php

namespace Database\Seeders;

use App\Models\Tavern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TavernSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tavern::factory()->count(5)->create();
    }
}
