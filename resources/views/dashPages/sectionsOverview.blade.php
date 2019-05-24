@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
        <h3>Secties Overzicht</h3>
        <hr>
</div>

<div class="HamburgerMenu">
        <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="container">
        <div class="MainContentFull">
                <div class="center">
                        {{-- <a class="btn btn-success bottom-spacer" href="{{ route('meals.build') }}">Nieuw gerecht</a> --}}
                        <button class="btn btn-success half-width" data-toggle="modal" data-target="#vangnet">Nieuwe Sectie</button>
                        
                        <a class="btn btn-danger half-width" href="{{ route('factorysettings') }}" data-toggle="tooltip" data-placement="top" title="Pas op! Alle wijzigingen zullen worden verwijderd!">Fabrieksinstellingen</a>
                </div>
                <br>
                <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search" autofocus>
                <br>
                <table class="table table-striped">
                        <thead>
                                <tr>
                                        <th>Naam</th>
                                        <th>Type</th>
                                        <th>Standaard Sectie</th>
                                        <th>Volgorde</th>
                                        <th>Acties</th>
                                </tr>
                        </thead>
                        <tbody class="Searchable">
                                @foreach ($sections as $section)
                                        <tr>
                                                <td>{{$section->name}}</td>
                                                <td>{{ __('back.' . $section->type()->first()->type) }}</td>
                                                <td>{{$section->default_section}}</td>
                                                <td>{{$section->order}}</td>
                                                <td class="text-left">
                                                        {!!Form::open(['action' => ['SectionsController@deleteSection', $section->id], 'method' => 'POST'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        
                                                        @if ($section->type_id == 1)
                                                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right disabled', 'disabled' => 'disabled'])}}
                                                        @else
                                                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                                                        @endif

                                                        {!!Form::close()!!}
                                                        @switch($section->type_id)
                                                            @case(1)
                                                                <a class="btn btn-success float-right margin-right" href="/dashboard/sections/leaf">Aanpassen</a>
                                                                @break
                                                            @case(2)
                                                                <a class="btn btn-success float-right margin-right" href="/dashboard/sections/seperator/edit/{{$section->id}}">Aanpassen</a>
                                                                @break
                                                            @case(3)
                                                                <a class="btn btn-success float-right margin-right" href="/dashboard/sections/text/edit/{{$section->id}}">Aanpassen</a>
                                                                @break
                                                            @case(4)
                                                                 <a class="btn btn-success float-right margin-right" href="/dashboard/bewoners">Aanpassen</a>
                                                                @break
                                                            @case(5)
                                                                 <a class="btn btn-success float-right margin-right" href="/dashboard/nieuws/">Aanpassen</a>
                                                                @break
                                                            @case(6)
                                                                <a class="btn btn-success float-right margin-right" href="/dashboard/contact/">Aanpassen</a>
                                                                @break
                                                            @case(7)
                                                                <a class="btn btn-success float-right margin-right" href="/dashboard/sponsors/">Aanpassen</a>
                                                                @break
                                                            @default
                                                                
                                                        @endswitch     
                                                        @if ($section->type_id != 1 && $section->type()->first()->type != 'leaf')
                                                                @if ($section->order != $sections->maxOrder)
                                                                
                                                                        <a class="btn btn-primary float-right margin-right" href="/dashboard/sections/movedown/{{$section->id}}"><span class="fas fa-arrow-down"></span></a>
                                                                @endif
                                                                @if ($section->order != 2)
                                                                        <a class="btn btn-primary float-right margin-right" href="/dashboard/sections/moveup/{{$section->id}}"><span class="fas fa-arrow-up"></span></a>
                                                                @endif
                                                        @endif
                                                </td>
                                        </tr>
                                @endforeach
                        </tbody>
                </table>
                <div class="modal fade lg" id="vangnet" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                                <h3 class="modal-Name font-weight-bold">Nieuwe Sectie</h3>
                                {!! Form::open(['action' => 'SectionsController@storeSection', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

    
                                <div class="form-group">
                                        <label for="name">Naam</label>
                                        <input type="text" class="form-control" name="name" autocomplete="off">
                                </div>
                                <hr>
                                <label for="name">Type</label>

                                <div class="funkyradio">
                                        <div class="funkyradio-success">
                                                <input type="radio" name="type" value="3" id="text" checked/>
                                                <label for="text">Tekst Sectie</label>
                                        </div>
                                
                                        <div class="funkyradio-success">
                                                <input type="radio" name="type" value="2" id="sep" />
                                                <label for="sep">Scheiding</label>
                                        </div>
                                        <div class="funkyradio-success">
                                                <input type="radio" name="type" value="4" id="residents" />
                                                <label for="residents">Onze Bewoners</label>
                                        </div>
                                        <div class="funkyradio-success">
                                                <input type="radio" name="type" value="5" id="news" />
                                                <label for="news">Nieuws</label>
                                        </div>
                                        <div class="funkyradio-success">
                                                <input type="radio" name="type" value="6" id="contact" />
                                                <label for="contact">Contact</label>
                                        </div>       
                                        <div class="funkyradio-success">
                                                <input type="radio" name="type" value="7" id="sponsors" />
                                                <label for="sponsors">Sponsoren</label>
                                        </div> 
                                
                                        
                                </div>

                                <p class="text">
                                  Na het aanmaken van een sectie kunt u de volgorde en inhoude wijzigen in het sectieoverzicht.
                                </p>
                                <hr>
                                {{Form::submit("Toevoegen", ['class' => 'btn btn-success full-width'])}}
                        </div>
                        {!! Form::close() !!}
                
                            </div>
                          </div>
                        </div>
                      </div>
        </div>
</div>
@endsection
