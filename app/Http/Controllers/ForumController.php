<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Topic;
use App\ForumPost;

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

        return view('dashPages.dashForum')->with(compact('topics'));
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
    public function deleteTopic($id)
    {
        $topic = Topic::where('id', $id)->first();

        $topic->delete();

        $notification = array(
            'message' => 'Topic is verwijderd van het forum',
            'alert-type' => 'success'
        );


        return redirect('/dashboard/forum')->with($notification);
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
        $reactions = ForumPost::where('topic_id', $id)->get();
        
        return view('dashPages.dashTopic')->with(compact('topic','reactions'));
    }

     /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function storeReaction(Request $request)
    {
        $this->validate(
            $request,
            [
                'Reactie' => 'required',
                'id' => 'required'
            ]
        );

        
        $reaction = new ForumPost();
        $reaction->topic_id = $request->input('id');
        $reaction->user_id = Auth::user()->id;
        $reaction->message = $request->input('Reactie');
        $reaction->save();


        $notification = array(
            'message' => 'Reactie is toegevoegd', 
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
    public function deleteReaction($id)
    {
        $reaction = ForumPost::where('id', $id)->first();

        $reaction->delete();

        $notification = array(
            'message' => 'je reactie is verwijderd van het topic', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
