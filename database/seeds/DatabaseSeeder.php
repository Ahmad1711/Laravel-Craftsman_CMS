<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
         $this->call(CitiesSeeder::class);
         $this->call(UnionsSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(AssociationsSeeder::class);
        // $this->call(MembersSeeder::class);
    }
}
