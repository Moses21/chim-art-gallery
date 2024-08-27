<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Create a new item with the validated data
        Items::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Items $id The item to be displayed
     * @return \Inertia\Response
     */
    public function show(Items $id)
    {
        // Get the item to be displayed
        $item = new ItemResource($id);

        // Get the public key from the environment file
        $pub_key = env("CHANGU_PUB_KEY");

        // Get the return URL from the environment file
        $return_url = env("APP_URL");

        // Return the Inertia page with the item and payment information
        return inertia('Items/show/Items', ["id" => $item, "pub_key" => $pub_key, "return_url" => $return_url]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * Validate the request with the defined rules and update the item
     * with the validated data.
     *
     * @param Request $request The request with the updated data
     * @param Items $items The item to be updated
     * @return void
     */
    public function update(Request $request, Items $items)
    {
        // Validate the request with the defined rules
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Update the item with the validated data
        $items->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Items $items The item to be deleted
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Items $items)
    {
        // Delete the item
        $items->delete();

        // Return a successful response message
        return response()->json(['message' => 'Item deleted successfully'], 204);
    }




}
