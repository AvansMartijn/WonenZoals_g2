<?php
/**
 * Main controller for Dashboard
 *
 * PHP version 7.3
 *
 * @category Controllers
 * @package  Wonenzoals
 * @author   Xandor Janssen <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaEvent;
use App\ContactUS;
use App\ForumPost;
use App\Topic;
use App\User;
use App\Diensten;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * DashboardController Class Doc Comment
 *
 * @category Class
 * @package  DashboardController
 * @author   Xandor Janssen <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            return $this->dashBeheerder();
        } elseif (auth()->user()->role_id == 4 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3) {
            return $this->dashGebruiker();
        } 
        elseif (auth()->user()->role_id == 5) {
            return $this->dashCoach();
        }else {
            return view('login');
        }
    }

    public function dashBeheerder()
    {
        //al de events uit de database
        $events = AgendaEvent::get()->keyBy('id');

        $request = 0;

        $applied = 0;

        foreach ($events as $event) {
            //kijken of de gebruiker zich heeft aangemeld voor het event

            foreach($event->users as $eve)
            {
                //return $eve->pivot;
                if (!$eve->pivot->applied) {

                    $request++;
    
                } elseif($eve->pivot->applied) {
    
                    $applied++;
                    $request++;
    
                }
            }


            if($applied != 0)
            {
                $percent = round(($applied / $request) * 100);
            }
            else
            {
                $percent = 0;
            }


            

            $event->setAttribute('request', $request);
            $event->setAttribute('applied', $applied);

            $event->setAttribute('percent', $percent);

            $request = 0;
            $applied = 0;

        }


        // //al de gebuikers
        // $numberOfBewoners = User::where('role_id', 3)->count();
        // $numberOfVrijwilliger = User::where('role_id', 2)->count();
        // $numberOfOuder = User::where('role_id', 4)->count();

        //al de contact formulier berichten
        $contacts = ContactUS::all();

        $date = Carbon::today()->subDays(30);
        $contacts30 = ContactUS::where('created_at', '>=', $date)->get();
        $diensten = Diensten::whereDate('start_datetime', Carbon::today())->orderBy('start_datetime', 'ASC')->get();

        return view('dashPages.dashBeheerder')->with(compact('events', 'contacts', 'contacts30','diensten'));
    }

    public function dashGebruiker()
    {
        //al de events van de gebruiker
        $events = Auth::user()->events()->get()->keyBy('id');

        foreach ($events as $event) {
            //kijken of de gebruiker zich heeft aangemeld voor het event
            if (!$event->pivot->applied) {

                $events->forget($event->id);
            } else {

                //kijken of het een toekomstig event is
                $date = new Carbon;

                if ($date > $event->date) {
                    $events->forget($event->id);
                }

            }

        }

        //al de topics van de gebruiker
        $topics = Topic::where('user_id', Auth::user()->id)->get();

        //pak al de topics waar op gereageerd is door de ingelogde gebruiker
        $reactiontopics = Topic::all()->keyBy('id');
       
        $counter = 0;

        foreach($reactiontopics as $reactiontopic)
        {
            $testerloop =  $reactiontopic->forumpost;

            foreach( $testerloop as $reaction)
            {
                if($reaction->user_id == Auth::user()->id)
                {
                    $counter++;
                }
            }

            if($counter == 0)
            {
                $reactiontopics->forget($reactiontopic->id);
            }

            $counter = 0;
        }

        $diensten = Diensten::whereDate('start_datetime', Carbon::today())->orderBy('start_datetime', 'ASC')->get();
    
        return view('dashPages.dashGebruikersDashboard')->with(compact('events', 'topics', 'reactiontopics','diensten'));
    }

    public function dashCoach()
    {
        $diensten = Diensten::where('user_id', auth()->user()->id)->orderBy('start_datetime', 'ASC')->get();

        return view('dashPages.dashCoach')->with('diensten',$diensten);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'Naam' => 'required',
                'Start_tijd'   => 'date|required',
                'Eind_tijd' => 'date|required|after:Start_tijd',
            ]
        );

        $dienst = new Diensten();
        $dienst->naam = $request->input('Naam');
        $dienst->start_datetime = Carbon::parse($request->input('Start_tijd'))->format('Y-m-d H:i:s');
        $dienst->eind_datetime = Carbon::parse($request->input('Eind_tijd'))->format('Y-m-d H:i:s');
        $dienst->user_id = Auth::user()->id;
        $dienst->coach_naam = Auth::user()->name;
        $dienst->save();

        $notification = array(
            'message' => 'dienst is toegevoegd', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

        /**
     * Delete the shift
     *
     * @param id $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dienst = Diensten::where('id', $id)->first();

        $dienst->delete();

        $notification = array(
            'message' => 'De dienst is verwijderd', 
            'alert-type' => 'success'
        );

        return redirect('/dashboard')->with($notification);
    }
}
