<?php
/**
 * Main controller for user manage
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

use App\authorization;
use App\authorizationLookup;
use App\User;
use Illuminate\Http\Request;
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
class ManageUsersController extends Controller
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
                $role = Auth::user()->role;

                if ($role !== 'Beheerder') {
                    return redirect('/dashboard');
                }

                return $next($request);
            }
        );
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showGebruikers()
    {

        $users = User::all();

        return view('dashPages.dashGebruikers')->with('users', $users);
    }

    /**
     * Show the application dashboard.
     *
     * @param id $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function showGebruikersDetails($id)
    {

        $user = User::where('id', $id)->first();

        $authoriation = $user->authorizations;

        $authoriationsAvailable = authorizationLookup::all();

        return view('dashPages.dashGebruikersDetails')->with(compact('user', 'authoriation','authoriationsAvailable'));
    }

    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = User::where('id', $request->input('id'))->first();

        $authoriations = $user->authorizations;

        $authoriationsAvailables = authorizationLookup::all();

        foreach($authoriationsAvailables as $authoriationsAvailable)
        {
            $name = $authoriationsAvailable->name;

            $value = $request->input($name);

            $common = 0;

            $commonn = 0;

            if($value)
            {
                foreach($authoriations as $AUTH)
                {
                    if($AUTH->authorization == $name)
                    {
                        $common++;
                        $commonn++;
                    }
                   
                }

                if($common == 0)
                {
                    //create the machtiging
                    $macht = new authorization();
                    $macht->user_id = $request->input('id');
                    $macht->authorization = $name;
                    $macht->save();
                }
                else
                {
                    $common = 0;
                }
                    
            }


        }

        if($commonn > 0)
        {
            return redirect()->back()->with('error', 'Niet al de machtigingen zijn toegevoegd, omdat de gebruiker sommige machtigingen al had');
        }
        return redirect()->back()->with('success', 'De machtiging is toegevoegd');
    }

    /**
     * Show the application dashboard.
     *
     * @param id $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroymachtiging($id)
    {

        $authh = authorization::where('id', $id)->first();

        $authh->delete();

        return redirect()->back()->with('success', 'De machtiging is verwijderd');
    }

    /**
     * Show the application dashboard.
     *
     * @param id $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->back()->with('error', 'Je kan de huidig gebruiker niet verwijderen');
        }

        $user = User::where('id', $id)->first();

        $authh = $user->authorizations;

        foreach ($authh as $auth) {
            $auth->delete();
        }

        $user->delete();

        return redirect()->back()->with('success', 'De gebruiker is verwijderd');
    }

    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'naam' => 'required',
                'email' => 'required',
            ]
        );

        $user = User::find($request->id);
        $user->name = $request->input('naam');
        $user->email = $request->input('email');
        if ($request->wachtwoord != "") {
            $user->password = bcrypt($request->input('wachtwoord'));
        }
        $user->save();

        return redirect()->back()->with('success', 'Gebruiker is Geupdatet');
    }
}
