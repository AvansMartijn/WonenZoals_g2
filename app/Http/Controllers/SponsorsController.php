<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Sponsor;
use Illuminate\Support\Facades\Auth;

class SponsorsController extends Controller
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

        $imagePath = null;
        if(isset($request->imageUrl) && $request->imageUrl != null){
            $imageName = uniqid() . '-' . $request->imageUrl->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName; 

            request()->imageUrl->move($path, $imageName);
        }

        $sponsor = new \App\Sponsor;
        $sponsor->name = $request['sponsorNaam'];
        $sponsor->hyperlink = $request['sponsorLink'];
        $sponsor->img_url = $imagePath;
        $sponsor->save();

        $notification = array(
            'message' => 'sponsor is toegevoegd',
            'alert-type' => 'success'
        );

        return redirect('/dashboard/sponsors')->with($notification);
    }

    public function update(Request $request){
        $sponsor = Sponsor::find($request->id);

        if($sponsor->img_url != null && $sponsor->img_url != ""){
            $request['imageUrl'] = 'filled';
            $imagePath = $sponsor->img_url;
        }else{
            $imagePath = null;
        }
        
        $this->validate(
            $request,
            [
                'naam' => 'required',
                'link' => 'required',
                'imageUrl' => 'required',
            ]
        );

        if($request->imageUrl != 'filled'){ 
            if(isset($request->imageUrl) && $request->imageUrl != null){
                $imageName = uniqid() . '-' . $request->imageUrl->getClientOriginalName();
                $path = public_path('img/uploads');
                $imagePath = url('/') . '/img/uploads/' . $imageName; 

                request()->imageUrl->move($path, $imageName);
            }
        }

        $sponsor->name = $request->input('naam');
        $sponsor->hyperlink = $request->input('link');
        $sponsor->img_url = $imagePath;

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
