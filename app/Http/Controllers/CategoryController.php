<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categoryList = Category::all();
        return view('news.categories',  ["categoryList" => $categoryList]);

        /*$categoryList = $this->getCategoryNews();
        return view('news.categories', [
            'categoryList' => $categoryList,
        ]);*/
    }


    public function show(int $id)
    {
        $category = Category::getCategoriesById($id);

        return view('news.show_category',  [
            'category' => $category,
            'categoryId' => $id,
        ]);


        /*
        $category = $this->getCategoryNews($id);
        return view('news.show_category', [
            'category' => $category,
        ]);*/
    }
}
