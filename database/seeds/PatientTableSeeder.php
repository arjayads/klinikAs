<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Patient')->insert(
            [
                'firstName'    => 'John',
                'lastName' => 'Doe',
                'birthDate' => '1987-01-02',
                'sex' => 'Male',
                'maritalStatus' => 'Single'
            ]
        );
    }
}
