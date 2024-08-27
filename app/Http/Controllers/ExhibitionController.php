<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Exhibition
 * @package App\Http\Controllers
*/

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        // This method renders the Exhibition page
        // It uses the Inertia library to render the page
        // @see https://inertiajs.com/
        return inertia('Exhibition');
    }
}
