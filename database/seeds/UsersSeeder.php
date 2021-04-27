<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=App\User::create([
            'name'=>'super_admin',
            'email'=>'super_admin@gmail.com',
            'password'=>Hash::make('super_admin_pass'),
            'union_id'=>'1',
            'added_by'=>'1'
        ]);
        
    }
}
