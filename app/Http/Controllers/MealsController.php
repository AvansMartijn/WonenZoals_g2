<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealsController extends Controller
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

                $userAuth = Auth::user();


                $userAuth = $userAuth->authorizations()->get();


                $toegang = false;

                foreach ($userAuth as $userAuthh) {

                    if ($userAuthh->id == 3) {

                        $toegang = true;
                    }
                }

                if (!$toegang) {
                    return redirect('/dashboard');
                }

                return $next($request);
            }
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meals = Meal::orderBy('type', 'DESC')->get();
        return View('dashPages.mealsOverview', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('dashPages.mealCreate');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'mealname' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'image|max:8192'
        ]);

        $imagePath = null;
        if(isset($request->image) && $request->image != null){
            $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName; 

            request()->image->move($path, $imageName);
        }

        $meal = new \App\Meal;
        $meal->name = $request['mealname'];
        $meal->description = $request['description'];
        $meal->type = $request['gerechttype'];
        $meal->img_url = $imagePath;
        $meal->save();

        $notification = array(
            'message' => 'gerecht is aangemaakt', 
            'alert-type' => 'success'
        );

        return redirect('/dashboard/maaltijden')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::where('id', $id)->first();
        return View('dashPages.mealDetail', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = \App\Meal::where('id', $id)->first();
        $meal->delete();

        $notification = array(
            'message' => 'gerecht is verwijderd', 
            'alert-type' => 'success'
        );

        return redirect('/dashboard/maaltijden')->with($notification);
    }
}
