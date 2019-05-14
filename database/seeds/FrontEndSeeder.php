<?php

use Illuminate\Database\Seeder;

class FrontEndSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('newsitems')->delete();
        DB::table('locations')->delete();
        DB::table('contact_subjects')->delete();
        DB::table('sponsors')->delete();

        $news = [
            ['id' => 1, 'title' => 'nieuwsitem', 'content' => '!!!!'],
            ['id' => 2, 'title' => 'nieuwsitem', 'content' => '!!!!'],
            ['id' => 3, 'title' => 'nieuwsitem', 'content' => '!!!!'],
            ['id' => 4, 'title' => 'nieuwsitem', 'content' => '!!!!'],
        ];

        foreach($news as $newsitem){
            Newsitem::create($newsitem);
        };

        $locations = [
            ['id' => 1, 'street' => 'Graafseweg', 'number' => '247', 'postal' => '6603CG', 'city' => 'Wijchen'],
        ];

        foreach($locations as $location){
            Location::create($location);
        };

        $subjects = [
            ['id' => 1, 'subject' => 'vraag'],
            ['id' => 1, 'subject' => 'afmelden nieuwsbrief'],
            ['id' => 1, 'subject' => 'aanmelden woningzoekende'],
            ['id' => 1, 'subject' => 'ouderaccount aanvragen'],
        ];

        foreach($subjects as $subject){
            ContactSubject::create($subjects);
        };

        $sponsors = [
            ['id' => 1, 'name' => 'vraag', 'hyperlink' => '', 'img_url' => ''],
        ];

        foreach($sponsors as $sponsor){
            Sponsor::create($sponsor);
        };
    }
}
