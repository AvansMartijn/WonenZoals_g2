<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\authorization;
use Illuminate\Support\Facades\Auth;

class GebruikerBeheren extends Controller
{
    function showGebruikers(){

        $users = User::all();

        return view('dashPages.dashGebruikers')->with('users', $users);
    }

    public function showGebruikersDetails($id)
    {

        $user = User::where('id', $id)->first();

        $authoriation = $user->authorizations;

        return view('dashPages.dashGebruikersDetails')->with(compact('user', 'authoriation'));
    }



    public function store(Request $request)
    {

        $this->validate(
            $request, [
                'machtiging' => 'required',
            ]
        );
        

        $machti = authorization::where('user_id', $request->input('id'))->get();
        
        foreach($machti as $machting)
        {
            if($machting->authorization == $request->input('machtiging'))
            {
                return redirect()->back()->with('error', "De gebruiker heeft deze machtiging al ");
            }
        }

        //create the event
        $macht = new authorization();
        $macht->user_id = $request->input('id');
        $macht->authorization = $request->input('machtiging');
        $macht->save();

        // redirect customer to Mollie checkout page
        return redirect(route('gebruikers', $request->id));
    }

    public function destroymachtiging($id)
    {

        $authh = authorization::where('id', $id)->first();

        $authh->delete();

        return redirect()->back()->with('success', 'De machtiging is verwijdert');
    }

    public function destroy($id)
    {
        if(Auth::user()->id == $id)
        {
            return redirect()->back()->with('error', 'Je kan de huidig gebruiker niet verwijderen');
        }

        $user = User::where('id', $id)->first();

        $authh = $user->authorizations;

        foreach($authh as $auth)
        {
            $auth->delete();
        }

        $user->delete();
    

        return redirect()->back()->with('success', 'De gebruiker is verwijdert');
    }
}
