<?php


class SpecializationSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        \App\Entity\Specialization::create([
            'title' => 'ПРодовольчі'
        ]);
        \App\Entity\Specialization::create([
            'title' => 'Не продовольчі'
        ]);
    }

}
