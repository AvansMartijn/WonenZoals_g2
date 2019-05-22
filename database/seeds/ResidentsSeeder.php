<?php

use Illuminate\Database\Seeder;
use \App\Resident;
class ResidentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residents')->delete();
        $residents = [

            ['id' => 1, 'name' => "henk", "img_url" => '', "description" => ''],
            ['id' => 2, 'name' => "piet", "img_url" => '', "description" => ''],
            ['id' => 3, 'name' => "petra", "img_url" => '', "description" => ''],
            ['id' => 4, 'name' => "jan", "img_url" => '', "description" => ''],
     
        ];

        foreach($residents as $resident){
            Resident::create($resident);
        };
    }
}
