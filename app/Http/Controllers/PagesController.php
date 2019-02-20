<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    //example
    //opening an webpage
    public function index()
    {
        return view('pages.index');
    }

    

    public function cmsHome()
    {
        return view('dashPages.cmsHome');
    }
}
