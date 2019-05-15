<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Topic;

class ForumController extends Controller
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

                $userAuth = Auth::user();

                $userAuth = $userAuth->authorizations()->get();

                $toegang = false;

                foreach ($userAuth as $userAuthh) {
                    if ($userAuthh->id == 4) {
                        $toegang = true;
                    }
                }

                if (!$toegang) {
                    return redirect('/dashboard');
                }

                return $next($request);
            }
        );
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {

        $topics = Topic::all();

        return view('dashPages.dashForum')->with("topics", $topics);
    }

    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'Titel' => 'required',
                'Vraag' => 'required',
            ]
        );

        
        $topic = new Topic();
        $topic->title = $request->input('Titel');
        $topic->message = $request->input('Vraag');
        $topic->user_id = Auth::user()->id;
        $topic->save();

        $notification = array(
            'message' => 'Topic is toegevoegd', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the application dashboard.
     *
     * @param id $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function showTopic($id)
    {

        $topic = Topic::where('id', $id)->first();
        
        return view('dashPages.dashTopic')->with(compact('topic'));
    }
}
