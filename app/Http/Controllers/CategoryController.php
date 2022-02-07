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
        // dd($categories);

        return view('news.categories',  ["categoryList" => $categories]);
    }


    public function show(Category $category)
    {
        //$category = Category::getCategoriesById($category);
        // dd($category);
        $categoriesNews = $category->newsInCategory;

        return view('news.show_category',  [
            'category' => $category,
            'categoriesNews' => $categoriesNews,
        ]);
    }
}
