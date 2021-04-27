<?php

use Illuminate\Database\Seeder;

class UnionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $union = App\Union::create([

            'name' => 'اتحاد محافظة دمشق',
            'city_id' => '1',

        ]);
        $union=App\Union::create([

            'name'=>'اتحاد محافظة حمص',
            'city_id'=>'2',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة حماه',
            'city_id' => '3',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة القنيطرة',
            'city_id' => '4',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة درعا',
            'city_id' => '5',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة السويداء',
            'city_id' => '6',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة طرطوس',
            'city_id' => '7',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة اللاذقية',
            'city_id' => '8',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة ادلب',
            'city_id' => '9',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة حلب',
            'city_id' => '10',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة الرقة',
            'city_id' => '11',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة دير الزور',
            'city_id' => '12',

        ]);
        $union = App\Union::create([

            'name' => 'اتحاد محافظة الحسكة',
            'city_id' => '13',

        ]);
        
    }
}
