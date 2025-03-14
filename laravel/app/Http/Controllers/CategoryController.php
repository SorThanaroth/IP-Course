<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // GET /api/categories
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    // POST /api/categories
    public function createCategory(Request $request)
    {
        $category = Category::create($request->only('name'))->save();
        return response()->json($category, 201);
    }

    // GET /api/categories/{categoryId}
    public function getCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return response()->json($category);
    }

    // PATCH /api/categories/{categoryId}
    public function updateCategory(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->name = $request->name;
        $category->save();
        return $category;
    }

    // DELETE /api/categories/{categoryId}
    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();
        return response()->json(['message' => "Category deleted successfully"], 204);
    }
}