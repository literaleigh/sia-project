<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
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
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Validate the request data
        $validated = $request->validated();

        // Create a new product
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        // Return a JSON response with the created product
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Return a JSON response with the specified product
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Product $product)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Validate the request data
        $validated = $request->validated();

        // Update the product with the validated data
        $product->update($validated);

        // Return a JSON response with the updated product
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the product
        $product->delete();

        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Product deleted successfully'
        ], 200);
    }
}
