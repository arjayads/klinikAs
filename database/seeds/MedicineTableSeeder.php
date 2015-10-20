<?php

use Illuminate\Database\Seeder;

class MedicineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = range(1, 50);
        foreach($r as $v) {
            $rs = str_random(6);
            DB::table('Medicine')->insert(
                [
                    'genericName'    => 'Generic-' . $rs  . $v,
                    'commercialName'    => 'Commercial-' . $rs . $v,
                    'brand'    => 'Brand-' . $rs . $v,
                    'unitMeasure'    => 'Unit-' . $rs. $v,
                    'defaultInstructions'    => 'Instructions: ' . $rs . $v
                ]
            );
        }
    }
}
