<?php
/**
 * Main controller for newsletter archive
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

use App\authorization;
use App\Newsletter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *  NewsletterArchiveController Class Doc Comment
 *
 * @category Class
 * @package  NewsletterArchiveController
 * @author   Xandor Janssen <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class NewsletterArchiveController extends Controller
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

                $userAuth = $userAuth->authorizations;

                $toegang = false;

                foreach ($userAuth as $userAuthh) {
                    if ($userAuthh->authorization == "Nieuwsbriefarchief") {
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

        $newsletters = Newsletter::all();

        return view('dashPages.dashNieuwsbriefArchief')->with('newsletters', $newsletters);
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
                'Link' => 'required',
            ]
        );

        $link = $request->input('Link');

        $https = substr($link, 0, 8);
        $http = substr($link, 0, 7);

        if ($http !== "http://") {
            if ($https !== "https://") {
                $link = "https://" . $link;
            }
        }

        $newsletter = new Newsletter();
        $newsletter->title = $request->input('Titel');
        $newsletter->link = $link;
        $newsletter->save();

        return redirect()->back()->with('success', 'Nieuwsbrief is toegevoegd aan het archief');
    }

    /**
     * Show the application dashboard.
     *
     * @param id $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::where('id', $id)->first();

        $newsletter->delete();

        return redirect()->back()->with('success', 'De nieuwsbrief is verwijderd uit het archief');
    }
}
