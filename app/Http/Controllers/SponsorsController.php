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
