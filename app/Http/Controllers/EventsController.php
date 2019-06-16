<?php
/**
 * Main controller for agenda
 *
 * PHP version 7.3
 *
 * @category Controllers
 * @package  Wonenzoals
 * @author   Chiel  <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
namespace App\Http\Controllers;

use App\AgendaEvent;
use Auth;
use Calendar;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Input;

/**
 *  EventsController Class Doc Comment
 *
 * @category Class
 * @package  EventsController
 * @author   Chiel <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
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

        //fixed register login
        $this->middleware(
            function ($request, $next) {

                $userAuth = Auth::user();

                $userAuth = $userAuth->authorizations()->get();

                $toegang = false;

                foreach ($userAuth as $userAuthh) {
                    if ($userAuthh->id == 1) {
                        $toegang = true;
                    }
                }

                if (!$toegang) {
                    return redirect('/dashboard');
                }

                return $next($request);
            }
        );
    }

    /**
     * Get the homepage for Events
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //get events that have a relation with this user
        $events = Auth::user()->events()->get();
        $event_list = [];
        foreach ($events as $key => $event) {
            //check if the user already has a relation with this event
            if (!$event->pivot->applied) {
                //no relation means he has NOT applied for this event
                $color = "#227dc7";
            } else {
                //relation means he HAS applied for this event
                $color = "#38c172";
            }
            if ($event->cancelled == 1) {
                $color = "red";
            }
            //create a Calendar item for this event
            if (!array_key_exists($event->id, $event_list)) {
                $event_list[] = Calendar::event(
                    $event->eventname,
                    false,
                    new \DateTime($event->date),
                    new \DateTime($event->enddate),
                    $event->id,
                    [
                        'color' => $color,
                    ]
                );
            }
        }
        //add all events to the calendar
        $calendar_details = Calendar::addEvents($event_list)->setCallbacks(
            [ //set fullcalendar callback options (will not be JSON encoded)
                'eventClick' =>
                    'function(event) { if(event.id) {window.location.assign("/dashboard/agenda/item/"
                                        + event.id, "_blank"); return false;}}',
            ]
        );
        //check whether we have to adjust the scale of the calendar for mobile devices
        $agent = new Agent();
        if ($agent->isMobile()) {
            $calendar_details->setOptions(['aspectRatio' => 1]);
        }
        $calendar_details->setOptions(['timeFormat' => 'H:mm']);
        return View('dashPages.agendaOverview', compact('calendar_details'));
    }

    /**
     * Create a request
     *
     * @param int $id The id
     *
     * @return \Illuminate\Http\Response
     */

    public function apply($id)
    {
        $event = Auth::user()->events()->where('event_id', $id)->first();
        $event->pivot->applied = 1;
        $event->pivot->update();

        $notification = array(
            'message' => 'U bent aangemeld',
            'alert-type' => 'success'
        );


        return back()->with($notification);
    }

    public function cancel($id)
    {
        $event = Auth::user()->events()->where('event_id', $id)->first();
        $event->pivot->applied = 0;
        $event->pivot->update();

        $notification = array(
            'message' => 'U bent afgemeld',
            'alert-type' => 'success'
        );

        return back()->with($notification);
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
        $event = Auth::user()->events()->where('event_id', $id)->first();
        $event->organiser_name = \App\User::where('id', $event->organiser_id)->first()->name;
        $users_applied = $event->users()->where('applied', 1)->get();

        $voorgerecht = $event->meals()->where('type', 'voorgerecht')->get()->first();
        $hoofdgerecht = $event->meals()->where('type', 'hoofdgerecht')->get()->first();
        $nagerecht = $event->meals()->where('type', 'nagerecht')->get()->first();


        $meal = ['voorgerecht' => $voorgerecht, 'hoofdgerecht' => $hoofdgerecht, 'nagerecht' => $nagerecht];
        $data = ['event' => $event, 'users' => $users_applied, 'meal' => $meal];
        return View('dashPages.agendaDetail', ["data" => $data]);
    }

    /**
     * Add an event
     *
     * @param Request $request The request
     *
     * @return \Illuminate\Http\Response
     */
    public function addEvent(Request $request)
    {


        $validatedData = $request->validate([
            'eventname' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required|max:255',
            'transport' => 'max:255',
            'date' => 'date',
            'image' => 'image|max:2000',
            'enddate' => 'date|after:date',
            'role_check' => 'required',
            'hoofdgerecht' => 'required_if:isMeal,1'

        ]);


        $autoApply = 0;
        if ($request['auto_apply'] != null) {
            $autoApply = 1;
        }

        $imagePath = null;
        if (isset($request->image) && $request->image != null) {
            $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName;

            request()->image->move($path, $imageName);
        }

        $event = new AgendaEvent;
        $event->eventname = $request['eventname'];
        $event->location = $request['location'];
        $event->transport = $request['transport'];
        $event->organiser_id = Auth::id();
        $event->description = $request['description'];
        $event->date = $request['date'];
        $event->enddate = $request['enddate'];
        $event->image_url = $imagePath;
        $event->save();

        if ($request['voorgerecht'] != "") {
            // die;
            $meal = \App\Meal::where('id', $request['voorgerecht'])->first();
            $event->meals()->save($meal);
        }

        if ($request['hoofdgerecht'] != "") {
            $meal = \App\Meal::where('id', $request['hoofdgerecht'])->first();
            $event->meals()->save($meal);
        }

        if ($request['nagerecht'] != "") {
            $meal = \App\Meal::where('id', $request['nagerecht'])->first();
            $event->meals()->save($meal);
        }

        $user = \App\User::where('id', Auth::id())->first();
        $user->events()->save($event, ['applied' => $autoApply]);

        foreach ($request['role_check'] as $group) {
            $users = \App\User::where('role_id', $group)->get();
            foreach ($users as $user) {
                if ($user->id != Auth::id()) {
                    $user->events()->save($event, ['applied' => $autoApply]);
                }
            }
        }

        return redirect('dashboard/agenda')->with('success', 'Activiteit is aangemaakt');
    }

    public function cancelEvent($id)
    {
        $event = \App\AgendaEvent::where('id', $id)->update(['cancelled' => 1]);
        return redirect()->back()->with('success', 'Activiteit is geannuleerd');
    }

    public function deleteEvent($id)
    {
        $event = \App\AgendaEvent::where('id', $id)->first();
        if ($event->cancelled == 1) {
            $event->delete();
            return redirect('dashboard/agenda')->with('success', 'Activiteit is verwijderd');
        }
        if ($event->cancelled == 0) {
            return redirect()->back()->with('warning', 'Om de activiteit te verwijderen dient deze geannuleerd te zijn.');
        }

    }
    public function retainEvent($id){
        $event = \App\AgendaEvent::where('id', $id)->update(['cancelled' => 0]);
        return redirect()->back()->with('success', 'Activiteit is weer zichtbaar');
    }

    public function updateEvent(Request $request, $eventid)
    {

        $validatedData = $request->validate([
            'eventname' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required|max:255',
            'date' => 'date',
            'image' => 'image',
            'enddate' => 'date|after:date',
            'role_check' => 'required',

        ]);
        $autoApply = 0;
        if ($request['auto_apply'] != null) {
            $autoApply = 1;
        }
        $imageSet = 0;
        $imagePath = null;
        if (isset($request->image) && $request->image != null) {
            $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName;

            request()->image->move($path, $imageName);
            $imageSet = 1;
        }  else {

        }

           $event = \App\AgendaEvent::findOrFail($eventid);
           $event->eventname = $request['eventname'];
           $event->location = $request['location'];
           $event->transport = $request['transport'];
           $event->description = $request['description'];
           $event->date = $request['date'];
           $event->enddate = $request['enddate'];
          if($imageSet){ $event->image_url = $imagePath;}
           $event->save();


        if ($request['voorgerecht'] != "") {
            // die;
            $meal = \App\Meal::where('id', $request['voorgerecht'])->first();
            AgendaEvent::findOrFail($eventid)->meals()->save($meal);
        }

        if ($request['hoofdgerecht'] != "") {
            $meal = \App\Meal::where('id', $request['hoofdgerecht'])->first();
            AgendaEvent::findOrFail($eventid)->meals()->save($meal);
        }

        if ($request['nagerecht'] != "") {
            $meal = \App\Meal::where('id', $request['nagerecht'])->first();
            AgendaEvent::findOrFail($eventid)->meals()->save($meal);
        }


       foreach ($request['role_check'] as $group) {
           $users = \App\User::where('role_id', $group)->get();
           foreach ($users as $user) {
               if ($user->id != Auth::id()) {
                $hasevent = false;
                foreach ($user->events()->get() as $u_event)
                {
                    if ($u_event->id == $eventid)
                    {
                        $hasevent = true;
                    }
                }
                if(!$hasevent){
                    $user->events()->save(AgendaEvent::findOrFail($eventid), ['applied' => $autoApply]);
                }
               }
           }
       }
        return redirect('dashboard/agenda')->with('success', 'Activiteit is aangepast');
    }


    /**
     * Create the view
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a request
     *
     * @param int $id The id
     *
     * @return \Illuminate\Http\Response
     */
    public function editMeal($id)
    {
        $meals = \App\Meal::all();
        $event = AgendaEvent::findOrFail($id);
        return View("dashPages.agendaEditMealActivity", ['meals' => $meals], compact('event'));
    }
    public function editActivity($id)
    {
        $event = AgendaEvent::findOrFail($id);
        return View("dashPages.agendaEditActivity", compact('event' ));
    }
    public function createMeal()
    {
        $meals = \App\Meal::all();
        
        return View('dashPages.agendaCreateMealActivity', ['meals' => $meals]);
    }

    public function createActivity()
    {
        return View('dashPages.agendaCreateActivity');
    }

}
