<?php

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
        $this->call(GroupsSeeder::class);
        $this->call(IClassSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionsSeeder::class);
    }
}
