<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Role::create(['name' => 'admin']);
        $role=Role::create(['name' => 'accueillante']);
        $role=Role::create(['name' => 'ecoutante']);
        $role=Role::create(['name' => 'assistante']);
        $role=Role::create(['name' => 'psychologue']);
        $role=Role::create(['name' => 'accompagnatrice']);
        $role=Role::create(['name' => 'pharmacien']);
        $role=Role::create(['name' => 'avocat']);
        $role=Role::create(['name' => 'econme']);

    }
}
