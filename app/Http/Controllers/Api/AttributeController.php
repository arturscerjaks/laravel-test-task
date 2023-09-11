<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttributeResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Attribute::class, 'attribute');
    }
    public function index(Product $product)
    {
        $attributes = $product->attributes()->latest()->get();

        return AttributeResource::collection(
            $attributes
        );
    }

    public function store(Request $request, Product $product)
    {
        $attribute = $product->attributes()->create([
            ...$request->validate([
                'key' => 'required|string',
                'value' => 'required|string'
            ])
        ]);

        return new AttributeResource($attribute);
    }

    public function show(Product $product, Attribute $attribute)
    {
        return new AttributeResource($attribute);
    }

    public function destroy(Product $product, Attribute $attribute)
    {
        $attribute->delete();

        return response(status: 204);
    }
}