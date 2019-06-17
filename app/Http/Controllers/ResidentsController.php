<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidentsController extends Controller
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
        $residents = Resident::orderBy('id', 'ASC')->get();
        return view('dashPages.residentsView', compact('residents'));
    }

    public function create(){
        return view('dashPages.residentCreate');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'Naam' => 'required|max:255',
            'Beschrijving' => 'required',
            'image' => 'required',
        ]);

        $imagePath = null;
        if(isset($request->image) && $request->image != null){
            $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName; 

            request()->image->move($path, $imageName);
        }

        $resident = new Resident;
        $resident->name = $request['Naam'];
        $resident->description = $request['Beschrijving'];
        $resident->img_url = $imagePath;
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
        $resident = Resident::find($request->id);

        if($resident->img_url != null && $resident->img_url != ""){
            $request['image'] = 'filled';
            $imagePath = $resident->img_url;
        }else{
            $imagePath = null;
        }

        $this->validate(
            $request,
            [
                'Naam' => 'required|max:255',
                'Beschrijving' => 'required',
                'image' => 'required',
            ]
        );

        if($request->image != 'filled'){ 
            if(isset($request->image) && $request->image != null){
                $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
                $path = public_path('img/uploads');
                $imagePath = url('/') . '/img/uploads/' . $imageName; 

                request()->image->move($path, $imageName);
            }
        }

        $resident->name = $request->input('Naam');
        $resident->description = $request->input('Beschrijving');
        $resident->img_url = $imagePath;

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
