<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('markers')->insert([
        	'latitude' 	=> '51.173315',
        	'longitude' => '4.371867',
        	'name' 		=> 'KdG Campus Hoboken',
        	'address' 	=> 'Salesianenlaan 90, 2660 Antwerpen'
        ]);
    }
}
