<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ItemCollection;
use App\Models\Category;

/**
 * @group Home
 * @package App\Http\Controllers
 */

class HomeController extends Controller
{

    /**
     * Display the home page of the website.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        // Get the latest 6 items and their categories
        $items = Items::with('category')->latest()->take(6)->get();

        // Return the items as a JSON response
        // return response()->json( new ItemCollection($items));

        // Return the items as a Inertia response
        return inertia('Home', [
            // Whether the user is logged in
            'canLogin' => Route::has('login'),

            // Whether the user can register
            'canRegister' => Route::has('register'),

            // The name of the application
            'appName' => config('app.name'),

            // The latest items
            'items' => new ItemCollection($items),

            // The latest categories
            'categories' => new CategoryCollection(Category::latest()->get()),
        ]);
    }
}
