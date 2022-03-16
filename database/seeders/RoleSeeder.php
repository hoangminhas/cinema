<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = new Role();
        $roles->name = 'admin';
        $roles->save();

        $roles = new Role();
        $roles->name = 'user';
        $roles->save();
    }
}
