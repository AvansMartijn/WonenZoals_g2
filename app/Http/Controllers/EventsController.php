<?php

namespace App\Http\Controllers;

use App\AgendaEvent;
use Auth;
use Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

        //fixed register login
        $this->middleware(function ($request, $next) {

            $userAuth = Auth::user();

            $userAuth =  $userAuth->authorizations;

            $toegang = false;

            foreach($userAuth as $userAuthh)
            {
                if($userAuthh->authorization == "Agenda")
                {
                    $toegang  = true;
                }
            }

            if(!$toegang)
            {
                return redirect('/dashboard');
            }

            return $next($request);
        });
    }

    /**
     * Get the homepage for Events
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = AgendaEvent::all();
        $user_events = Auth::user()->events()->get();
        $event_list = [];
        $user_event_list = [];
        foreach ($events as $key => $event) {
            if (!$user_events->contains($event->id)) {
                $color = "blue";
            }else{
                $color = "green";
            }
            $event_list[] = Calendar::event(
                $event->eventname,
                false,
                new \DateTime($event->date),
                new \DateTime($event->date),
                $event->id,
                [
                    'color' => $color,
                ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list)->setCallbacks(
            [ //set fullcalendar callback options (will not be JSON encoded)
                'eventClick' =>
                'function(event) { if(event.id) {window.open("/dashboard/agenda/item/"
                                        + event.id, "_blank"); return false;}}',
            ]
        );
        $agent = new Agent();
        if ($agent->isMobile()) {
            $calendar_details->setOptions(['aspectRatio' => 1]);
        } else {
            $calendar_details->setOptions(['aspectRatio' => 1.8]);
        }
        return View('dashPages.agendaOverview', compact('calendar_details'));
    }

     /**
     * Create a request
     *
     * @param int $id The id
     *
     * @return \Illuminate\Http\Response
     */
    public function apply($id){
        $event_user = new \App\UsersAgendaEvents;
        $event_user->event_id = $id;
        $event_user->user_id = Auth::id();
        $event_user->save();
        return back();
    }

    public function cancel($id){
        $event_user = \App\UsersAgendaEvents::where([['event_id', $id], ['user_id', Auth::id()]]);
        $event_user->delete();
        return back();
    }

    /**
     * Create a request
     *
     * @param int $id The id
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $event = \App\AgendaEvent::find($id);
        $user_events = Auth::user()->events()->get();
        $users_applied = $event->users()->get();
        // echo '<pre>';
        // var_dump($user_events);
        // die;
        if($user_events->contains($id)){
            $event->applied = true;
        }else{
            $event->applied = false;
        }
        $data = ['event' => $event, 'users' => $users_applied];
        return View('dashPages.agendaDetail', ["data" => $data]);
    }

    /**
     * Add an event
     *
     * @param Request $request The request
     *
     * @return \Illuminate\Http\Response
     */
    public function addEvents(Request $request)
    {

    }

    /**
     * Create the view
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }
}
