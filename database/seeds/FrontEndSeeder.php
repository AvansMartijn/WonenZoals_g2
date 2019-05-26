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
            ['id' => 1, 'summary' => 'Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...', 'title' => 'Brabants Dagblad 29 november 2018', 'content' => '<h2 class="font-weight-bold text-readable" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1.8rem; letter-spacing: 1.3px; color: #212529; font-family: sans-serif; background-color: #ffffff;">Woonzorg appartementen voor jongeren op plaats oude school Mozartsingel</h2>
            <p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">DEN BOSCH &ndash; De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jongeren tussen de 20 en de 35 jaar met een lichte beperking.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">Het plan is een initiatief van BrabantWonen en ontwikkeld na diverse gesprekken met omwonenden. De jongeren komen er in de toekomst in groepsverband te wonen, waarbij elke jongere een eigen appartement heeft in een van de twee bouwlagen. Het complex heeft twee gemeenschappelijke ruimten, onder meer om te eten. Op het terrein komen elf parkeerplaatsen.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /></p>
            <h2 class="font-weight-bold text-readable" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1.8rem; letter-spacing: 1.3px; color: #212529; font-family: sans-serif; background-color: #ffffff;">Professionele begeleiding</h2>
            <p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">In het complex is straks 24 uur per dag zorg beschikbaar, is er altijd professionele begeleiding en is er &rsquo;s nachts altijd een slaapwacht aanwezig. Overdag verblijven de jongeren met een lichte verstandelijke of lichamelijke beperking niet in het gebouw, maar is er altijd dagbesteding of werk buitenshuis.</span></p>', 'img_url' => 'https://wonenzoals.mardy.tk/img/uploads/5ce69d1acb19a-News.jpeg'],
            ['id' => 2, 'summary' => 'Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...', 'title' => 'Brabants Dagblad 29 november 2018', 'content' => '<h2 class="font-weight-bold text-readable" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1.8rem; letter-spacing: 1.3px; color: #212529; font-family: sans-serif; background-color: #ffffff;">Woonzorg appartementen voor jongeren op plaats oude school Mozartsingel</h2>
            <p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">DEN BOSCH &ndash; De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jongeren tussen de 20 en de 35 jaar met een lichte beperking.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">Het plan is een initiatief van BrabantWonen en ontwikkeld na diverse gesprekken met omwonenden. De jongeren komen er in de toekomst in groepsverband te wonen, waarbij elke jongere een eigen appartement heeft in een van de twee bouwlagen. Het complex heeft twee gemeenschappelijke ruimten, onder meer om te eten. Op het terrein komen elf parkeerplaatsen.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /></p>
            <h2 class="font-weight-bold text-readable" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1.8rem; letter-spacing: 1.3px; color: #212529; font-family: sans-serif; background-color: #ffffff;">Professionele begeleiding</h2>
            <p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">In het complex is straks 24 uur per dag zorg beschikbaar, is er altijd professionele begeleiding en is er &rsquo;s nachts altijd een slaapwacht aanwezig. Overdag verblijven de jongeren met een lichte verstandelijke of lichamelijke beperking niet in het gebouw, maar is er altijd dagbesteding of werk buitenshuis.</span></p>', 'img_url' => 'https://wonenzoals.mardy.tk/img/uploads/5ce69d1acb19a-News.jpeg'],
            ['id' => 3, 'summary' => 'Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...', 'title' => 'Brabants Dagblad 29 november 2018', 'content' => '<h2 class="font-weight-bold text-readable" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1.8rem; letter-spacing: 1.3px; color: #212529; font-family: sans-serif; background-color: #ffffff;">Woonzorg appartementen voor jongeren op plaats oude school Mozartsingel</h2>
            <p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">DEN BOSCH &ndash; De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jongeren tussen de 20 en de 35 jaar met een lichte beperking.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">Het plan is een initiatief van BrabantWonen en ontwikkeld na diverse gesprekken met omwonenden. De jongeren komen er in de toekomst in groepsverband te wonen, waarbij elke jongere een eigen appartement heeft in een van de twee bouwlagen. Het complex heeft twee gemeenschappelijke ruimten, onder meer om te eten. Op het terrein komen elf parkeerplaatsen.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /></p>
            <h2 class="font-weight-bold text-readable" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1.8rem; letter-spacing: 1.3px; color: #212529; font-family: sans-serif; background-color: #ffffff;">Professionele begeleiding</h2>
            <p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">In het complex is straks 24 uur per dag zorg beschikbaar, is er altijd professionele begeleiding en is er &rsquo;s nachts altijd een slaapwacht aanwezig. Overdag verblijven de jongeren met een lichte verstandelijke of lichamelijke beperking niet in het gebouw, maar is er altijd dagbesteding of werk buitenshuis.</span></p>', 'img_url' => 'https://wonenzoals.mardy.tk/img/uploads/5ce69d1acb19a-News.jpeg'],
            ['id' => 4, 'summary' => 'Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...', 'title' => 'Brabants Dagblad 29 november 2018', 'content' => '<h2 class="font-weight-bold text-readable" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1.8rem; letter-spacing: 1.3px; color: #212529; font-family: sans-serif; background-color: #ffffff;">Woonzorg appartementen voor jongeren op plaats oude school Mozartsingel</h2>
            <p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">DEN BOSCH &ndash; De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jongeren tussen de 20 en de 35 jaar met een lichte beperking.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">Het plan is een initiatief van BrabantWonen en ontwikkeld na diverse gesprekken met omwonenden. De jongeren komen er in de toekomst in groepsverband te wonen, waarbij elke jongere een eigen appartement heeft in een van de twee bouwlagen. Het complex heeft twee gemeenschappelijke ruimten, onder meer om te eten. Op het terrein komen elf parkeerplaatsen.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; background-color: #ffffff;" /></p>
            <h2 class="font-weight-bold text-readable" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2; font-size: 1.8rem; letter-spacing: 1.3px; color: #212529; font-family: sans-serif; background-color: #ffffff;">Professionele begeleiding</h2>
            <p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px;">In het complex is straks 24 uur per dag zorg beschikbaar, is er altijd professionele begeleiding en is er &rsquo;s nachts altijd een slaapwacht aanwezig. Overdag verblijven de jongeren met een lichte verstandelijke of lichamelijke beperking niet in het gebouw, maar is er altijd dagbesteding of werk buitenshuis.</span></p>', 'img_url' => 'https://wonenzoals.mardy.tk/img/uploads/5ce69d1acb19a-News.jpeg'],
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
            ['id' => 1, 'name' => 'Stichting eigen huis', 'hyperlink' => 'https://www.mijneigenthuis.eu/', 'img_url' => 'http://dev.mardy.tk/img/uploads/5ce6ad987dac0-mijneigenthuis.png'],
            ['id' => 2, 'name' => 'NSGK', 'hyperlink' => 'https://www.nsgk.nl/', 'img_url' => 'http://dev.mardy.tk/img/uploads/5ce6ada41c6be-nsgk.png'],
            ['id' => 3, 'name' => 'PLATO', 'hyperlink' => 'https://www.tsvplato.nl/', 'img_url' => 'http://dev.mardy.tk/img/uploads/5ce6adafa846c-plato.png'],
            ['id' => 4, 'name' => 'Yell&Yonkers', 'hyperlink' => 'https://www.yellenyonkers.nl/', 'img_url' => 'http://dev.mardy.tk/img/uploads/5ce6adc0d3863-LogoYY_2015.png'],
            ['id' => 5, 'name' => 'Fra-pant', 'hyperlink' => 'https://www.fra-pant.nl/', 'img_url' => 'http://dev.mardy.tk/img/uploads/5ce6adcd2720c-roodborstje.png'],

        ];

        foreach($sponsors as $sponsor){
            Sponsor::create($sponsor);
        };
    }
}
