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

use App\AgendaEvent;
use App\ContactUS;
use App\ForumPost;
use App\Topic;
use App\User;
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
        } else {
            return view('login');
        }
    }

    public function dashBeheerder()
    {
        //al de events uit de database
        $events = AgendaEvent::all();

        //al de gebuikers
        $numberOfBewoners = User::where('role_id', 3)->count();
        $numberOfVrijwilliger = User::where('role_id', 2)->count();
        $numberOfOuder = User::where('role_id', 4)->count();

        //al de contact formulier berichten
        $contacts = ContactUS::all();

        $date = Carbon::today()->subDays(30);
        $contacts30 = ContactUS::where('created_at', '>=', $date)->get();

        return view('dashPages.dashBeheerder')->with(compact('events', 'numberOfBewoners', 'numberOfVrijwilliger', 'numberOfOuder', 'contacts', 'contacts30'));
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

        //al de gebruiker zijn reacties
        //$topicReactionOns = ForumPost::where('user_id', Auth::user()->id)->get();

        //

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
    
        return view('dashPages.dashGebruikersDashboard')->with(compact('events', 'topics', 'reactiontopics'));
    }
}
