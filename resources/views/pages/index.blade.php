@extends('layouts.app')

@section('content')
    
    <!-- Header -->
    <header class="landingImage d-flex align-items-center center">
        <div class="mx-auto text-center">
            <h1 class="text-custom-heading-shadow display-1">Wonen Zoals</h1>
            <p class="text-white">Een groepje ouders heeft zich in 2011 verenigd <br>om gezamenlijk een initiatief op te starten voor hun kinderen.<br>Met als doel om vanaf ongeveer 2019 een gezamenlijk wooninitiatief gerealiseerd te hebben</p>
            <a class="btn text-white btn-custom-shadow" href="#OverOns">Lees Meer</a>
        </div>
    </header>

    <!-- Section: Over Ons -->
    <section class="container">
        <div class="ContentPadding extraMarginBottom">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40 text-center">Stichting Zoals</h1>

                    <p class="text-readable float-left">
                        <img class="img-fluid float-right ImageMargin" src="{{ asset('img/wz_1.jpg') }}" alt="">
                        Een groepje ouders heeft zich in 2011 verenigd om gezamenlijk een initiatief op te starten voor hun kinderen met als doel om vanaf ongeveer 2019 een project gerealiseerd te hebben.
                        <br><br>
                        Besloten is om dit samen met een zorgaanbieder te doen in de vorm van een wooninitiatief.
                        <br><br> 
                        De kinderen zijn, als een oplevering rond 2019 plaats zou vinden, allen jong volwassenen.
                        <br><br>
                        De ouders hebben een belangrijke stem in de zorg die geboden wordt en in de sfeer die wordt gecreëerd in huis. Wonen in een kleinschalige woonvorm, geïntegreerd in de maatschappelijke omgeving, vinden wij daarom een belangrijke voorwaarde om volwaardig deel te kunnen nemen aan onze samenleving.
                        <br><br>
                        Wij zien onze kinderen, inmiddels (bijna) volwassen, als een kwetsbare groep. Op dit moment is het voor geen van de toekomstige bewoners mogelijk of wenselijk om zelfstandig te wonen. Wij willen om die reden een woongroep initiëren, waarin elke bewoner de zorg krijgt die hij of zij nodig heeft. Wij denken daarbij aan een gemengde groep van 18 jongvolwassenen, die elk een eigen appartement hebben. Binnen het complex is 24 uur per dag professionele zorg aanwezig die de bewoners waar nodig ondersteunt. Wij streven naar een warme sfeer, waarin veiligheid en geborgenheid de centrale thema’s zijn. Naast de individuele appartementen zijn er ook gezamenlijke ruimten, waarin de bewoners wanneer zij dat willen, elkaar ontmoeten en gezamenlijk kunnen koken en eten. Uitgangspunt is dat de keuzevrijheid centraal staat. 
                        <br><br>
                        Daarnaast vinden wij het solidariteitsprincipe een belangrijk uitgangspunt. Het gezamenlijke belang staat centraal bij de totstandkoming van het project en ook na realisatie. Wij verwachten daarbij dat een ieder op zijn/haar wijze een steentje bijdraagt aan het geheel. Te denken valt aan mee ontwikkelen, maar ook later het inzetbaar zijn bij activiteiten aanvullend op de professionele inzet.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Parallax -->
    <section>
        <div class="jumbotron mx-auto text-center Parallax">
            <h4 class="display-4 text-white">Wonen Zoals</h4>
            <h4 class="text-white">Beschermd Wonen</h4>
        </div>
    </section>

    <!-- Section: Bewoners -->
    <section class="container">
        <div class="ContentPadding">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40 text-center">Onze Bewoners</h1>
                </div>
            </div>
            <div class="row" id="example">
                <carousel-3d :height="400">
                    <slide :index="0" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Auke.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Auke</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#auke">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="1" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Stef.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>
                        
                        <div class="user">
                            <div class="profile--info"><span class="username">Stef</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#stef">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="2" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Isabel.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Isabel</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#isabelle">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>
                </carousel-3d>
            </div>
        </div>
        <hr>
    </section>

    <!-- Section: Ondersteuning  -->
    <section class="container">
        <div class="ContentPadding extraMarginBottom">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40">Ondersteuning</h1>

                    <p class="text-readable float-left">
                        <img class="img-fluid ImageMargin float-right" src="{{ asset('img/wz_2.png') }}" alt="">
                        De Stichting Zoals wordt door de belastingdienst aangemerkt als Algemeen Nut Beogende Instelling (ANBI), hetgeen o.a de weg vrij maakt voor het geheel of gedeeltelijk aftrekbaar maken van giften, schenkingen en legaten van het belastbaar inkomen van de gever.
                        <br><br>
                        Naast donaties en giften stellen wij iedere hulp van bedrijven, instellingen en particulieren bijzonder op prijs. Als de Stichting Zoals meer vaste grond onder de voeten krijgt zal er op tal van terreinen praktische hulp en support nodig zijn. Mocht u nu al willen bijdragen aan onze ontwikkeling of goed voorbereid willen zijn voor als er eenmaal gebouwd en gewoond wordt neem dan contact op met het bestuur van de stichting Zoals (bestuur@wonenzoals.nl/GSM 06-533 765 72)
                        <br><br>
                        NSGK ondersteunt Stichting Woongroep Zoals, waarvoor wij hen zeer dankbaar zijn.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Nieuwsbrief -->
    <section>
        <div class="jumbotron Parallax">
            <div class="container">
                <div class="row">
                    <h4 class="display-5 nieuwsbriefMargin-20 text-white">Schrijf je in voor onze niewsbrief</h4>
                </div>
                <div class="row">
                    <div class="col-8">
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" aria-describedby="NieuwsbriefHelp">
                                <small id="NieuwsbriefHelp" class="nieuwsbriefMargin-10 form-text text-white">We zullen u email nooit met iemand anders delen.</small>
                            </div>
                        </form>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary full-width">Aanmelden</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Nieuws -->
    <section class="container">
        <div class="ContentPadding">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40 text-center">Nieuws</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="NieuwsBericht">
                        <img class="img-fluid" src="{{ asset('img/News.jpeg') }}" alt="">
                        <span class="newsDate text-muted">29 nov 2018</span>
                        <br>
                        <p class="newsTitle font-weight-bold">Brabants Dagblad 29 november 2018</p>
                        <p class="newsText">Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...</p>
                        <hr>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#nieuws">Lees meer</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="NieuwsBericht">
                        <img class="img-fluid" src="{{ asset('img/News.jpeg') }}" alt="">
                        <span class="newsDate text-muted">29 nov 2018</span>
                        <br>
                        <p class="newsTitle font-weight-bold">Brabants Dagblad 29 november 2018</p>
                        <p class="newsText">Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...</p>
                        <hr>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#nieuws">Lees meer</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="NieuwsBericht">
                        <img class="img-fluid" src="{{ asset('img/News.jpeg') }}" alt="">
                        <span class="newsDate text-muted">29 nov 2018</span>
                        <br>
                        <p class="newsTitle font-weight-bold">Brabants Dagblad 29 november 2018</p>
                        <p class="newsText">Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...</p>
                        <hr>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#nieuws">Lees meer</button>
                    </div>
                </div>
                <div class="col-3">
                    <div class="NieuwsBericht">
                        <img class="img-fluid" src="{{ asset('img/News.jpeg') }}" alt="">
                        <span class="newsDate text-muted">29 nov 2018</span>
                        <br>
                        <p class="newsTitle font-weight-bold">Brabants Dagblad 29 november 2018</p>
                        <p class="newsText">Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...</p>
                        <hr>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#nieuws">Lees meer</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Contact -->
    <section class="container">

    

        <!-- Section: new contact -->
        {!! Form::open(['route'=>'contactus.store']) !!}
        <div class="ContentPadding extraMarginBottom">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40">Contact</h1>

                    <!--succes-->
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                    @endif
                    <!--succes-->

                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <form>
                        <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }} ">
                            {!! Form::label('Naam:') !!}
                            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Naam']) !!}

                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {!! Form::label('Email:') !!}
                                {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email']) !!}

                                <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                                {!! Form::label('Onderwerp:') !!}
                                {!! Form::select('subject', [
                                'Vraag' => 'Vraag',
                                'Afmelden nieuwsbrief' => 'Afmelden nieuwsbrief', 
                                'Aanmelden woningzoekende' => 'Aanmelden woningzoekende',
                                'Ouderaccount aanvragen' => 'Ouderaccount aanvragen'], 
                                null,
                                ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                                {!! Form::label('Bericht:') !!}
                                {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Bericht']) !!}
                            
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                        </div>
                        <button class="btn btn-primary">Verzenden</button>
                    </form>
                </div>
                <div class="col-6">
                    <iframe width="100%" height="350" src="https://maps.google.com/maps?hl=en&amp;q=51.681287%2C%205.318419+(Titel)&amp;ie=UTF8&amp;t=&amp;z=18&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    </section>
    {!! Form::close() !!}
    <!-- Section: new contact end -->

    <section>
        <div class="jumbotron Parallax">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h4 class="display-4 MarginBottom-40 text-center text-white">Sponsors</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('img/mijneigenthuis.png') }}" alt="">
                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('img/nsgk.png') }}" alt="">
                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('img/plato.png') }}" alt="">
                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('img/LogoYY_2015.png') }}" alt="">
                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('img/roodborstje.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="page-footer">
        <div class="container text-center mx-auto">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logoFull.png') }}" class="d-inline-block align-top" height="50px" alt="">
            </a>
            <hr>
            <p class="text-muted minMargin">© 2019 Copyright: Stichting Zoals</p>
        </div>
    </footer>

@endsection

<div class="modal fade" id="auke" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Auke</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    Ik ben Auke, geboren op 24 november 1995. Ik woon momenteel met mijn vader en moeder in ’s-Hertogenbosch. Verder heb ik nog een oudere zus die net zoals wij ook in 's-Hertogenbosch woont.

                    Ik heb al sinds mijn geboorte een lichamelijke beperking, cerebrale parese. Cerebrale parese (CP) is een houding- en bewegingsstoornis die veroorzaakt wordt door beschadiging van de hersenen.
                    
                    Ik ben een sportieve jongen en mijn favoriete sporten zijn hockey, voetballen, atletiek en fitnessen. Ik speel LG-hockey bij HC Den Bosch, zie foto. Iedere woensdag trainen we en twee keer in de maand spelen we een competitiewedstrijd. In het seizoen 2013-2014 en 2014-2015 zijn we Landskampioen geworden.
                    
                    Ook vind ik het leuk om met vrienden af te spreken, gezellig samen iets drinken en kletsen over voetbal. Ik heb een seizoenskaart van FC Den Bosch zodat ik alle thuiswedstrijden kan bekijken.
                    
                    Verder luister ik veel naar muziek en speel ik graag Playstation. Ook ben ik regelmatig op Facebook te vinden. Lekker chatten met mijn vrienden.
                    
                    Verder ben ik dol op onze hond Nelis. Nelis is een hele lieve zwarte Labradoodle. 
                    
                    In 2015 heb ik de mytylschool Gabriel in ’s-Hertogenbosch verlaten. Momenteel werk ik 4 dagen in de week bij de buurtsuper in Maliskamp. Ik heb het daar heel goed naar m'n zin, veel afwisseling in werkzaamheden en veel contact met klanten.
                    
                    Daarna wil ik graag begeleid gaan wonen in of rondom ’s-Hertogenbosch. Als het maar in een straal van 5 km rond de Sint Jan is. Gezellig samen chillen met mijn vrienden. Ik ken de meeste al jaren via school en het lijkt me erg gezellig om samen met nog meer vriend(inn)en een woonvoorziening op te richten.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="stef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Stef</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        Ik ben Stef, geboren op 5 mei 1996. Geboren en getogen (zoals ze wel eens zeggen) in Ammerzoden. Ik woon daar met mijn vader en moeder en mijn oudere broer Geert.

                        Ik ben geboren met Spina Bifida en Hydrocephalus waardoor ik in een rolstoel zit. Ik kan niet lopen maar praten kan ik als de beste. Vooral van mijn favoriete hobby voetbal, zowel van het Nederlandse als het buitenlandse voetbal, weet ik heel veel te vertellen. Ik speel zelf ook nog rolstoeltennis. Ook doe ik nog wat aan mijn conditie bij van Lith Healthness in Hintham.

                        Toen ik ongeveer 3,5 jaar was ben ik naar Mytylschool Gabriël gegaan. In juli 2015 heb ik afscheid genomen van school. Dit was best wel een grote stap maar gelukkig heb ik een hele leuke dagbesteding gevonden bij Werkboerderij Buitengewoon in Berlicum, kijk maar eens op  www.werkboerderijbuitengewoon.nl . Elke dag is hier een feestje!

                        Ik ga ook heel graag op stap, voetbal kijken, naar een festival met de mensen van Stichting Typisch en ook ben ik al twee keer op vakantie geweest met Dennis en Luuk, onder begeleiding van de mensen van Mundorado Reizen.

                        Veel van de mede-bewoners ken ik al vanaf de tijd dat ik op de mytylschool zat. Onze ouders zouden het heel fijn vinden als wij later bij elkaar in het zelfde huis zouden kunnen wonen en waar we dan ook heel veel plezier kunnen beleven met zijn allen. Niet te ver bij Ammerzoden vandaan zodat zij toch altijd snel bij mij kunnen zijn. Belangrijk voor mij is wel dat ik ook mijn eigen ruimte daar heb en dat ik goede liefdevolle verzorging en begeleiding krijg, want die heb ik wel altijd van anderen nodig.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="Isabelle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Isabelle</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                            Ik ben Isabelle, geboren op 8 augustus 1998.
                            Ik loop stage bij een zorginstelling, waar ik in de horeca en schoonmaak werk. Heb het erg naar mijn zin en werk met leuke collega's.
                            Onlangs hebben we nieuwe bedrijfskleding gehad, waar ik heel blij mee ben.
                            Mijn hobby's zijn muziek luisteren en zingen. En ik zit op toneel.
                            Verder vind ik het altijd gezellig om ergens een "bakkie" te doen, op een terrasje, café en op visite....
                            Ik hoop dat mijn appartement mooi en gezellig wordt ingericht. En dat het ook mijn plekkie wordt. Dat we met ons allen voor een huiselijke sfeer zorgen.
                            En, dat je mag zijn wie je bent, houd je van drukte is dat goed en houd je van rust is dat ook goed.
                            Het echt een voorstelling maken hoe zelfstandig wonen zal zijn, is nog moeilijk. Maar dit zal geleidelijk duidelijk worden.
 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="nieuws" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">nieuws</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                Ik ben Isabelle, geboren op 8 augustus 1998.
                                Ik loop stage bij een zorginstelling, waar ik in de horeca en schoonmaak werk. Heb het erg naar mijn zin en werk met leuke collega's.
                                Onlangs hebben we nieuwe bedrijfskleding gehad, waar ik heel blij mee ben.
                                Mijn hobby's zijn muziek luisteren en zingen. En ik zit op toneel.
                                Verder vind ik het altijd gezellig om ergens een "bakkie" te doen, op een terrasje, café en op visite....
                                Ik hoop dat mijn appartement mooi en gezellig wordt ingericht. En dat het ook mijn plekkie wordt. Dat we met ons allen voor een huiselijke sfeer zorgen.
                                En, dat je mag zijn wie je bent, houd je van drukte is dat goed en houd je van rust is dat ook goed.
                                Het echt een voorstelling maken hoe zelfstandig wonen zal zijn, is nog moeilijk. Maar dit zal geleidelijk duidelijk worden.
     
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>