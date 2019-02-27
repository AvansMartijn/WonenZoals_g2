<?php

namespace App\Http\Controllers;

use App\ContactUS;
use Illuminate\Http\Request;
use Mail;

class ContactUSController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUS()
    {
        return view('pages.contactUS');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUSPost(Request $request)
    {

        $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required']);

        ContactUS::create($request->all());

        Mail::send('emailTemplate.email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message'),
            ), function ($message) {
                $message->from('wonentestzoals123@gmail.com');
                $message->to('wonentestzoals123@gmail.com', 'Admin')->subject('Contact form');
            });

        return back()->with('success', 'Thanks for contacting us!');
    }
}
