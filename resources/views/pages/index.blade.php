@extends('layouts.Front')

@section('content')
    
    <!-- Header -->
    <header class="landingImage d-flex align-items-center center" id="Top">
        <div class="leaf-wrapper mx-auto">
            <div class="mx-auto leaf text-center">
                <h1 class="text-custom-heading-shadow display-1">Wonen Zoals</h1>
                <p class="text-white">{!!$leaf->content!!}</p>
                {{-- <a class="btn text-white btn-custom-shadow linkie" href="{{url('/')}}/#OverOns">Lees Meer</a> --}}
            </div>
        </div>
    </header>
    @include('modal.modals')
    @foreach ($sections as $section)
        @switch($section->type_id)
            @case(1)
                {{-- leaf, do nothing --}}
                @break
            @case(2)
                {{-- seperator --}}
                <section>
                    <div class="jumbotron mx-auto text-center Parallax">
                        <h4 class="display-4 text-white">{{$section->name}}</h4>
                        <h4 class="text-white">{!!$section->content!!}</h4> 
                        {{-- {!!$section->content!!} --}}
                    </div>
                </section>
                @break
            @case(3)
                {{-- text --}}
                <section id="{{$section->id}}" class="container">
                    <div class="ContentPadding extraMarginBottom">
                        <div class="row">
                            <div class="col">
                                <h1 class="display-3 MarginBottom-40 Mobile-center">{{$section->name}}</h1>
            
                                <span class="text-readable float-left">
                                    @if ($section->img_url != null && $section->img_url != "")
                                        <img class="img-fluid float-right ImageMargin image-shadow" src="{{$section->img_url}}" alt="">
                                    @endif
                                    {!!$section->content!!}
                                </span>
                            </div>
                        </div>
                    </div>
                </section>
                @break
            @case(4)
                {{-- residents --}}
                <section id="{{$section->id}}" class="container">
                    <div class="ContentPadding">
                        <div class="row">
                            <div class="col">
                                <h1 class="display-3 MarginBottom-40 text-center">Onze Bewoners</h1>
                            </div>
                        </div>
                        <div class="row" id="example">
                            <carousel-3d :height="400" :autoplay=true>
                                @foreach ($residents as $resident)
                                    <slide :index="{{$resident->id -1}}" class="slidee">
                                        <div>
                                        <img class="person-picture" src="{{$resident->img_url}}">
                                            <div class="wave -one"></div>
                                            <div class="wave -two"></div>
                                            <div class="wave -three"></div>
                                        </div>

                                        <div class="user">
                                            <div class="profile--info"><span class="username">{{$resident->name}}</span><span></span><br/>
                                            <span style="color: black;" class="userquote"></span></div>

                                            <div align="center">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#{{$resident->name}}{{$resident->id}}">Lees Meer</button></button>
                                            </div>
                                        </div>
                                    </slide>
                                @endforeach
                            </carousel-3d>
                        </div>
                    </div>
                    <hr>
                </section>
                @break
            @case(5)
                {{-- news --}}
                <section id="{{$section->id}}" class="container">
                    <div class="ContentPadding">
                        <div class="row">
                            <div class="col">
                                <h1 class="display-3 MarginBottom-40 Mobile-center">Nieuws</h1>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($newsitems as $item)
                            <div class="NieuwsBericht">
                                <div class="newsimagecontainer">
                                    <img class="img-fluid" style="height:100%;" src="{{$item->img_url}}" alt="">
                                </div>
                                <br>
                                <p class="newsTitle font-weight-bold">{{$item->title}}</p>
                                <p class="newsText">{!!$item->summary!!}</p>
                                <hr>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#nieuws{{$item->id}}">Lees meer</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                </section>
            
                @break
            @case(6)
                {{-- contact --}}
                <section id="{{$section->id}}" class="container">

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
                                        {!! Form::text('name', old('name'), ['class'=>'form-control',
                                        "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Typ hier uw naam",
                                        'autocomplete' => 'off']) !!}
            
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            {!! Form::label('Emailadres') !!}
                                            {!! Form::text('email', old('email'), ['class'=>'form-control',
                                            "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Typ hier uw emailadres",
                                            'autocomplete' => 'off']) !!}
            
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                    <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                                            {!! Form::label('Onderwerp') !!}
                                            <select name="subject" class="form-control" 
                                            data-toggle="tooltip" data-placement="top" title="Kies hier het onderwerp van het bericht">
                                            @foreach ($contactSubjects as $subject)
                                                <option value="{{$subject->subject}}">{{$subject->subject}}</option>
                                                
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                                            {!! Form::label('Bericht') !!}
                                            {!! Form::textarea('message', old('message'), ['class'=>'form-control',
                                            "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Typ hier uw bericht",
                                            'autocomplete' => 'off']) !!}
                                        
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
                @break
            @case(7)
                {{-- sponsors --}}
                <section>
                    <div class="jumbotron Parallax">
                        <div class="container tablet-hide">
                            <div class="row">
                                <div class="col">
                                    <h4 class="display-4 MarginBottom-40 text-center text-white">Sponsors</h4>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($sponsors as $sponsor)
                                <div class="col">
                                    <a href="{{$sponsor->hyperlink}}" target="_blank">
                                        <img class="img-fluid" src="{{$sponsor->img_url}}" alt="">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                @break
            @default
                
        @endswitch
    @endforeach

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