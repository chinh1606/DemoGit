<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('details')->delete();
        $details = [
            ["users_id"=>19, "birth"=>"birth 1"],
            ["users_id"=>20, "birth"=>"birth 2"],
            ["users_id"=>21, "birth"=>"birth 3"],
            ["users_id"=>22, "birth"=>"birth 4"],
            ["users_id"=>23, "birth"=>"birth 5"],
            ["users_id"=>24, "birth"=>"birth 6"],
        ];
        DB::table(("details"))
            ->insert($details);
    }
}
