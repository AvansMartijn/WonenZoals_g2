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
                $role = Auth::user()->role_id;

                if ($role !== 1) {
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
        $users = User::orderBy('role_id', 'DESC')->get();

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

        $authoriation = $user->authorizations()->get();

        $authoriationsAvailable = authorizationLookup::all()->keyBy('id');

        foreach ($authoriationsAvailable as $authoriationsAvailablee) {
            foreach ($authoriation as $authoriationn) {
                if ($authoriationsAvailablee->id == $authoriationn->id) 
                {
                    $authoriationsAvailable->forget($authoriationsAvailablee->id);
                }

            }

        }

        //return $authoriationsAvailable;
        return view('dashPages.dashGebruikersDetails')->with(compact('user', 'authoriation', 'authoriationsAvailable'));
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

        if ($request['role_check'] != null) {

            foreach ($request['role_check'] as $machtiging) {

                $auth = AuthorizationLookup::where('id', $machtiging)->first();
                $user->authorizations()->save($auth);

            }
            return redirect()->back()->with('success', 'De machtiging is toegevoegd');
        } else {
            return redirect()->back()->with('error', 'Er is geen machtiging geselecteerd');
        }

    }


    /**
     * Show the application dashboard.
     *
     * @param id $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroymachtiging($id,$user_id)
    {

        $authh = authorization::where('authorization_id', $id)->where('user_id', $user_id)->first();

        $user = User::where('id', $authh->user_id)->first();

        $user->authorizations()->detach($id);

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

        // $authh = $user->authorizations;

        // foreach ($authh as $auth) {
        //     $auth->delete();
        // }

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
