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

            ['id' => 1, 'name' => "Rik", "img_url" => 'http://wonenzoals.local/img/uploads/5ce6a9297a30b-Rik.jpg', "description" => '<p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik ben Rik, geboren op 2 november 1997. Ik ben geboren onder de rook van de Sint Jan. Mijn geboorte verliep normaal en er waren geen tekenen van dat ik een beperking had. Wel had ik bij mijn geboorte  12 vingers, ik had 2 extra pinken, die ook de dag naar mijn geboorte zijn verwijderd ook had ik astma en was ik regelmatig benauwd. Toen ik 3 was kreeg ik last van zware epilepsie aanvallen en dat was het enige wat er toen werd geconstateerd. Omdat ik niet wilde praten (nu zou je het niet meer geloven) zat ik op speciaal kleuter onderwijs. En ben dan ook gewoon gestart op een normale basis school. Omdat ik daar niet mee kon ging ik naar de Gabriel Mytylschool omdat er toch iets was van een beperking, zowel motorisch en verstandelijk. Maar nog steeds was er niet echt een aantoonbare handicap aan te wijzen. Omdat ik 12 vingers had was er blijkbaar wel genetisch iets niet in orde. Toen ik 8 was werden mijn ouders gebeld door het ziekenhuis en moest ik met spoed diverse onderzoeken ondergaan en een echo van mijn hart laten maken, omdat men tijdens een nieuw onderzoek van mijn bloed had ontdekt dat ik het syndroom van Di-George had ook wel bekend als Het deletie 22q11.2 syndroom, toen dit bekend werd viel alles op zijn plaats.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Op dit moment woon ik nog thuis, maar kan ik niet wachten tot ik een eigen huisje heb, mijn hobby&rsquo;s zijn het maken van muziek en natuurlijk voetbal. Met mijn vader ga ik naar FC den Bosch, en kom daar dan altijd Auke tegen. Een groot deel van de mensen die komen wonen in de woongroep ken ik van school. Ik ben graag op mij zelf maar vind het samen naar voetbal kijken of even gamen ook fijn.</span></p>'],
            ['id' => 2, 'name' => "Simon", "img_url" => 'http://wonenzoals.local/img/uploads/5ce6a95f2ffa5-Simon.jpg', "description" => '<p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik ben Simon, geboren op 18 september 1996 en kom uit &rsquo;s-Hertogenbosch.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">In het dagelijks leven werk ik 4 dagen in de horeca bij In de Roos. Naast werken bij In de Roos, ben ik heel actief in de cultuur van de stad. Ik organiseer culturele evenementen bij de Muzerije en doe vrijwilligerswerk bij evenementen. Ik ben Citytrainer van &rsquo;s-Hertogenbosch. Dat betekent dat ik een opleiding heb gevolgd om culturele evenementen te mogen organiseren. Bij de opleiding kwamen er verschillende dingen naar voren die belangrijk bij het organiseren van een event, zoals begroting, promotie, werving, en in welke stappen je werkt !&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ook doe ik aan tennis en train elke woensdagavond. We spelen regelmatig een toernooi.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik zie mijn toekomst zeer positief tegemoet, ben altijd positief en geniet van de dag. Dat is tevens mijn motto!&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik verwacht van het wonen later, samen met leuke leeftijdsgenoten een leuke woongroep hebben, een plek waar ik me thuis kan voelen!</span></p>'],
            ['id' => 3, 'name' => "Chelsey", "img_url" => 'http://wonenzoals.local/img/uploads/5ce6a970d6018-Chelsey.jpg', "description" => '<p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik ben Chelsey, geboren op 15 december 1996. Ik ben werkzaam bij In de Roos, een lunchcaf&eacute; in Zaltbommel. Ik sta daar achter de bar, werk in de bediening, in de voorbereidingskeuken en op zaal. Al met al een leuke afwisselende baan. Ook heb ik hobbys, zoals dansen, shoppen, naar de bioscoop gaan, stappen en op vakantie gaan. Ik ga heel graag wonen in woongroep Zoals omdat daar veel van mijn oude klasgenoten gaan wonen en dat wordt heel erg gezellig. Ik vind het ook erg fijn om op eigen benen te staan.</span></p>'],
            ['id' => 4, 'name' => "Nick", "img_url" => 'http://wonenzoals.local/img/uploads/5ce6a98237a9a-Nick.jpg', "description" => '<p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik ben Nick, geboren op 3 januari 1986 in Oss.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Op dit moment woon ik bij mijn moeder in Oss. Ik ben geboren met Spina Bifida en daardoor zit ik in een rolstoel.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik werk al 9 jaar met veel plezier bij Lunchroom In de Roos in Den Bosch.  Bij in de Roos ben ik o.a. gastheer en doe ik kassa- en receptiewerkzaamheden. Ik werk daar 4 dagen in de week.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Mijn grootste hobby is rolstoelbasketbal. Ik speel zelf bij basketbalclub de Black Eagles in Rosmalen. Ik train in sporthal de Hazelaar in Rosmalen en speel basketbalwedstrijden. Ik ben een trouwe supporter van basketbalclub de New Heroes uit Den Bosch en ik ga naar de wedstrijden van de New Heroes kijken. Daarnaast heb ik nog andere hobby&rsquo;s zoals voetballen kijken, computerspellen spelen en muziek luisteren. Ik kan ook heel erg genieten van lekker eten. Ik ben een spontane en sociale jongeman en sta heel positief in het leven.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik ga heel graag wonen in de woongroep Wonen Zoals en heb daar heel veel zin in! Ik hoop dat we daar met z&rsquo;n allen met veel plezier kunnen wonen in een fijne huiselijke sfeer!</span></p>'],
            ['id' => 5, 'name' => "Isabel", "img_url" => 'http://wonenzoals.local/img/uploads/5ce6a9b365cb8-Isabel.jpg', "description" => '<p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik ben Isabel, geboren op 28 april 1998.&nbsp;</span><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><br style="box-sizing: border-box; color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;" /><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik heb o.a. op de Gabriel school gezeten en daarna op het stedelijk VSO in Rosmalen. Mijn vrije tijd besteed ik aan de computer. Ik houd van zwemmen, spelletjes doen, schrijven, lezen en tekenen. Dieren vind ik heel leuk: mijn favoriete hond is de Canadese herder en mijn favoriete kat is scottish fold. Op dit moment loop ik stage bij Kleigoed</span></p>'],
            ['id' => 6, 'name' => "Jip", "img_url" => 'http://wonenzoals.local/img/uploads/5ce6a9cb2c2e1-Jip.jpg', "description" => '<p><span style="color: #212529; font-family: sans-serif; font-size: 14.4px; letter-spacing: 1.3px; background-color: #ffffff;">Ik ben Jip, ik ben geboren in Februari 1997. Ik woon samen met mijn ouders en samen met de hond Lola. Mijn hobby&rsquo;s zijn knutselen, zelfstandig you-tube-en, tekenen, uitgaan, koken, dansen. Voor mijn werk doe ik: schoonmaak, koffie inschenken en gastvrouw zijn. Ik maak me geen zorgen en ga met plezier wonen, ik word een zelfstandig meisje&hellip;</span></p>'],
     
        ];

        foreach($residents as $resident){
            Resident::create($resident);
        };
    }
}