<?php

use Illuminate\Database\Seeder;
use \App\Newsitem;
use \App\Location;
use \App\ContactSubject;
use \App\Sponsor;

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
            ['id' => 2, 'subject' => 'afmelden nieuwsbrief'],
            ['id' => 3, 'subject' => 'aanmelden woningzoekende'],
            ['id' => 4, 'subject' => 'ouderaccount aanvragen'],
        ];

        foreach($subjects as $subject){
            ContactSubject::create($subject);
        };

        $sponsors = [
            ['id' => 1, 'name' => 'Stichting eigen huis', 'hyperlink' => 'https://www.mijneigenthuis.eu/', 'img_url' => 'imgurl.com'],
            ['id' => 2, 'name' => 'NSGK', 'hyperlink' => 'https://www.nsgk.nl/', 'img_url' => ''],
            ['id' => 3, 'name' => 'PLATO', 'hyperlink' => 'https://www.tsvplato.nl/', 'img_url' => ''],
            ['id' => 4, 'name' => 'Yell&Yonkers', 'hyperlink' => 'https://www.yellenyonkers.nl/', 'img_url' => ''],
            ['id' => 5, 'name' => 'Fra-pant', 'hyperlink' => 'www.fra-pant.nl/', 'img_url' => ''],

        ];

        foreach($sponsors as $sponsor){
            Sponsor::create($sponsor);
        };
    }
}
