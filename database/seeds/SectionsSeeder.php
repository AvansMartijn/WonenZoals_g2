<?php

use Illuminate\Database\Seeder;
use \App\Section;
use \App\SectionType;
use \App\DefaultSection;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('default_sections')->delete();
        DB::table('sections')->delete();
        DB::table('section_types')->delete();

        $section_types = [
            ['id' => 1, 'type' => 'leaf'],
            ['id' => 2, 'type' => 'seperator'],
            ['id' => 3, 'type' => 'text'],
            ['id' => 4, 'type' => 'residents'],
            ['id' => 5, 'type' => 'news'],
            ['id' => 6, 'type' => 'contact'],
            ['id' => 7, 'type' => 'sponsors']
        ];

        foreach($section_types as $type){
            SectionType::create($type);
        };

        $sections = [
            ['id' => 1, 'order' => 1, 'name' => 'leaf', 'content' => '<p><span style="color: #ffffff; font-family: sans-serif; font-size: 14.4px; text-align: center;">Een groepje ouders heeft zich in 2011 verenigd&nbsp;</span><br style="box-sizing: border-box; color: #ffffff; font-family: sans-serif; font-size: 14.4px; text-align: center; background-color: rgba(133, 119, 147, 0.75);" /><span style="color: #ffffff; font-family: sans-serif; font-size: 14.4px; text-align: center;">om gezamenlijk een initiatief op te starten voor hun kinderen.</span><br style="box-sizing: border-box; color: #ffffff; font-family: sans-serif; font-size: 14.4px; text-align: center; background-color: rgba(133, 119, 147, 0.75);" /><span style="color: #ffffff; font-family: sans-serif; font-size: 14.4px; text-align: center;">Met als doel om vanaf ongeveer 2019 een gezamenlijk wooninitiatief gerealiseerd te hebben</span></p>', 'type_id' => 1, 'default_section' => 1],
            ['id' => 2, 'order' => 2, 'name' => 'stichting zoals', 'content' => '<p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">Een groepje ouders heeft zich in 2011 verenigd om gezamenlijk een initiatief op te starten voor hun kinderen met als doel om vanaf ongeveer 2019 een project gerealiseerd te hebben.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">Besloten is om dit samen met een zorgaanbieder te doen in de vorm van een wooninitiatief.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">De kinderen zijn, als een oplevering rond 2019 plaats zou vinden, allen jong volwassenen.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">De ouders hebben een belangrijke stem in de zorg die geboden wordt en in de sfeer die wordt gecre&euml;erd in huis. Wonen in een kleinschalige woonvorm, ge&iuml;ntegreerd in de maatschappelijke omgeving, vinden wij daarom een belangrijke voorwaarde om volwaardig deel te kunnen nemen aan onze samenleving.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">Wij zien onze kinderen, inmiddels (bijna) volwassen, als een kwetsbare groep. Op dit moment is het voor geen van de toekomstige bewoners mogelijk of wenselijk om zelfstandig te wonen. Wij willen om die reden een woongroep initi&euml;ren, waarin elke bewoner de zorg krijgt die hij of zij nodig heeft. Wij denken daarbij aan een gemengde groep van 18 jongvolwassenen, die elk een eigen appartement hebben. Binnen het complex is 24 uur per dag professionele zorg aanwezig die de bewoners waar nodig ondersteunt. Wij streven naar een warme sfeer, waarin veiligheid en geborgenheid de centrale thema&rsquo;s zijn. Naast de individuele appartementen zijn er ook gezamenlijke ruimten, waarin de bewoners wanneer zij dat willen, elkaar ontmoeten en gezamenlijk kunnen koken en eten. Uitgangspunt is dat de keuzevrijheid centraal staat.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">Daarnaast vinden wij het solidariteitsprincipe een belangrijk uitgangspunt. Het gezamenlijke belang staat centraal bij de totstandkoming van het project en ook na realisatie. Wij verwachten daarbij dat een ieder op zijn/haar wijze een steentje bijdraagt aan het geheel. Te denken valt aan mee ontwikkelen, maar ook later het inzetbaar zijn bij activiteiten aanvullend op de professionele inzet.</span></p>', 'type_id' => 3, 'default_section' => 1],
            ['id' => 3, 'order' => 3, 'name' => 'Wonen Zoals', 'content' => 'Beschermd wonen', 'type_id' => 2, 'default_section' => 1],
            ['id' => 4, 'order' => 4, 'name' => 'bewoners', 'content' => '', 'type_id' => 4, 'default_section' => 1],
            ['id' => 5, 'order' => 5, 'name' => 'ondersteuning', 'content' => '<p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">De Stichting Zoals wordt door de belastingdienst aangemerkt als Algemeen Nut Beogende Instelling (ANBI), hetgeen o.a de weg vrij maakt voor het geheel of gedeeltelijk aftrekbaar maken van giften, schenkingen en legaten van het belastbaar inkomen van de gever.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">Naast donaties en giften stellen wij iedere hulp van bedrijven, instellingen en particulieren bijzonder op prijs. Als de Stichting Zoals meer vaste grond onder de voeten krijgt zal er op tal van terreinen praktische hulp en support nodig zijn. Mocht u nu al willen bijdragen aan onze ontwikkeling of goed voorbereid willen zijn voor als er eenmaal gebouwd en gewoond wordt neem dan contact op met het bestuur van de stichting Zoals (bestuur@wonenzoals.nl/GSM 06-533 765 72)&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #f8fafc;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px;">NSGK ondersteunt Stichting Woongroep Zoals, waarvoor wij hen zeer dankbaar zijn.</span></p>', 'type_id' => 3, 'default_section' => 1],
            ['id' => 6, 'order' => 6, 'name' => 'Wonen Zoals', 'content' => 'Beschermd wonen', 'type_id' => 2, 'default_section' => 1],
            ['id' => 7, 'order' => 7, 'name' => 'nieuws', 'content' => '', 'type_id' => 5, 'default_section' => 1],
            ['id' => 8, 'order' => 8, 'name' => 'contact', 'content' => '', 'type_id' => 6, 'default_section' => 1],
            ['id' => 9, 'order' => 9, 'name' => 'sponsors', 'content' => '', 'type_id' => 7, 'default_section' => 1]
            
        ];

        foreach($sections as $section){
            Section::create($section);
            DefaultSection::create($section);
        };
    }
}
