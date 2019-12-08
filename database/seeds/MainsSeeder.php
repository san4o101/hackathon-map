<?php


class MainsSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        \DB::table((new \App\Entity\Main())->getTable())->delete();
        $handle = fopen(__DIR__. '/csv/' . '/Maps_Trades.csv', "r");

        for (;($row = fgetcsv($handle, 0, "#")) !== false;) {
            if($row[9] == 'павільйон') {
                $objID = \App\Entity\ObjectType::where('type', '=', 'Павільйон')->first()->id;
            } elseif ($row[9] == 'магазин') {
                $objID = \App\Entity\ObjectType::where('type', '=', 'Магазин')->first()->id;
            } else {
                $objID = \App\Entity\ObjectType::where('type', '=', 'Кіоск')->first()->id;
            }
            if($row[10] == 'продовольчі') {
                $specID = \App\Entity\Specialization::where('title', '=', 'Продовольчі')->first()->id;
            } else {
                $specID = \App\Entity\Specialization::where('title', '=', 'Не продовольчі')->first()->id;
            }
            if($row[11] == 'борошно') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Борошно')->first()->id;
            } elseif($row[11] == 'будівельні та господарські товари') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Будівельні та господарські товари')->first()->id;
            } elseif($row[11] == 'Кондитерські вироби') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Кондитерські вироби')->first()->id;
            } elseif($row[11] == "м`ясні та ковбасні вироби") {
                $prodID = \App\Entity\RangeProduct::where('title', '=', "М'ясні та ковбасні вироби")->first()->id;
            } elseif($row[11] == 'одяг') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Одяг')->first()->id;
            } elseif($row[11] == 'панчішно-шкарпеткові вироби') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Панчішно-шкарпеткові вироби')->first()->id;
            } elseif($row[11] == 'Поліграфічна продукція') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Поліграфічна продукція')->first()->id;
            } elseif($row[11] == 'Постільна білизна, робочий одяг') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Постільна білизна, робочий одяг')->first()->id;
            } elseif($row[11] == 'Спецодяг для цивільної авіації') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Спецодяг для цивільної авіації')->first()->id;
            } elseif($row[11] == 'Торговельне обладнання, меблі для учбових закладів') {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Торговельне обладнання, меблі для учбових закладів')->first()->id;
            } else {
                $prodID = \App\Entity\RangeProduct::where('title', '=', 'Хлібобулочні вироби')->first()->id;
            }
            if($row[15] == 'Пн-Нд 08:00-18:00, Сб 08:00-16:00') {
                $openID = \App\Entity\Opening::where('saturday', '=', '8:00-16:00')->first()->id;
            } elseif($row[15] == 'Пн-Нд 08:00-20:00') {
                $openID = \App\Entity\Opening::where('monday', '=', '8:00-20:00')->first()->id;
            } elseif($row[15] == 'Пн-Нд 08:00-20:00, Ср 08:00-19:00') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '8:00-19:00')->first()->id;
            } elseif($row[15] == 'Пн-Нд 08:00-21:00') {
                $openID = \App\Entity\Opening::where('monday', '=', '8:00-21:00')->first()->id;
            } elseif($row[15] == 'Пн-Нд 08:00-21:00, Ср 08:00-19:00') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '8:00-19:00')->first()->id;
            } elseif($row[15] == 'Пн-Нд 08:00-21:00, Ср 08:00-20:00') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '8:00-20:00')->first()->id;
            } elseif($row[15] == 'Пн-Нд 08:00-22:00') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '8:00-22:00')->first()->id;
            } elseif($row[15] == 'Пн-Пт 08:00-16:30') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '8:00-16:30')->first()->id;
            } elseif($row[15] == 'Пн-Пт 08:00-17:00') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '8:00-17:00')->first()->id;
            } elseif($row[15] == 'Пн-Пт 08:00-17:00, Сб 10:00-16:00') {
                $openID = \App\Entity\Opening::where('saturday', '=', '10:00-16:00')->first()->id;
            } elseif($row[15] == 'Пн-Пт 09:00-18:00') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '9:00-18:00')->first()->id;
            } elseif($row[15] == 'Пн-Пт 10:00-19:30') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '10:00-19:30')->first()->id;
            } elseif($row[15] == 'Пн-Сб 08:00-17:00') {
                $openID = \App\Entity\Opening::where('wednesday', '=', '8:00-17:00')->first()->id;
            } else {
                $openID = \App\Entity\Opening::where('sunday', '=', '10:00-16:00')->first()->id;
            }
            \App\Entity\Main::create([
                'name' => $row[0],
                'country' => $row[1],
                'region' => $row[2],
                'city' => $row[3],
                'street' => $row[4],
                'number' => $row[5],
                'homeDesc' => $row[6],
                'latitude' => $row[7],
                'longitude' => $row[8],
                'object_type_id' => $objID,
                'specialization_id' => $specID,
                'product_range_id' => $prodID,
                'supplier' => $row[12],
                'erdpou_code' => $row[13],
                'retail_space' => $row[14],
                'opening_id' => $openID,
                'opening_desc' => $row[16],
            ]);
        }
        fclose($handle);
    }

}
