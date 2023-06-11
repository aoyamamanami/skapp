<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $user = auth()->user();
        $categories = Category::get();
        return view('categories.index')->with(['posts' => $category->getByCategory(), 'categories' => $categories]);
    }
}
