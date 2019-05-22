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

use App\Http\Controllers\Controller;
use \App\Section;
use \App\ContactSubject;
use \App\Location;

/**
 * PagesController Class Doc Comment
 *
 * @category Class
 * @package  PagesController
 * @author   Xandor Janssen <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class PagesController extends Controller
{
  
    /**
     * Open the index web page
     *
     * @return pages.index
     */
    public function index()
    {
        $leaf = Section::where('type_id', 1)->first();
        $sections = Section::orderBy('order', 'asc')->get();
        $contactSubjects = ContactSubject::all();
        $location = Location::first();
        $data = ['sections' => $sections, 'leaf' => $leaf, 'contactSubjects' => $contactSubjects, 'location' => $location];
        return view('pages.index', compact('data'));
    }
}
