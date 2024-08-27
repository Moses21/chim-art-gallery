<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $wishlist = auth()->user()->wishlist;
        // return $wishlist;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Check if the item is already in the wishlist
        $has_item =  Wishlist::query()
                    ->where('user_id', auth()->user()->id)
                    ->where('item_id', $request->item_id)
                    ->count();

        // Return a 409 Conflict response if the item is already in the wishlist
        if($has_item > 0){
            return response()->json(['message' => 'Item already in your wishlist'], 409);
        }

        // Create a new wishlist item
        $wishlist = Wishlist::create([
            'user_id' => auth()->user()->id,
            'item_id' => $request->item_id
        ]);

        // Return a 201 Created response with the new wishlist item
        return response()->json($wishlist, 201);
    }

    /**
     * Display the specified resource.
     */

    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        $wishlist->update();

        return response()->json($wishlist, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return response(null, 204);
    }
}
