<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ItemCollection;
use App\Models\Category;

class HomeController extends Controller
{

    public function index()
    {

        $items = Items::with('category')->latest()->take(6)->get();

// return dd();

        // return response()->json( new ItemCollection($items));
        return inertia('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'appName' => config('app.name'),
            'items' => new ItemCollection($items),
            'categories' => new CategoryCollection(Category::latest()->get()),
        ]);

    }
}
