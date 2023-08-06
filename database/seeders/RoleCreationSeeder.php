<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleCreationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'super_admin',
        ]);

        Role::create([
            'name' => 'admin',
        ]);

        // End users roles

        // For teachers
        Role::create([
            'name' => 'teacher',
        ]);

        // student who joined the course
        Role::create([
            'name' => 'student',
        ]);

        // subscriber who registered but not enrolled in the course
        Role::create([
            'name' => 'subscriber',
        ]);

    }
}
