<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Section;
use \App\DefaultSection;
use \App\SectionType;

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
        if($section->type_id == 1 || $section->type()->first()->type == 'leaf'){
            return redirect('dashboard/sections')->with('error', 'Deze sectie mag niet verplaatst worden');
        }
        $sectionOrder = $section->order;
        $switchSection = Section::where('order', $sectionOrder-1)->first();
        if($switchSection->type_id == 1 || $switchSection->type()->first()->type == 'leaf'){
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
        if($section->type_id == 1 || $section->type()->first()->type == 'leaf'){
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

    public function factorysettings(){
        $factorySections = DefaultSection::all();
        Section::truncate();

        foreach($factorySections as $section){
            $sectionArr = $section->toArray();
            Section::create($sectionArr);
        }
        return redirect('dashboard/sections')->with('success', 'Secties zijn terug gezet naar fabrieks instellingen');
    }

    public function destroy(){
        //
    }


    //sections funcitons below
    public function editLeaf(){
        $leaf = Section::where('type_id', 1)->first();
        return View('dashPages.leafEdit', compact('leaf'));
    }

    public function updateLeaf(Request $request){
        $leaf = Section::where('type_id', 1)->first();
        $leaf->content = $request['content'];
        $leaf->save();
        return redirect('dashboard/sections')->with('success', 'Sectie is aangepast');
    }

    public function editSeperator($id){
        $section = Section::where('id', $id)->first();
        return View('dashPages.seperatorEdit', compact('section'));
    }

    public function updateSeperator(Request $request){
        $section = Section::where('id', $request['id'])->first();
        $section->name = $request['name'];
        $section->content = $request['content'];
        $section->save();
        return redirect('dashboard/sections')->with('success', 'Sectie is aangepast');
    }

    public function createSeperator(){
        return View('dashPages.seperatorCreate');
    }

    public function storeSeperator(Request $request){
        $section = new Section();
        $section->order = Section::max('order') + 1;
        $section->name = $request['name'];
        $section->content = $request['content'];
        $section->default_section = 0;
        $section->type_id = 2;

        $section->save();
        return redirect('dashboard/sections')->with('success', 'Sectie is opgeslagen');
    }

    //textsection
    public function editTextSection($id){
        $section = Section::where('id', $id)->first();
        return View('dashPages.textsectionEdit', compact('section'));
    }

    public function updateTextSection(Request $request){

        $imagePath = null;
        if(isset($request->image) && $request->image != null){
            $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName; 

            request()->image->move($path, $imageName);
        }

        $section = Section::where('id', $request['id'])->first();
        $section->name = $request['name'];
        $section->content = $request['content'];
        $section->img_url = $imagePath;
        $section->save();
        return redirect('dashboard/sections')->with('success', 'Sectie is aangepast');
    }

    public function createTextSection(){
        return View('dashPages.textsectionCreate');
    }

    public function storeTextSection(Request $request){

        $imagePath = null;
        if(isset($request->image) && $request->image != null){
            $imageName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = public_path('img/uploads');
            $imagePath = url('/') . '/img/uploads/' . $imageName; 

            request()->image->move($path, $imageName);
        }
        // var_dump($imagePath);
        // die;
        $section = new Section();
        $section->order = Section::max('order') + 1;
        $section->name = $request['name'];
        $section->content = $request['content'];
        $section->img_url = $imagePath;
        $section->default_section = 0;
        $section->type_id = 3;

        $section->save();
        return redirect('dashboard/sections')->with('success', 'Sectie is opgeslagen');
    }

    public function storeSection(Request $request){
        //
        $section = new Section();
        $section->order = Section::max('order') + 1;
        $section->name = $request['name'];
        $section->default_section = 0;
        $section->type_id = $request['type'];

        $section->save();

        return redirect('dashboard/sections')->with('success', 'Sectie is opgeslagen');

    }

}
