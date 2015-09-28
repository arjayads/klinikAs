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
        $r = range(1, 100);
        foreach($r as $v) {
            DB::table('Patient')->insert(
                [
                    'firstName'    => 'John' . $v,
                    'lastName' => 'Doe' . $v,
                    'birthDate' => '1987-01-02',
                    'sex' => $v % 2 == 0 ? 'Male' : 'Female'
                ]
            );
        }
    }
}
