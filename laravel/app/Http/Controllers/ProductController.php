<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Get /api/Products.
     */
    public function getProducts()
    {
        $products = Product::all();
        return response()->json([
            "message" => "Products retrieved successfully",
            "data" => $products
        ]);
        // return ["message" => "Getting list of Product"];
    }

    /**
     * Post /api/Products.
     */
    public function createProduct(Request $request)
    {
        // $product = Product::create([
        //     'name' => $request->input('name'),
        // ]);
        // $product = Product::create(['name' => 'Book']);

        // $product = DB::table('products')->insert(['name' => 'Book']);

        // return response()->json([
        //     "message" => "Product created successfully",
        //     "data" => $product
        // ], 201);
        return ["message" => "Creating 1 new product"];
    }

    /**
     * Get /api/Products/{ProductId}.
     */
    public function getProduct($productId)
    {
        return ["message" => "Getting 1 Product base on given ProductId"];
    }

    /**
     * Patch /api/Products/{ProductId}.
     */
    public function updateProduct($productId)
    {
        return ["messsage" => "Updating 1 Product base on given ProductId"];
    }

    /**
     * Delete /api/Products/{ProductId}.
     */
    public function deleteProduct($productId)
    {
        return ["message" => "Deleting 1 Product base on given ProductId"];
    }
}
