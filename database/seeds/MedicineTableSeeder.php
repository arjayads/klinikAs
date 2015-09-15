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
            DB::table('Medicine')->insert(
                [
                    'name'    => 'Brand ' . $v
                ]
            );
        }
    }
}
