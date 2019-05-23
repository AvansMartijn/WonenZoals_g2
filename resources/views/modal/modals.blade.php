@foreach ($residents as $resident)
<div class="modal fade lg" id="{{$resident->name}}{{$resident->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                
                <h1 class="modal-Name font-weight-bold">{{$resident->name}}</h5>

                <p class="text-readable">
                  <img class="modal-picture" src="{{$resident->img_url}}">
                  {!!$resident->description!!}
                </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
            </div>
          </div>
        </div>
      </div>
    
@endforeach

      <div class="modal fade" id="stef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">

                  <h1 class="modal-Name font-weight-bold">Stef</h5>

                    <p class="text-readable">
                      <img class="modal-picture" src="{{ asset('img/Stef.jpg') }}">
                        Ik ben Stef, geboren op 5 mei 1996. Geboren en getogen (zoals ze wel eens zeggen) in Ammerzoden. Ik woon daar met mijn vader en moeder en mijn oudere broer Geert.
                        <br><br>
                        Ik ben geboren met Spina Bifida en Hydrocephalus waardoor ik in een rolstoel zit. Ik kan niet lopen maar praten kan ik als de beste. Vooral van mijn favoriete hobby voetbal, zowel van het Nederlandse als het buitenlandse voetbal, weet ik heel veel te vertellen. Ik speel zelf ook nog rolstoeltennis. Ook doe ik nog wat aan mijn conditie bij van Lith Healthness in Hintham.
                        <br><br>
                        Toen ik ongeveer 3,5 jaar was ben ik naar Mytylschool Gabriël gegaan. In juli 2015 heb ik afscheid genomen van school. Dit was best wel een grote stap maar gelukkig heb ik een hele leuke dagbesteding gevonden bij Werkboerderij Buitengewoon in Berlicum, kijk maar eens op  www.werkboerderijbuitengewoon.nl . Elke dag is hier een feestje!
                        <br><br>
                        Ik ga ook heel graag op stap, voetbal kijken, naar een festival met de mensen van Stichting Typisch en ook ben ik al twee keer op vakantie geweest met Dennis en Luuk, onder begeleiding van de mensen van Mundorado Reizen.
                        <br><br>
                        Veel van de mede-bewoners ken ik al vanaf de tijd dat ik op de mytylschool zat. Onze ouders zouden het heel fijn vinden als wij later bij elkaar in het zelfde huis zouden kunnen wonen en waar we dan ook heel veel plezier kunnen beleven met zijn allen. Niet te ver bij Ammerzoden vandaan zodat zij toch altijd snel bij mij kunnen zijn. Belangrijk voor mij is wel dat ik ook mijn eigen ruimte daar heb en dat ik goede liefdevolle verzorging en begeleiding krijg, want die heb ik wel altijd van anderen nodig.
                    </p>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="Isabelle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Isabelle</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Isabelle.jpg') }}">
                            Ik ben Isabelle, geboren op 8 augustus 1998.
                            <br><br>
                            Ik loop stage bij een zorginstelling, waar ik in de horeca en schoonmaak werk. Heb het erg naar mijn zin en werk met leuke collega's.
                            Onlangs hebben we nieuwe bedrijfskleding gehad, waar ik heel blij mee ben.
                            <br><br>
                            Mijn hobby's zijn muziek luisteren en zingen. En ik zit op toneel.
                            <br><br>
                            Verder vind ik het altijd gezellig om ergens een "bakkie" te doen, op een terrasje, café en op visite....
                            <br><br>
                            Ik hoop dat mijn appartement mooi en gezellig wordt ingericht. En dat het ook mijn plekkie wordt. Dat we met ons allen voor een huiselijke sfeer zorgen.
                            En, dat je mag zijn wie je bent, houd je van drukte is dat goed en houd je van rust is dat ook goed.
                            Het echt een voorstelling maken hoe zelfstandig wonen zal zijn, is nog moeilijk. Maar dit zal geleidelijk duidelijk worden.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Luuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Luuk</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Luuk.jpg') }}">
                            Ik ben Luuk, geboren op 6 mei 1996 in ’s-Hertogenbosch. Toen ik 5 maanden was ben ik heel erg ziek geweest, 
                            een virus infectie in de hersenen, waaraan ik een meervoudige beperking heb overgehouden.
                            <br><br>
                            Mijn hobby’s zijn computeren, televisie kijken, toneel en dansen. Op vakantie gaan vind ik ook heel leuk. 
                            Meestal doen we dan wel iets aparts zoals raften, parapenten kanoën of de vakantie afsluiten met een bezoek aan een 
                            pretpark in het buitenland. Ik heb een hele mooie sportieve driewieler en vind het fijn om af en toe lekker te gaan fietsen.
                            <br><br>
                            Na de Mytylschool ben ik op 18 jarige leeftijd gaan werken op Werkboerderij Buiten Gewoon in Berlicum. Hier doe ik alle 
                            voorkomende werkzaamheden die je op de boerderij kan tegen komen. Nu ben ik 20 en zou heel graag met mijn vrienden op 
                            mijn zelf gaan wonen in een woongroep. Ik hoop dat we een mooi pand vinden op een mooie locatie waar ik en mijn 
                            vrienden met veel plezier ga wonen.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Sander" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Sander</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Sander.jpg') }}">
                            Ik ben Sander Peffer, geboren op 3 augustus 1995 en woonachtig in Kerkdriel. Ik ben een 
                            sociale jongen en hou van vrienden om mij heen. Ik maak snel contact en ga al gauw een gesprek aan, 
                            zeker als het om voelbal of muziek draait.
                            <br><br>
                            Negen weken ben ik te vroeg geboren en twee dagen na mijn geboorte heb ik een hersenbloeding gekregen. 
                            Daardoor zit ik in een rolstoel. Ik kan nog wel kleine stukjes lopen met mijn looprek. Thuis verplaats 
                            ik mij in een handbewogen rolstoel die ik met één hand bestuur en voor grotere afstanden gebruik ik mijn 
                            elektrische rolstoel.
                            <br><br>
                            Mijn hobby’s zijn muziek en voetbal, dit doe ik regelmatig op de playstation en ik kijk vaak naar voetbal. 
                            Mijn favoriete club is Ajax en daar ga ik ook regelmatig naar toe, samen met mijn stiefbroer Dirk en mijn 
                            vriend Thom. Als ik op vakantie ben, fluit ik regelmatig een wedstrijd.
                            <br><br>
                            Muziek is erg belangrijk voor mij; ik heb eigenlijk altijd wel de radio aan of ik luister naar mijn iPod. 
                            Ook heb ik momenteel een draaitafel en daar produceer ik de leukste mixen. Ik ben een grote fan van AfroJack 
                            en die heb ik ook al eens in het echt mogen bewonderen samen met mijn stiefvader en mijn zus Mariëlle.
                            <br><br>
                            Ook ga ik regelmatig met mijn goede vriend Stijn een terrasje pakken, naar een wedstrijd toe of gewoon een 
                            avondje kletsen. Laatst ben ik helemaal alleen bij hem op bezoek geweest in IJsland en dit was een feest! 
                            Het alleen vliegen was vooral erg spannend, omdat ik dit nog nooit eerder gedaan had.
                            <br><br>
                            Mijn zus Mariëlle, met wie ik een hele goed band heb, woont in Breda en samen gaan we regelmatig uit eten, 
                            terrasje pakken, naar concerten of gewoon gezellig bijkletsen.
                            <br><br>
                            Uitdagingen ga ik ook niet uit de weg, ik ga regelmatig een weekend of een dagje weg met Stichting Typisch 
                            naar concerten, festivals, zelfstandig autorijden enz.
                            <br><br>
                            Ik werk 5 dagen in de week bij Cello in Vught en heb het daar goed naar mij zin. Ik zit daar achter de 
                            receptie en doe daarnaast allerlei andere dingen. Ook ben ik hoofdredacteur van het blad de Babbelaar.
                            <br><br>
                            Door mijn beperkingen kan ik niet zelfstandig wonen en blijf ik afhankelijk van de zorg van anderen. Voor 
                            mijn moeder en stiefvader is het daarom belangrijk dat dit in de buurt is zodat zij zo veel mogelijk mee 
                            kunnen blijven zorgen. Ik hoop een leuke woonruimte met leuke medebewoners en fijne, goede begeleiding waar 
                            we samen met veel plezier kunnen wonen en waar wij ons veilig en “thuis” voelen.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="William" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">William</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/William.jpg') }}">
                            Ik ben William, geboren op 29 oktober 1998. Ik ben geboren en getogen in ‘s-Hertogenbosch. Op dit moment 
                            woon ik bij mijn ouders. Ik heb nog 2 kleine broertjes, Dylan en Damian.
                            <br><br>
                            Ik werk bij Weener XL op de snoepafdeling. Ik werk 28 uur per week. Op maandag ben ik de hele dag vrij en 
                            woensdag de middag.
                            <br><br>
                            Mijn hobby’s zijn: PlayStationen, Ik speel graag FIFA, GTA, Call of Duty.
                            <br><br>
                            Hockeyen: Ik hockey bij het LG-team bij HC Den Bosch en een ander sport die ik graag doe is Darten.
                            <br><br>
                            Ook voetbal is een hobby van mij. Ik voetbal graag op straat. Mijn favoriete club is Ajax.
                            <br><br>
                            Ik ga graag naar de Efteling. Ik heb een jaarabonnement voor de Efteling. Ik ga het liefste de hele dag 
                            in de achtbanen. De Baron1888 is mijn favoriete attractie. Hij had alleen wel iets hoger mogen zijn.
                            <br><br>
                            In het weekend ga ik graag met mijn vrienden stappen.
                            <br><br>
                            Ik kijk er naar uit om op mezelf te gaan wonen. Het is voor mij tijd voor een nieuwe stap en kijk echt 
                            uit naar een eigen plek om op mezelf te gaan wonen zonder ouders en mijn broertjes. Natuurlijk zal ik ze 
                            ook wel een beetje gaan missen.
                            <br><br>
                            Ik verwacht dat ik een rustige eigen plek zal hebben. Ik verwacht ook wel wat drukte, omdat ik met vrienden 
                            in een woongroep woon, maar zal vooral gezellig druk zijn.
                            <br><br>
                            Ik denk dat ik ook nog wel wat dingen kan leren, vooral om echt zelfstandig te zijn.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Kelly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Kelly</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Kelly.jpg') }}">
                            Ik ben Kelly, geboren op 8 juli 1992. Ik woon samen met mijn moeder (Ilona) in Rosmalen.
                            Helaas is mijn vader vorig jaar overleden. 
                            We hebben een hondje Diesel. 
                            Door mijn spierziekte ben ik rolstoelgebonden en heb ik veel hulp nodig bij mijn dagelijkse bezigheden. 
                            4 dagen in de week ga ik naar een dagbesteding, 2 dagen naar Tinks in Veghel en 2 dagen naar AC Duinendaal in Den Bosch. 
                            Bij Tinks werk ik met textiel en bij Duinendaal doe ik inpak/montagewerk. 
                            Verder houd ik van haken, knutselen, spelletjes doen, tv kijken en een terrasje pikken. 
                            In het begin was ik heel enthousiast over het wooninitiatief, maar hoe langer het duurt vind ik het wel spannend en moeilijk worden. 
                            Hoop wel dat ik het naar mijn zin ga krijgen en dat het mijn 2e thuis gaat worden.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Kelly" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Kelly</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Kelly.jpg') }}">
                            Ik ben Kelly, geboren op 8 juli 1992. Ik woon samen met mijn moeder (Ilona) in Rosmalen.
                            Helaas is mijn vader vorig jaar overleden. 
                            We hebben een hondje Diesel. 
                            Door mijn spierziekte ben ik rolstoelgebonden en heb ik veel hulp nodig bij mijn dagelijkse bezigheden. 
                            4 dagen in de week ga ik naar een dagbesteding, 2 dagen naar Tinks in Veghel en 2 dagen naar AC Duinendaal in Den Bosch. 
                            Bij Tinks werk ik met textiel en bij Duinendaal doe ik inpak/montagewerk. 
                            Verder houd ik van haken, knutselen, spelletjes doen, tv kijken en een terrasje pikken. 
                            In het begin was ik heel enthousiast over het wooninitiatief, maar hoe langer het duurt vind ik het wel spannend en moeilijk worden. 
                            Hoop wel dat ik het naar mijn zin ga krijgen en dat het mijn 2e thuis gaat worden.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Cyriel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Cyriel</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Cyriel.jpg') }}">
                            Ik ben Cyriel, geboren op 04 januari 1996 en ik woon nu nog in Vlijmen bij mijn ouders. Als jong kind 
                            zei ik altijd al dat ik later in een huis met allemaal mensen met een handicap zou gaan wonen. Dus ik 
                            ben blij dat ik ook naar de Woongroep Zoals mag.
                            <br><br>
                            Van 3 t/m 18 jaar ging ik naar de Mytylschool in Tilburg. Ik heb nooit kunnen lopen en zit dus al bijna 
                            mijn hele leven in een rolstoel. In Tilburg kreeg ik de gewone schoolvakken en daarnaast ook de 
                            therapieën zoals fysiotherapie en ergotherapie om ondanks mijn handicap zo zelfstandig mogelijk te worden.
                            <br><br>
                            Nu ga ik drie dagen in de week naar Activiteitencentrum Duinendaal en één dag in de week help ik 
                            aan de receptie bij Radio Maria.
                            <br><br>
                            Computeren is mijn hobby en dat combineer ik met mijn grote interesse voor allerlei sporten. Op de 
                            computer kijk ik graag naar voetbal, basketbal en tennis.
                            <br><br>
                            Ik ben niet bang voor een avontuurtje. Zo ben ik al twee keer naar een internationaal zomerkamp geweest. 
                            Eén keer in Frankrijk en één keer in Oostenrijk. Daar heb ik veel vrienden aan over gehouden met wie ik 
                            graag een lolletje maak of een biertje drink.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Rik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Rik</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Rik.jpg') }}">
                            Ik ben Rik, geboren op 2 november 1997. Ik ben geboren onder de rook van de Sint Jan. Mijn geboorte 
                            verliep normaal en er waren geen tekenen van dat ik een beperking had. Wel had ik bij mijn geboorte '
                            12 vingers, ik had 2 extra pinken, die ook de dag naar mijn geboorte zijn verwijderd ook had ik astma 
                            en was ik regelmatig benauwd. Toen ik 3 was kreeg ik last van zware epilepsie aanvallen en dat was het
                             enige wat er toen werd geconstateerd. Omdat ik niet wilde praten (nu zou je het niet meer geloven) zat
                              ik op speciaal kleuter onderwijs. En ben dan ook gewoon gestart op een normale basis school. Omdat ik
                               daar niet mee kon ging ik naar de Gabriel Mytylschool omdat er toch iets was van een beperking, zowel
                                motorisch en verstandelijk. Maar nog steeds was er niet echt een aantoonbare handicap aan te wijzen. 
                                Omdat ik 12 vingers had was er blijkbaar wel genetisch iets niet in orde. Toen ik 8 was werden mijn 
                                ouders gebeld door het ziekenhuis en moest ik met spoed diverse onderzoeken ondergaan en een echo van
                                 mijn hart laten maken, omdat men tijdens een nieuw onderzoek van mijn bloed had ontdekt dat ik het
                                  syndroom van Di-George had ook wel bekend als Het deletie 22q11.2 syndroom, toen dit bekend werd 
                                  viel alles op zijn plaats.
                            <br><br>
                            Op dit moment woon ik nog thuis, maar kan ik niet wachten tot ik een eigen huisje heb, mijn hobby’s zijn 
                            het maken van muziek en natuurlijk voetbal. Met mijn vader ga ik naar FC den Bosch, en kom daar dan altijd
                             Auke tegen. Een groot deel van de mensen die komen wonen in de woongroep ken ik van school. Ik ben graag 
                             op mij zelf maar vind het samen naar voetbal kijken of even gamen ook fijn.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Simon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Simon</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Simon.jpg') }}">
                            Ik ben Simon, geboren op 18 september 1996 en kom uit ’s-Hertogenbosch.
                            <br><br>
                            In het dagelijks leven werk ik 4 dagen in de horeca bij In de Roos. Naast werken bij In de Roos, ben ik heel actief in de cultuur van de stad. Ik organiseer culturele evenementen bij de Muzerije en doe vrijwilligerswerk bij evenementen. Ik ben Citytrainer van ’s-Hertogenbosch. Dat betekent dat ik een opleiding heb gevolgd om culturele evenementen te mogen organiseren. Bij de opleiding kwamen er verschillende dingen naar voren die belangrijk bij het organiseren van een event, zoals begroting, promotie, werving, en in welke stappen je werkt !
                            <br><br>
                            Ook doe ik aan tennis en train elke woensdagavond. We spelen regelmatig een toernooi.
                            <br><br>
                            Ik zie mijn toekomst zeer positief tegemoet, ben altijd positief en geniet van de dag. Dat is tevens mijn motto!
                            <br><br>
                            Ik verwacht van het wonen later, samen met leuke leeftijdsgenoten een leuke woongroep hebben, een plek waar ik me thuis kan voelen!
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Chelsey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Chelsey</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Chelsey.jpg') }}">
                            Ik ben Chelsey, geboren op 15 december 1996. Ik ben werkzaam bij 'In de Roos', een lunchcafé in 
                            Zaltbommel. Ik sta daar achter de bar, werk in de bediening, in de voorbereidingskeuken en op 
                            zaal. Al met al een leuke afwisselende baan. Ook heb ik hobby's, zoals dansen, shoppen, naar de 
                            bioscoop gaan, stappen en op vakantie gaan. Ik ga heel graag wonen in woongroep Zoals omdat daar
                             veel van mijn oude klasgenoten gaan wonen en dat wordt heel erg gezellig. Ik vind het ook erg fijn
                              om op eigen benen te staan. 
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Nick" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Nick</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Nick.jpg') }}">
                            Ik ben Nick, geboren op 3 januari 1986 in Oss.
                            <br><br>
                            Op dit moment woon ik bij mijn moeder in Oss. Ik ben geboren met Spina 
                            Bifida en daardoor zit ik in een rolstoel.
                            <br><br>
                            Ik werk al 9 jaar met veel plezier bij Lunchroom In de Roos in Den Bosch. '
                            Bij in de Roos ben ik o.a. gastheer en doe ik kassa- en receptiewerkzaamheden. Ik werk 
                            daar 4 dagen in de week.
                            <br><br>
                            Mijn grootste hobby is rolstoelbasketbal. Ik speel zelf bij basketbalclub 
                            de Black Eagles in Rosmalen. Ik train in sporthal de Hazelaar in Rosmalen en 
                            speel basketbalwedstrijden. Ik ben een trouwe supporter van basketbalclub de 
                            New Heroes uit Den Bosch en ik ga naar de wedstrijden van de New Heroes kijken. 
                            Daarnaast heb ik nog andere hobby’s zoals voetballen kijken, computerspellen 
                            spelen en muziek luisteren. Ik kan ook heel erg genieten van lekker eten. Ik ben 
                            een spontane en sociale jongeman en sta heel positief in het leven.
                            <br><br>
                            Ik ga heel graag wonen in de woongroep Wonen Zoals en heb daar heel veel zin in! 
                            Ik hoop dat we daar met z’n allen met veel plezier kunnen wonen in een fijne huiselijke sfeer! 
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Isabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Isabel</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Isabel.jpg') }}">
                            Ik ben Isabel, geboren op 28 april 1998.
                            <br><br>
                            Ik heb o.a. op de Gabriel school gezeten en daarna op het stedelijk VSO in Rosmalen. 
                            Mijn vrije tijd besteed ik aan de computer. Ik houd van zwemmen, spelletjes doen, schrijven, lezen en tekenen.
                            Dieren vind ik heel leuk: mijn favoriete hond is de Canadese herder en mijn favoriete kat is scottish fold.
                            Op dit moment loop ik stage bij Kleigoed.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Jip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">

                        <h1 class="modal-Name font-weight-bold">Jip</h5>

                        <p class="text-readable">
                            <img class="modal-picture" src="{{ asset('img/Jip.jpg') }}">
                            Ik ben Jip, ik ben geboren in Februari 1997. Ik woon samen met 
                            m'n ouders en samen met de hond Lola. Mijn hobby’s zijn knutselen, 
                            zelfstandig you-tube-en, tekenen, uitgaan, koken, dansen. Voor mijn 
                            werk doe ik: schoonmaak, koffie inschenken en gastvrouw zijn. Ik maak me 
                            geen zorgen en ga met plezier wonen, ik word een zelfstandig meisje… 
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                    </div>
                  </div>
                </div>
              </div>
              @foreach ($newsitems as $item)
            <div class="modal fade" id="nieuws{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">

                            <p class="text-readable">
                                <img class="modal-picture" src="{{ asset('img/News.jpeg') }}" alt="">
                                <h2 class="font-weight-bold text-readable">{{$item->title}}</h2>
                                {!!$item->content!!}
                            </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
              @endforeach