<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_rapport = Type::create(['name'=>'Rapport écoutante']);
        $type_rapport = Type::create(['name'=>'Rapport assistante']);
        $type_rapport = Type::create(['name'=>'Rapport psychologue']);
        $type_rapport = Type::create(['name'=>'Rapport avocat']);
    }
}
