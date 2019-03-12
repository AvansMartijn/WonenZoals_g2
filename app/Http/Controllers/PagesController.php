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
        return view('pages.index');
    }

    /**
     * Opening the CMS home page
     *
     * @return dashPages.cmsHome
     */
    public function cmsHome()
    {
        return view('dashPages.cmsHome');
    }
}
