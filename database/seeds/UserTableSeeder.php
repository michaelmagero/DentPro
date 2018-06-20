<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(array(
        	'name'=>'Admin',
            'lastname'=>'Administrator',
        	'email'=>'managingdirector@dms.com',
        	'password'=>Hash::make('dmsadmin@_001'),
            'role'=>'admin',
        ));
    }
}
