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

        <div class="SideContent">
                <h1>Toevoegen</h1>
                <hr>
                    {!! Form::open(['action' => 'ForumController@store', 'methode' => 'POST']) !!}
                                
                        <div class="form-group">
                            {{Form::text('Titel','',['class' => 'form-control', 'placeholder' => 'Titel'])}}
                        </div>
        
                        <div class="form-group">
                            {{Form::text('Vraag','',['class' => 'form-control', 'placeholder' => 'Vraag'])}}
                        </div>
                    
                        {{Form::submit("Toevoegen", ['class' => 'btn btn-success float-right'])}}
                        
                    {!! Form::close() !!} 
                </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Forum topics</th>
                <th>Gemaakt op</th>
                <th>Aantal reacties</th>
                <th>Naar topic</th>
            </tr>
        </thead>
        <tbody class="Searchable">
           @foreach ($topics as $topic)
               
           
                <tr>
                    <td>
                        {{$topic->title}}
                    </td>


                    <td>
                        {{$topic->created_at}}
                    </td>


                    <td>

                    </td>

                    <td>
                        <a class="btn btn-primary float-left margin-right" href="/dashboard/forum/topic/{{$topic->id}}">Topic</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>


</div>

@endsection
