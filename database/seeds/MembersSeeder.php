<?php

use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member=App\Member::create([

            'name'=>'member_1',
            'fname'=>'fember_1',
            'mname'=>'m_member_1',
            'lname'=>'l_member_1',
            'birthdate'=>'21-10-2020',
            'address'=>'homs',
            'phone'=>'0938181296',
            'affiliation_year'=>'2020',
            'exam_id'=>'1',
            'image'=> 'assets/images/logo.svg',
            'status'=>'على رأس العمل',
            'association_id'=>'1'
        ]);
        $member = App\Member::create([

            'name' => 'member_2',
            'fname' => 'fmember_2',
            'mname' => 'm_member_2',
            'lname' => 'l_member_2',
            'birthdate' => '21-10-2020',
            'address' => 'homs',
            'phone' => '0938181296',
            'affiliation_year' => '2020',
            'exam_id' => '2',
            'image' => 'assets/images/logo.svg',
            'status' => 'متقاعد',
            'association_id' => '1'
        ]);
        $member = App\Member::create([

            'name' => 'member_3',
            'fname' => 'fmember_3',
            'mname' => 'm_member_3',
            'lname' => 'l_member_3',
            'birthdate' => '21-10-2020',
            'address' => 'homs',
            'phone' => '0938181296',
            'affiliation_year' => '2020',
            'exam_id' => '3',
            'image' => 'assets/images/logo.svg',
            'status' => 'متقاعد',
            'association_id' => '1'
        ]);
        $member = App\Member::create([

            'name' => 'member_4',
            'fname' => 'fmember_4',
            'mname' => 'm_member_4',
            'lname' => 'l_member_4',
            'birthdate' => '21-10-2020',
            'address' => 'homs',
            'phone' => '0938181296',
            'affiliation_year' => '2020',
            'exam_id' => '4',
            'image' => 'assets/images/logo.svg',
            'status' => 'مفصول',
            'association_id' => '1'
        ]);
        $member = App\Member::create([

            'name' => 'member_5',
            'fname' => 'fmember_5',
            'mname' => 'm_member_5',
            'lname' => 'l_member_5',
            'birthdate' => '21-10-2020',
            'address' => 'homs',
            'phone' => '0938181296',
            'affiliation_year' => '2020',
            'exam_id' => '5',
            'image' => 'assets/images/logo.svg',
            'status' => 'ايقاف عمل',
            'association_id' => '1'
        ]);
    }
}
