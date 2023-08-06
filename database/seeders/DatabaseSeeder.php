<?php

namespace Database\Seeders;

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
        // $user = \App\Models\User::factory()->create();
        $this->call([
            RoleCreationSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
