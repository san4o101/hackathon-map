<?php


class SpecializationSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        \DB::table((new \App\Entity\Specialization())->getTable())->delete();
        \App\Entity\Specialization::create([
            'title' => 'Продовольчі'
        ]);
        \App\Entity\Specialization::create([
            'title' => 'Не продовольчі'
        ]);
    }

}
