<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Sponsor;

class SponsorsController extends Controller
{
    public function index(){
        $sponsors = Sponsor::orderBy('id', 'ASC')->get();
        return view('dashPages.sponsorsOverview', compact('sponsors'));
    }

    public function create(){
        return view('dashPages.sponsorCreate');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'sponsorName' => 'required|max:255',
            'sponsorLink' => 'required|max:255',
            'imageUrl' => 'required|max:255',
        ]);

        $sponsor = new \App\Sponsor;
        $sponsor->name = $request['sponsorName'];
        $sponsor->hyperlink = $request['sponsorLink'];
        $sponsor->img_url = $request['imageUrl'];
        $sponsor->save();

        $notification = array(
            'message' => 'sponsor is toegevoegd',
            'alert-type' => 'success'
        );

        return redirect('/dashboard/sponsors')->with($notification);
    }

    public function destroy($id){
        $sponsor = \App\Sponsor::where('id', $id)->first();
        $sponsor->delete();

        $notification = array(
            'message' => 'sponsor is verwijderd',
            'alert-type' => 'success'
        );

        return redirect('dashboard/sponsors')->with($notification);
    }
}
