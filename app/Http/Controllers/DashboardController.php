<?php
/**
 * Main controller for Dashboard
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

/**
 * DashboardController Class Doc Comment
 *
 * @category Class
 * @package  DashboardController
 * @author   Xandor Janssen <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role_id == 1) { //beheerder
            return view('dashPages.dashBeheerder');
        } elseif (auth()->user()->role_id == 4) { //bewoner
            return view('dashPages.dashBewoner');
        } elseif (auth()->user()->role_id == 2) { //vrijwilliger
            return view('dashPages.dashVrijwilliger');
        } elseif (auth()->user()->role_id == 3) { //ouder
            return view('dashPages.dashOuder');
        } else {
            return view('login');
        }
    }
}
