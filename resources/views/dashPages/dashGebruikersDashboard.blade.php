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

    {{-- check all auth witin a role --}}
    @foreach (Auth::user()->authorizations()->get() as $userauthorization)

        {{-- show agenda --}}
        @if ($userauthorization->id == 1)

        <div class="DashboardItem">

            <h2>Nieuwe Activiteiten</h2>

            <p>Aantal: {{count($events)}}</p>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Datum</th>
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
        </div>

        @endif

        {{-- show forum --}}
        @if ($userauthorization->id == 4)

        <div class="DashboardItem">

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
                        <tr>
                            <td>
                                {{$topic->title}}
                            </td>
            
            
                            <td>
                                {{$topic->created_at->format('d-m-Y H:i')}}
                            </td>
        
        
                            <td>
                                {{$topic->forumpost->count()}}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">je hebt nog geen forum topics</td>
                        </tr>
                @endif
            </table>  

        </div>

        <div class="DashboardItem">

            <h2>Forum topics waarop ik heb gereageerd</h2>

            <p>Aantal: {{count($reactiontopics)}}</p>
        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Forum topics</th>
                        <th>Gemaakt op</th>
                        <th>Aantal reacties</th>
                    </tr>
                <thead>
                @if (count($reactiontopics)>0)
                                                
                    @foreach ($reactiontopics as $reactiontopic)
                    <tr>
                        <td>
                            {{$reactiontopic->title}}
                        </td>
        
        
                        <td>
                            {{$reactiontopic->created_at->format('d-m-Y H:i')}}
                        </td>
        
    
                        <td>
                            {{$reactiontopic->forumpost->count()}}
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">je hebt nog geen forum topics</td>
                    </tr>
                @endif
            </table>  
        </div>

        @endif
        
    @endforeach

    </div>
</div>
@endsection
