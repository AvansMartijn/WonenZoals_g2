<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meals = Meal::all();
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
        ]);

        $meal = new \App\Meal;
        $meal->name = $request['mealname'];
        $meal->description = $request['description'];
        $meal->type = $request['gerechttype'];
        $meal->save();

        return redirect()->back()->with('success', 'gerecht is aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return redirect()->back()->with('success', 'gerecht is verwijderd');
        //
    }
}
