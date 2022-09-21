<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUser = Permission::create(['name' => 'create user']);
        $editUser = Permission::create(['name' => 'edit user']);
        $editUser = Permission::create(['name' => 'delete user']);
        $createFicheAcc = Permission::create(['name' => 'create fiche accueil']);
        $editFicheAcc = Permission::create(['name' => 'edit fiche accueil']);
        $deleteFicheAcc = Permission::create(['name' => 'delete fiche accueil']);
        $permission = Permission::create(['name' => 'create fiche ecoute']);
        $permission = Permission::create(['name' => 'edit fiche ecoute']);
        $permission = Permission::create(['name' => 'delete fiche ecoute']);
        $permission = Permission::create(['name' => 'create rapport ecoutante']);
        $permission = Permission::create(['name' => 'edit rapport ecoutante']);
        $permission = Permission::create(['name' => 'delete rapport ecoutante']);
        $permission = Permission::create(['name' => 'create rapport avocat']);
        $permission = Permission::create(['name' => 'edit rapport avocat']);
        $permission = Permission::create(['name' => 'delete rapport avocat']);
        $permission = Permission::create(['name' => 'create rapport assistante sociale']);
        $permission = Permission::create(['name' => 'edit rapport assistante sociale']);
        $permission = Permission::create(['name' => 'delete rapport assistante sociale']);
        $permission = Permission::create(['name' => 'create rapport psychologue']);
        $permission = Permission::create(['name' => 'edit rapport psychologue']);
        $permission = Permission::create(['name' => 'delete rapport psychologue']);
        $permission = Permission::create(['name' => 'create fiche garde']);
        $permission = Permission::create(['name' => 'edit fiche garde']);
        $permission = Permission::create(['name' => 'delete fiche garde']);
        $permission = Permission::create(['name' => 'create fiche consultation']);
        $permission = Permission::create(['name' => 'edit fiche consultation']);
        $permission = Permission::create(['name' => 'delete fiche consultation']);
        $permission = Permission::create(['name' => 'create medicament']);
        $permission = Permission::create(['name' => 'edit medicament']);
        $permission = Permission::create(['name' => 'delete medicament']);
        $permission = Permission::create(['name' => 'create commande']);
        $permission = Permission::create(['name' => 'edit commande']);
        $permission = Permission::create(['name' => 'delete commande']);
        

    }
}
