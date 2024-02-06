<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ["matrimonio", "battesimo", "comunione", "festa all'aperto", "cena", "pranzo"];

        foreach ($array as $i){
            $event = new Tag();
            $event->name = $i;
            $event->save();
        }
    }
}
