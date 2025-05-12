<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Processors;
use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roleAdmin = Role::where('name', '=','admin')->first();
        $roleUser = Role::where('name', '=', 'user')->first();



        $read = Permission::where('name', '=', 'read')->first();
        $write = Permission::where('name', '=', 'create')->first();
        $delete = Permission::where('name', '=', 'delete')->first();
        $update = Permission::where('name', '=', 'update')->first();
    

        $users_processor = Processors::where('name', '=', 'Usuarios')->first();

        DB::table('permissions_role')->insert([
            'id' => Str::uuid(),
            'processor_id' => $users_processor->id,
            'permission_id' => $read->id,
            'role_id' => $roleAdmin->id,
        ]);

        DB::table('permissions_role')->insert([
            'id' => Str::uuid(),
            'processor_id' => $users_processor->id,
            'permission_id' => $write->id,
            'role_id' => $roleAdmin->id,
        ]);

        DB::table('permissions_role')->insert([
            'id' => Str::uuid(),
            'processor_id' => $users_processor->id,
            'permission_id' => $delete->id,
            'role_id' => $roleAdmin->id,
        ]);

        DB::table('permissions_role')->insert([
            'id' => Str::uuid(),
            'processor_id' => $users_processor->id,
            'permission_id' => $update->id,
            'role_id' => $roleAdmin->id,
        ]);

        DB::table('permissions_role')->insert([
            'id' => Str::uuid(),
            'processor_id' => $users_processor->id,
            'permission_id' => $read->id,
            'role_id' => $roleUser->id,
        ]);

        DB::table('permissions_role')->insert([
            'id' => Str::uuid(),
            'processor_id' => $users_processor->id,
            'permission_id' => $write->id,
            'role_id' => $roleUser->id,
        ]);

    }
}
