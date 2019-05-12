@extends('layouts.Front')

@section('content')
    
    <!-- Header -->
    <header class="landingImage d-flex align-items-center center" id="Top">
        <div class="leaf-wrapper mx-auto">
            <div class="mx-auto leaf text-center">
                <h1 class="text-custom-heading-shadow display-1">Wonen Zoals</h1>
                <p class="text-white">Een groepje ouders heeft zich in 2011 verenigd <br>om gezamenlijk een initiatief op te starten voor hun kinderen.<br>Met als doel om vanaf ongeveer 2019 een gezamenlijk wooninitiatief gerealiseerd te hebben</p>
                <a class="btn text-white btn-custom-shadow linkie" href="{{url('/')}}/#OverOns">Lees Meer</a>
            </div>
        </div>
    </header>

    <!-- Section: Over Ons -->
    <section id="OverOns" class="container">
        <div class="ContentPadding extraMarginBottom">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40 Mobile-center">Stichting Zoals</h1>

                    <p class="text-readable float-left">
                        <img class="img-fluid float-right ImageMargin image-shadow" src="{{ asset('img/wz_1.jpg') }}" alt="">
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
    @include('modal.modals')
    
    <section id="Bewoners" class="container">
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
                            <img class="person-picture" src="{{ asset('img/Isabelle.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Isabelle</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Isabelle">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="3" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Luuk.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Luuk</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Luuk">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="4" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Sander.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Sander</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Sander">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="5" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/William.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">William</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#William">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="6" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Kelly.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Kelly</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Kelly">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="7" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Cyriel.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Cyriel</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Cyriel">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="8" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Rik.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Rik</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Rik">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="9" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Simon.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Simon</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Simon">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="10" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Chelsey.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Chelsey</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Chelsey">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="11" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Nick.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Nick</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Nick">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="12" class="slidee">
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
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Isabel">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                    <slide :index="13" class="slidee">
                        <div>
                            <img class="person-picture" src="{{ asset('img/Jip.jpg') }}">
                            <div class="wave -one"></div>
                            <div class="wave -two"></div>
                            <div class="wave -three"></div>
                        </div>

                        <div class="user">
                            <div class="profile--info"><span class="username">Jip</span><span></span><br/>
                            <span style="color: black;" class="userquote"></span></div>

                            <div align="center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Jip">Lees Meer</button></button>
                            </div>
                        </div>
                    </slide>

                </carousel-3d>
            </div>
        </div>
        <hr>
    </section>

    <!-- Section: Ondersteuning  -->
    <section id="Ondersteuning" class="container">
        <div class="ContentPadding extraMarginBottom">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40 Mobile-center">Ondersteuning</h1>

                    <p class="text-readable float-left">
                        <img class="img-fluid ImageMargin float-right custom-image image-shadow" src="{{ asset('img/wz_2.png') }}" alt="">
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
        <div class="jumbotron mx-auto text-center Parallax">
            <h4 class="display-4 text-white">Wonen Zoals</h4>
            <h4 class="text-white">Beschermd Wonen</h4>
        </div>
    </section>

    <!-- <section>
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
    </section> -->

    <!-- Section: Nieuws -->
    <section id="Nieuws" class="container">
        <div class="ContentPadding">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40 Mobile-center">Nieuws</h1>
                </div>
            </div>
            <div class="row">
                <div class="NieuwsBericht">
                    <img class="img-fluid" src="{{ asset('img/News.jpeg') }}" alt="">
                    <span class="newsDate text-muted">29 nov 2018</span>
                    <br>
                    <p class="newsTitle font-weight-bold">Brabants Dagblad 29 november 2018</p>
                    <p class="newsText">Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...</p>
                    <hr>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#nieuws">Lees meer</button>
                </div>
                <div class="NieuwsBericht">
                    <img class="img-fluid" src="{{ asset('img/News.jpeg') }}" alt="">
                    <span class="newsDate text-muted">29 nov 2018</span>
                    <br>
                    <p class="newsTitle font-weight-bold">Brabants Dagblad 29 november 2018</p>
                    <p class="newsText">Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...</p>
                    <hr>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#nieuws">Lees meer</button>
                </div>
                <div class="NieuwsBericht">
                    <img class="img-fluid" src="{{ asset('img/News.jpeg') }}" alt="">
                    <span class="newsDate text-muted">29 nov 2018</span>
                    <br>
                    <p class="newsTitle font-weight-bold">Brabants Dagblad 29 november 2018</p>
                    <p class="newsText">Woonzorgappartementen voor jongeren op plaats oude school Mozartsingel DEN BOSCH – De oude nutsschool aan de Mozartsingel in Den Bosch gaat plaats maken voor maximaal 18 woonzorgappartementen voor jon...</p>
                    <hr>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#nieuws">Lees meer</button>
                </div>
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
        <hr>
    </section>

    <!-- Section: Contact -->

    <section id="Contact" class="container">

        <!-- Section: new contact -->
        

        <div class="ContentPadding extraMarginBottom">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 MarginBottom-40 Mobile-center">Contact</h1>

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
                <div class="contact-item">
                    {!! Form::open(['route'=>'contactus.store']) !!}
                        <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }} ">
                            {!! Form::label('Naam') !!}
                            {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}

                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {!! Form::label('Email') !!}
                                {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}

                                <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                                {!! Form::label('Onderwerp') !!}
                                {!! Form::select('subject', [
                                'Vraag' => 'Vraag',
                                'Afmelden nieuwsbrief' => 'Afmelden nieuwsbrief', 
                                'Aanmelden woningzoekende' => 'Aanmelden woningzoekende',
                                'Ouderaccount aanvragen' => 'Ouderaccount aanvragen'], 
                                null,
                                ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                                {!! Form::label('Bericht') !!}
                                {!! Form::textarea('message', old('message'), ['class'=>'form-control']) !!}
                            
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                        </div>
                        <button class="btn btn-primary">Verzenden</button>
                    {!! Form::close() !!}
                </div>
                
                <div class="contact-item tablet-hide">
                    <iframe width="100%" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=Graafseweg%20247&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Section: new contact end -->

    <section>
        <div class="jumbotron Parallax">
            <div class="container tablet-hide">
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
            <p class="text-muted minMargin">© 2019 Copyright: <a href="{{ url('/') }}">Stichting Zoals</a></p>
        </div>
    </footer>

    <a class="ToTop linkie" href="{{url('/')}}/#Top">
        <i class="fa fa-angle-double-up "></i>
    </a>


@endsection