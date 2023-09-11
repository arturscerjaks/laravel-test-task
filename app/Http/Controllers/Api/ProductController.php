<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use CanLoadRelationships;
    private $relations = ['attributes'];

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Product::class, 'product');
    }

    public function index()
    {
        
        $query = $this->loadRelationships(Product::query(), $this->relations);

        return ProductResource::collection(
            $query->get()
        );
    }



    public function store(Request $request)
    {
        $product = Product::create([
            ...$request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string'
            ])
        ]);

        return new ProductResource($this->loadRelationships($product, $this->relations));
    }

    public function show(Product $product)
    {

        return new ProductResource($this->loadRelationships($product, $this->relations));
    }

    public function update(Request $request, Product $product)
    {
        $product->update(
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string'
            ])
        );

        return new ProductResource($this->loadRelationships($product, $this->relations));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response(status: 204);
    }
}