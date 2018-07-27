<?php

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>   'Admin',
            'slug'=>   'admin',
            'special'=>'all-access',
        ]);
    }
}
