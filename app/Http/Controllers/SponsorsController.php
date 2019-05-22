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

    public function showSponsorDetails($id){
        $sponsor = Sponsor::where('id', $id)->first();

        return view('dashPages.sponsorDetails')->with(compact('sponsor'));
    }

    public function create(){
        return view('dashPages.sponsorCreate');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'sponsorNaam' => 'required|max:255',
            'sponsorLink' => 'required|max:255',
            'imageUrl' => 'required|max:255',
        ]);

        $sponsor = new Sponsor;
        $sponsor->name = $request['sponsorNaam'];
        $sponsor->hyperlink = $request['sponsorLink'];
        $sponsor->img_url = $request['imageUrl'];
        $sponsor->save();

        $notification = array(
            'message' => 'sponsor is toegevoegd',
            'alert-type' => 'success'
        );

        return redirect('/dashboard/sponsors')->with($notification);
    }

    public function update(Request $request){
        $this->validate(
            $request,
            [
                'naam' => 'required',
                'link' => 'required',
                'afbeeldingUrl' => 'required',
            ]
        );

        $sponsor = Sponsor::find($request->id);
        $sponsor->name = $request->input('naam');
        $sponsor->hyperlink = $request->input('link');
        $sponsor->img_url = $request->input('afbeeldingUrl');

        $sponsor->save();

        return redirect('/dashboard/sponsors')->with('success', 'Sponsor is geupdatet');
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
