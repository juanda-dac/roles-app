<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::factory()->count(4)
            ->state(new Sequence(
                ['name' => 'create'],
                ['name' => 'read'],
                ['name' => 'update'],
                ['name' => 'delete'],
            ))->create();
    }
}
