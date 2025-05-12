<?php

namespace Database\Seeders;

use App\Models\Processors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Processors::factory()->count(1)->create([
            'name' => 'Usuarios',
        ]);
    }
}
