@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <h3>Dashboard</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    <div class="ContentMainFull">
        <h1>Welkom {{Auth::user()->name}}</h1>
        <small>{{Auth::user()->role->role_name}}</small>
        <br>
        Underconstruction
        <br>
        <hr>

        <h2>Aankomende events waarvoor ik aangemeld ben</h2>

        <p>Aantal: {{count($events)}}</p>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>naam</th>
                    <th>datum</th>
                </tr>
            <thead>
                @if (count($events)>0)
                                                
                        @foreach ($events as $event)
                        <tr>
                                <td>{{$event->eventname}}</td>
                                <td>{{$event->date}}</td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="4">Er zijn aankomende activiteiten</td>
                    </tr>
                @endif
            </table>  



            <br>
            <hr>
        <h2>Mijn forum topics</h2>

        <p>Aantal: {{count($topics)}}</p>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Forum topics</th>
                    <th>Gemaakt op</th>
                    <th>Aantal reacties</th>
                </tr>
            <thead>
                @if (count($topics)>0)
                                                
                        @foreach ($topics as $topic)
                        <td>
                                {{$topic->title}}
                            </td>
        
        
                            <td>
                                {{$topic->created_at->format('d-m-Y H:i')}}
                            </td>
        
        
                            <td>
                                {{$topic->forumpost->count()}}
                            </td>
        
                        @endforeach
                    @else
                    <tr>
                        <td colspan="4">je hebt nog geen forum topics</td>
                    </tr>
                @endif
            </table>  
    </div>
</div>
@endsection
