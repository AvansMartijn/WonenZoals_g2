<?php

namespace App\Http\Controllers;

use App\Newsitem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = Newsitem::orderBy('id', 'ASC')->get();
        return view('dashPages.newsOverview', compact('news'));
    }


}
