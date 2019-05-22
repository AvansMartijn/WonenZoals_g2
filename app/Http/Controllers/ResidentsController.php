<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Http\Request;

class ResidentsController extends Controller
{
    public function index(){
        $residents = Resident::orderBy('id', 'ASC')->get();
        return view('dashPages.residentsView', compact('residents'));
    }

    public function create(){
        return view('dashpages.residentCreate');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'Naam' => 'required|max:255',
            'Beschrijving' => 'required|max:255',
            'imageUrl' => 'required|max:255',
        ]);

        $resident = new Resident;
        $resident->name = $request['Naam'];
        $resident->description = $request['Beschrijving'];
        $resident->img_url = $request['imageUrl'];
        $resident->save();

        $notification = array(
            'message' => 'Bewoner is toegevoegd',
            'alert-type' => 'success'
        );

        return redirect('/dashboard/bewoners')->with($notification);
    }

    public function edit($id){
        $resident = Resident::where('id', $id)->first();
        return view('dashPages.residentEdit')->with(compact('resident'));
    }

    public function update(Request $request){
        $this->validate(
            $request,
            [
                'Naam' => 'required',
                'Beschrijving' => 'required',
                'afbeeldingUrl' => 'required',
            ]
        );

        $resident = Resident::find($request->id);
        $resident->name = $request->input('Naam');
        $resident->description = $request->input('Beschrijving');
        $resident->img_url = $request->input('afbeeldingUrl');

        $resident->save();

        return redirect('/dashboard/bewoners')->with('success', 'Bewoner is geupdatet');
    }

    public function destroy($id){
        $resident = Resident::where('id', $id)->first();
        $resident->delete();

        $notification = array(
            'message' => 'Bewoner is verwijderd',
            'alert-type' => 'success'
        );

        return redirect('dashboard/bewoners')->with($notification);
    }

}
