<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Section;

class SectionsController extends Controller
{
    //

    public function index()
    {
        //
        $sections = Section::all();
        return View('dashPages.sectionsOverview', compact('sections'));
    }

    public function destroy(){
        //
    }
}
