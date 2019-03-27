<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\authorization;

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
        
        //create the event
        $macht = new authorization();
        $macht->user_id = $request->input('id');
        $macht->authorization = $request->input('machtiging');
        $macht->save();

        // redirect customer to Mollie checkout page
        return redirect(route('gebruikers', $request->id));
    }
}
