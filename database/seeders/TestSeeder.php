<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tests')->delete();
        $test =[
            ['name'=>'test 1'],
            ['name'=>'test 2'],
            ['name'=>'test 3'],
            ['name'=>'test 4'],
            ['name'=>'test 5'],
            ['name'=>'test 6'],
        ];
        DB::table('tests')
            ->insert($test);
    }
}
