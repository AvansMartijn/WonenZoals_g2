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
        if (auth()->user()->role == 'Beheerder') {
            return view('dashPages.dashBeheerder');
        } else if (auth()->user()->role == 'Bewoner') {
            return view('dashPages.dashBewoner');
        } else if (auth()->user()->role == 'Vrijwilliger') {
            return view('dashPages.dashVrijwilliger');
        } else if (auth()->user()->role == 'Ouder') {
            return view('dashPages.dashOuder');
        } else {
            return view('login');
        }

    }
}
