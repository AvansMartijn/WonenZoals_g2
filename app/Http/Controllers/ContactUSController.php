<?php
/**
 * Main controller for pages
 *
 * PHP version 7.3
 *
 * @category Controllers
 * @package  Wonenzoals
 * @author   Xandor Janssen <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */

namespace App\Http\Controllers;

use App\ContactUS;
use Validator;
use Illuminate\Http\Request;
use Mail;
use \App\ContactSubject;
use \App\Location;
use Illuminate\Support\Facades\Auth;

/**
 * PagesController Class Doc Comment
 *
 * @category Class
 * @package  PagesController
 * @author   Xandor Janssen <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class ContactUSController extends Controller
{

    
    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUSPost(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('#Contact')
                ->withErrors($validator)
                ->withInput();
        }


        ContactUS::create(
            $request->all()
        );

        Mail::send(
            'emailTemplate.email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_message' => $request->get('message'),
            ),
            function ($message) {
                $message->from('wonentestzoals123@gmail.com');
                $message->to(
                    'wonentestzoals123@gmail.com',
                    'Admin'
                )->subject(
                    'Contact formulier:'
                );
            }
        );

        return redirect("#Contact")->with(
            'success',
            'Uw contact formulier is succesvol verzonden!'
        );
    }

    public function storeSubject(Request $request){

        $validatedData = $request->validate([
            'subject' => 'required|max:255',
        ]);

        $subject = new \App\ContactSubject;
        $subject->subject = $request['subject'];
        $subject->save();

        $notification = array(
            'message' => 'Onderwerp is aangemaakt', 
            'alert-type' => 'success'
        );

        return redirect('/dashboard/contact')->with($notification);
    }

    public function index(){

        if($user = !Auth::user())
        {
            return redirect('/login');
        }

        $role = Auth::user()->role_id;

        if ($role !== 1) {
            return redirect('/login');
        }

        $subjects = ContactSubject::all();
        $location = Location::first();
        $data = ['contactSubjects' => $subjects, 'location' => $location] ;
        return View('dashPages.contactOverview', compact('data'));
    }

    public function createSubject(){
        return View('dashPages.contactSubjectCreate');
    }

    public function editSubject($id){
        $subject = \App\ContactSubject::where('id', $id)->first();
        return View('dashPages.contactSubjectEdit', compact('subject'));
    }

    public function updateSubject(Request $request){
        $subject = ContactSubject::where('id', $request['id'])->first();
        $subject->subject = $request['subject'];
        $subject->save();

        $notification = array(
            'message' => 'Onderwerp is aangepast', 
            'alert-type' => 'success'
        );

        return redirect('/dashboard/contact')->with($notification);

    }

    public function destroy($id){
        //
        if(\App\ContactSubject::count() > 1){

            $subject = \App\ContactSubject::where('id', $id)->first();
            $subject->delete();
            $notification = array(
                'message' => 'Onderwerp is verwijderd', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Er moet minimaal 1 onderwerp zijn', 
                'alert-type' => 'error');
        }



        return redirect('/dashboard/contact')->with($notification);
    }

    public function editLocation(){
        if($user = !Auth::user())
        {
            return redirect('/login');
        }

        $role = Auth::user()->role_id;

        if ($role !== 1) {
            return redirect('/login');
        }


        $location = Location::first();
        return View('dashPages.contactLocationEdit', compact('location'));
    }

    public function updateLocation(Request $request){
        $location = Location::first();
        $location->street = $request['street'];
        $location->number = $request['number'];
        $location->postal = $request['postal'];
        $location->city = $request['city'];
        $location->save();

        $notification = array(
            'message' => 'Locatie is gewijzigd', 
            'alert-type' => 'success');

        return redirect('/dashboard/contact')->with($notification);
    }
}
