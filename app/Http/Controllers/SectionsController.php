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
        $sections = Section::orderBy('order', 'ASC')->get();
        $sections->maxOrder = Section::max('order');
        return View('dashPages.sectionsOverview', compact('sections'));
    }

    public function moveup($id){
        $section = Section::where('id', $id)->first();
        if($id == 1 || $section->type()->first()->type == 'leaf'){
            return redirect('dashboard/sections')->with('error', 'Deze sectie mag niet verplaatst worden');
        }
        $sectionOrder = $section->order;
        $switchSection = Section::where('order', $sectionOrder-1)->first();
        if($switchSection->id == 1 || $switchSection->type()->first()->type == 'leaf'){
            return redirect('dashboard/sections')->with('error', 'Deze sectie mag niet omhoog verplaatst worden');
        }
        $section->order = $section->order-1;
        $section->save();

        $switchSection->order = $switchSection->order+1;
        $switchSection->save();
        return redirect('dashboard/sections')->with('success', 'Sectie is verplaatst');
    }

    public function movedown($id){
        $section = Section::where('id', $id)->first();
        if($id == 1 || $section->type()->first()->type == 'leaf'){
            return redirect('dashboard/sections')->with('error', 'Deze sectie mag niet verplaatst worden');
        }
        $sectionOrder = $section->order;
        $switchSection = Section::where('order', $sectionOrder+1)->first();
        
        $section->order = $section->order+1;
        $section->save();

        $switchSection->order = $switchSection->order-1;
        $switchSection->save();
        return redirect('dashboard/sections')->with('success', 'Sectie is verplaatst');
    }

    public function destroy(){
        //
    }
}
