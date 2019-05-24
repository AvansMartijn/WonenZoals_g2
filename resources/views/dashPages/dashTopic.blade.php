@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/forum" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Topic</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- content --}}
<div class="container">
    <div class="TopicContent">
        <h1>{{$topic->title}}</h1> 
        <p>{{$topic->message}}</p>
        <hr>
        <small>{{$topic->user->name}} {{$topic->created_at->format('d-m-Y H:i')}}</small>
    </div>

    <br>

    <div class="TopicReactions">
        
        @if (count($reactions) != 0)
        <h3>Reacties</h3>
        @endif

        <div class="list-group">

            @foreach ($reactions as $reaction)
                <div class="list-group-item flex-column align-items-start">

                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$reaction->user->name}}</h5>
                        <small>{{$reaction->created_at->format('d-m-Y H:i')}}</small>
                    </div>

                    <p class="mb-1">{{$reaction->message}}</p>

                    <small>

                        @if (Auth::user()->role_id == 1 || $reaction->user_id == Auth::user()->id)
                            {!!Form::open(['action' => ['ForumController@deleteReaction', $reaction->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                            {!!Form::close()!!}
                        @endif

                    </small>
            </div>

            @endforeach
        </div>
        {{-- Tot hier --}}

        <br>

        <h3>Reactie achterlaten</h3>
        <hr>
        {!! Form::open(['action' => 'ForumController@storeReaction', 'methode' => 'POST']) !!}
                        
            <div class="form-group">
                {{Form::textarea('Reactie','',['class' => 'form-control','rows' => '5', 'placeholder' => 'Reactie',
                "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Typ hier de reactie"])}}
            </div>

            {{ Form::hidden('id', $topic->id) }}
        
            {{Form::submit("Reageren", ['class' => 'btn btn-success float-right'])}}
            
        {!! Form::close() !!} 

    </div>

</div>
@endsection