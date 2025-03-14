<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // GET /api/products
    public function getProducts()
    {
        $products = product::all();
        return response()->json(['products' => $products]);
    }

    // POST /api/products
    public function createProduct(Request $request)
    {
        $product = Product::create($request->only('name', 'category_id', 'pricing', 'description', 'image'));
        return response()->json($product, 201);
    }

    // GET /api/products/{productId}
    public function getProduct($productId)
    {
        $product = Product::findOrFail($productId);
        return response()->json($product);
    }

    // PATCH /api/products/{productId}
    public function updateProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->update($request->only('name', 'category_id', 'pricing', 'description', 'image'));
        return response()->json($product);
    }

    // DELETE /api/products/{productId}
    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();
        return response()->json(['message' => "Product deleted successfully"], 204);
    }
}
