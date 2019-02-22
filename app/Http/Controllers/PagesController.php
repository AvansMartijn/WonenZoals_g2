<?php
/**
 * @file
 * Description of what this module (or file) is doing.
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
