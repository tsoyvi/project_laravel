<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::select(Category::$availableFields)->get();
        return view('news.categories',  ["categoryList" => $categories]);
    }


    public function show(Category $category)
    {
        // $category = Category::getCategoriesById($id);
        dd ($category);
        return view('news.show_category',  [
            'category' => $category,
            /* 'categoryId' => $categoryId,*/
        ]);
    }
}
