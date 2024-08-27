<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Resources\ItemCollection;

/**  @group Gallery
 * @package App\Http\Controllers
*/

class GalleryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the latest items with their categories
        // and paginate the results to 20 items per page
        $items = Items::with('category')->latest()->paginate(20);

        // Return an Inertia response with the items collection
        return inertia('Gallery', [
            'items' => new ItemCollection($items),
        ]);
    }
}
