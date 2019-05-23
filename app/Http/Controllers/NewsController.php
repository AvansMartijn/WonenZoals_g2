<?php

namespace App\Http\Controllers;

use App\Newsitem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $newsItems = Newsitem::orderBy('id', 'ASC')->get();
        return view('dashPages.newsOverview', compact('newsItems'));
    }

    public function create(){
        return view('dashPages.newsCreate');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'Titel' => 'required|max:255',
            'Inhoud' => 'required|max:255',
            'image' => 'required',
            'Summary' => 'required'
        ]);

        $imagePath = null;
        if(isset($request->image) && $request->image != null){
            $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName; 

            request()->image->move($path, $imageName);
        }

        $newsitem = new Newsitem;
        $newsitem->title = $request['Titel'];
        $newsitem->content = $request['Inhoud'];
        $newsitem->summary = $request->input('Summary');
        $newsitem->img_url = $imagePath;
        $newsitem->save();

        $notification = array(
            'message' => 'Nieuwsitem is toegevoegd',
            'alert-type' => 'success'
        );

        return redirect('/dashboard/nieuws')->with($notification);
    }

    public function edit($id){
        $newsitem = Newsitem::where('id', $id)->first();
        return view('dashPages.newsEdit', compact('newsitem'));
    }

    public function update(Request $request){
        $this->validate(
            $request,
            [
                'Titel' => 'required',
                'Inhoud' => 'required',
                'image' => 'required',
                'Summary' => 'required'
            ]
        );

        $imagePath = null;
        if(isset($request->image) && $request->image != null){
            $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName; 

            request()->image->move($path, $imageName);
        }

        $newsitem = Newsitem::find($request->id);
        $newsitem->title = $request->input('Titel');
        $newsitem->content = $request->input('Inhoud');
        $newsitem->summary = $request->input('Summary');
        $newsitem->img_url = $imagePath;

        $newsitem->save();

        return redirect('/dashboard/nieuws')->with('success', 'Nieuwsitem is geupdatet');
    }

    public function destroy($id){
        $newsItem = \App\Newsitem::where('id', $id)->first();
        $newsItem->delete();

        $notification = array(
            'message' => 'Nieuwsitem is verwijderd',
            'alert-type' => 'success'
        );

        return redirect('dashboard/nieuws')->with($notification);
    }
}
