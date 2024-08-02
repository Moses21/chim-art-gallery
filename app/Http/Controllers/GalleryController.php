<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Resources\ItemCollection;

class GalleryController extends Controller
{

public function index(){

    $items =    $items = Items::with('category')->latest()->paginate(20);

    return inertia('Gallery',[
        "items" => new ItemCollection($items),
    ]);
}
}
