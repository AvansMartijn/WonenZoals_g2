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

        return view('dashPages.dashGebruikersDetails')->with(compact('user', 'authoriation'));
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

        $this->validate(
            $request, [
                'machtiging' => 'required',
            ]
        );

        $machti = authorization::where('user_id', $request->input('id'))->get();

        foreach ($machti as $machting) {
            if ($machting->authorization == $request->input('machtiging')) {
                return redirect()->back()->with('error', "De gebruiker heeft deze machtiging al ");
            }
        }

        //create the machtiging
        $macht = new authorization();
        $macht->user_id = $request->input('id');
        $macht->authorization = $request->input('machtiging');
        $macht->save();

        // redirect user back
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

        return redirect()->back()->with('success', 'De gebruiker is verwijdert');
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
            $request, [
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