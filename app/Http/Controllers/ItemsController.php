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
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);


        Items::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $id)

    {

        $item = new ItemResource($id);
        $pub_key = env("CHANGU_PUB_KEY");
        $return_url = env("APP_URL");

        // return dd($pub_key);
        return inertia('Items/show/Items' , ["id" => $item , "pub_key" => $pub_key,"return_url"=> $return_url] );

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
     */
    public function update(Request $request, Items $items)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $items->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $items)
    {
        $items->delete();

        return response()->json(['message' => 'Item deleted successfully'], 204);
    }




}
