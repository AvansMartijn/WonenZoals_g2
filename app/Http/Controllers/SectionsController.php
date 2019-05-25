<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Section;
use \App\DefaultSection;
use \App\SectionType;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        //fixed register login
        $this->middleware(
            function ($request, $next) {
                $role = Auth::user()->role_id;

                if ($role !== 1) {
                    return redirect('/dashboard');
                }

                return $next($request);
            }
        );
    }

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
        $factorySections = DefaultSection::where('default_section', 1)->get();
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

    public function deleteSection($id){
        $section = Section::where('id', $id)->first();
        if($section->type_id != 1){
            $section->delete();
            return redirect('dashboard/sections')->with('success', 'Sectie is verwijderd');
        }
        return redirect('dashboard/sections')->with('error', 'Sectie is niet verwijderd');
        
    }

    public function saveProfile(){
        $sections = Section::all();

        foreach($sections as $section){
            $profile = new DefaultSection();

            $profile->order = $section->order;
            $profile->name = $section->name;
            $profile->content = $section->content;
            $profile->type_id = $section->type_id;
            $profile->default_section = 0;

            $profile->save();
        }
        return redirect('dashboard/sections')->with('success', 'Profiel is opgeslagen.');

    }



    public function loadProfile(){
        $factorySections = DefaultSection::where('default_section', 0)->get();
        // var_dump($factorySections);
        // die;
        Section::truncate();

        foreach($factorySections as $section){
            $sectionArr = $section->toArray();
            Section::create($sectionArr);
        }
        return redirect('dashboard/sections')->with('success', 'Profiel is teruggezet.');
    }

}
