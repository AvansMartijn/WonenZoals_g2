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

                $userAuth = $userAuth->authorizations;

                $toegang = false;

                foreach ($userAuth as $userAuthh) {
                    if ($userAuthh->authorization == "Agenda") {
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
            //create a Calendar item for this event
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
        return back();
    }

    public function cancel($id)
    {
        $event = Auth::user()->events()->where('event_id', $id)->first();
        $event->pivot->applied = 0;
        $event->pivot->update();
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
            'eventname' => 'required|max:255',
            'description' => 'required|max:255',
            'date' => 'date',
            'role_check' => 'required',

        ]);
        //
        $autoApply = 0;
        if ($request['auto_apply'] != null) {
            $autoApply = 1;
        }

        $event = new AgendaEvent;
        $event->eventname = $request['eventname'];
        $event->location = $request['location'];
        $event->transport = $request['transport'];
        $event->organiser_id = Auth::id();
        $event->description = $request['description'];
        $event->date = $request['date'];
        $event->enddate = $request['enddate'];
        $event->save();
        
        if($request['voorgerecht'] != ""){
            // die;
            $meal = \App\Meal::where('id', $request['voorgerecht'])->first();
            $event->meals()->save($meal);
        }

        if($request['hoofdgerecht'] != ""){
            $meal = \App\Meal::where('id', $request['hoofdgerecht'])->first();
            $event->meals()->save($meal);
        }

        if($request['nagerecht'] != ""){
            $meal = \App\Meal::where('id', $request['nagerecht'])->first();
            $event->meals()->save($meal);
        }
        // var_dump($request['voorgerecht']);
        // die;

        foreach ($request['role_check'] as $group) {
            $users = \App\User::where('role', $group)->get();
            foreach ($users as $user) {
                $user->events()->save($event, ['applied' => $autoApply]);
                // App\User::find()->roles()->save($role, ['expires' => $expires]);
            }
        }
        return redirect()->back()->with('success', 'activiteit is aangemaakt');
    }

    /**
     * Create the view
     *
     * @return \Illuminate\Http\Response
     */
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
