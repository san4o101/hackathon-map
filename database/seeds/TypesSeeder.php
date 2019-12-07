<?php


class TypesSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        \App\Entity\ObjectType::create([
            'type' => 'Магазин'
        ]);
        \App\Entity\ObjectType::create([
            'type' => 'Кіоск'
        ]);
        \App\Entity\ObjectType::create([
            'type' => 'Павільйон'
        ]);
    }

}
