<?php

namespace App\Http\Controllers;

use App\AgendaEvent;
use Auth;
use Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date),
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
        return View('Dashpages.agendaOverview', compact('calendar_details'));
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
        $event_user = \App\UsersAgendaEvents::where('event_id', $id);
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
        // echo '<pre>';
        // var_dump($user_events);
        // die;
        if($user_events->contains($id)){
            $event->applied = true;
        }else{
            $event->applied = false;
        }
        $data = ['event' => $event];
        return View('Dashpages.agendaDetail', ["data" => $data]);
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

        // TODO add events
        // \App::setLocale('nl');

        // $validator = Validator::make(
        //     $request->all(), [
        //         'event_name' => 'required|between:3,50',
        //         'start_date' => 'required',
        //         'times' => 'required',
        //         'interval' => 'required',
        //         'payment_times' => 'required',
        //         'payment_amount' => 'required|min:1',
        //         'payment_times' => 'required|min:1',
        //         'description' => 'required|between:3,200',
        //         'bank_account' => 'required',
        //     ]
        // );

        // if ($validator->fails()) {
        //     \Session::flash('Warning', 'please enter valid details');
        //     return back()->withInput()->withInput()->withErrors($validator);
        // }

        // for ($i = 0; $i < $request['times']; $i++) {
        //     $dt = Carbon::create($request['start_date']);
        //     if ($request['interval'] == 'daily') {
        //         $newDate = $dt->addDays($i);
        //     } elseif ($request['interval'] == 'weekly') {
        //         $newDate = $dt->addWeeks($i);
        //     } elseif ($request['interval'] == 'monthly') {
        //         $newDate = $dt->addMonths($i);
        //     } elseif ($request['interval'] == 'yearly') {
        //         $newDate = $dt->addYears($i);
        //     }
        //     $event = new Event;
        //     $event->user_id = Auth::id();
        //     $event->name = $request['event_name'];
        //     $event->payment_amount = $request['payment_amount'];
        //     $event->payment_times = $request['payment_times'];
        //     $event->description = $request['description'];
        //     $event->bank_account_id = $request['bank_account'];
        //     $event->currency_code = $request['currency_code'];
        //     $event->start_date = $newDate;
        //     $event->end_date = $newDate;
        //     $event->save();
        // }

        // \Session::flash('Success', 'Events added successfully');
        // return Redirect::to('/calendar');

    }

    /**
     * Create the view
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank_accounts = \App\Bank_account::where('user_id', Auth::id())->get();
        return View('create_calendar_event', ['bank_accounts' => $bank_accounts]);
    }
}
