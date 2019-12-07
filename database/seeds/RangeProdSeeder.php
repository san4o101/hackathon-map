<?php


class RangeProdSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        \App\Entity\RangeProduct::create([
            'title' => 'Борошно'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Будівельні та господарські товари'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Кондитерські вироби'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => "М'ясні та ковбасні вироби"
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Одяг'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Панчішно-шкарпеткові вироби'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Поліграфічна продукція'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Постільна білизна, робочий одяг'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Спецодяг для цивільної авіації'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Торговельне обладнання, меблі для учбових закладів'
        ]);
        \App\Entity\RangeProduct::create([
            'title' => 'Хлібобулочні вироби'
        ]);
    }

}
