<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city=App\City::create([
            'name'=>'دمشق',
            'postal_code'=>'011'
        ]);
        $city = App\City::create([
            'name' => 'حمص',
            'postal_code' => '031'
        ]);
        $city = App\City::create([
            'name' => 'حماه',
            'postal_code' => '033'
        ]);
        $city = App\City::create([
            'name' => 'القنيطرة',
            'postal_code' => '014'
        ]);
        $city = App\City::create([
            'name' => 'درعا',
            'postal_code' => '015'
        ]);
        $city = App\City::create([
            'name' => 'السويداء',
            'postal_code' => '016'
        ]);
        $city = App\City::create([
            'name' => 'طرطوس',
            'postal_code' => '043'
        ]);
        $city = App\City::create([
            'name' => 'اللاذقية',
            'postal_code' => '041'
        ]);
        $city = App\City::create([
            'name' => 'ادلب',
            'postal_code' => '023'
        ]);
        $city = App\City::create([
            'name' => 'حلب',
            'postal_code' => '021'
        ]);
        $city = App\City::create([
            'name' => 'الرقة',
            'postal_code' => '022'
        ]);
        $city = App\City::create([
            'name' => 'دير الزور',
            'postal_code' => '051'
        ]);
        $city = App\City::create([
            'name' => 'الحسكة',
            'postal_code' => '052'
        ]);
    }
}
