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
        DB::table('User')->insert(
            [
                'email'    => 'arjay@gmail.com',
                'password' => Hash::make('arjay'),
                'isActive'   => true
            ]
         );
    }
}
