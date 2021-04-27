<?php

use Illuminate\Database\Seeder;

class AssociationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assoc=App\Association::create([


            'association_id'=>'1',
            'name'=>'جمعية الحدادين',
            'decision_number'=>'1',
            'decision_date'=>'20-10-2020',
            'union_id'=>'1'
        ]);
        $assoc = App\Association::create([


            'association_id' => '1',
            'name' => 'جمعية النجارين',
            'decision_number' => '2',
            'decision_date' => '20-10-2020',
            'union_id' => '2'

        ]);
    }
}
