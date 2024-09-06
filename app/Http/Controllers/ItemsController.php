<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Items;
use Illuminate\Http\Request;

/**
 * @group Artworks and Creations Management
 *
 * API endpoints for managing artworks and creations (items).
 */
class ItemsController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created item in storage.
     *
     * @bodyParam name string required The name of the item. Example: "Sunset Painting"
     * @bodyParam description string required A brief description of the item. Example: "A beautiful sunset landscape."
     * @bodyParam price numeric required The price of the item. Example: 199.99
     * @bodyParam category_id integer required The ID of the category the item belongs to. Example: 1
     *
     * @param Request $request The request object containing the item data.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Create a new item with the validated data
        Items::create($request->all());
    }

    /**
     * Display the specified item.
     *
     * @urlParam id integer required The ID of the item to be displayed. Example: 1
     *
     * @param Items $id The item to be displayed.
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
     * Show the form for editing the specified item.
     *
     * @urlParam id integer required The ID of the item to be edited. Example: 1
     *
     * @bodyParam Items $items The item to be edited.
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified item in storage.
     *
     * @bodyParam name string required The updated name of the item. Example: "Sunset Painting"
     * @bodyParam description string required The updated description of the item. Example: "A beautiful sunset landscape."
     * @bodyParam price numeric required The updated price of the item. Example: 199.99
     * @bodyParam category_id integer required The updated ID of the category the item belongs to. Example: 1
     *
     * @bodyParam Request $request The request object containing the updated data.
     * @bodyParam Items $items The item to be updated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Items $items)
    {
        // Validate the request with the defined rules
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Update the item with the validated data
        $items->update($request->all());
    }

    /**
     * Remove the specified item from storage.
     *
     * @urlParam id integer required The ID of the item to be deleted. Example: 1
     *
     * @param Items $items The item to be deleted.
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
