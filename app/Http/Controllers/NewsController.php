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
