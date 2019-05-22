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

    public function edit($id){
        $newsitem = Newsitem::where('id', $id)->first();
        return view('dashPages.newsEdit', compact('newsitem'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'Titel' => 'required|max:255',
            'Inhoud' => 'required|max:255',
            'afbeeldingUrl' => 'required|max:255',
        ]);

        $newsitem = new Newsitem();
        $newsitem->title = $request['Titel'];
        $newsitem->content = $request['Inhoud'];
        $newsitem->img_url = $request['afbeeldingUrl'];
        $newsitem->save();

        $notification = array(
            'message' => 'Nieuwsitem is toegevoegd',
            'alert-type' => 'success'
        );

        return redirect('/dashboard/nieuws')->with($notification);
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
