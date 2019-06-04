@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <h3>Forum</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="container">

    <div class="MainContentFull">
        <h1>Nieuw Topic</h1>
        <hr>
        
        {!! Form::open(['action' => 'ForumController@store', 'methode' => 'POST']) !!}
                    
            <div class="form-group">
                {{Form::text('Titel','',['class' => 'form-control', 'placeholder' => 'Titel',
                "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Typ hier de titel van het topic",
                'autocomplete' => 'off'])}}
            </div>

            <div class="form-group">
                {{Form::text('Vraag','',['class' => 'form-control', 'placeholder' => 'Vraag',
                "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Typ hier de vraag",
                'autocomplete' => 'off'])}}
            </div>
        
            {{Form::submit("Toevoegen", ['class' => 'btn btn-success float-right'])}}
            <br>
        {!! Form::close() !!} 
                
    </div>
    <br>
    <hr>
    <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search" autofocus>
    <div class="MainContentFull">
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Forum topics</th>
                    <th>Gemaakt op</th>
                    <th>Aantal reacties</th>
                </tr>
            </thead>
    
            <tbody class="Searchable">
                @foreach ($topics as $topic)
                
                    <tr>
                        <td>
                            <a href="/dashboard/forum/topic/{{$topic->id}}">
                                {{$topic->title}}
                            </a>
                        </td>
    
                        <td>
                            {{$topic->created_at->format('d-m-Y H:i')}}
                        </td>
    
                        <td>
                            {{$topic->forumpost->count()}}
                        </td>

                    </tr>
                
                @endforeach
    
            </tbody>
            
        </table>
    </div>

</div>

@endsection
