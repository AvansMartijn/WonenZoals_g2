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
}
