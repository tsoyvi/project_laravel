<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categoryList = $this->getCategoryNews();
        return view('news.categories', [
            'categoryList' => $categoryList,
        ]);
    }


    public function show(int $id)
    {
        $category = $this->getCategoryNews($id);
        return view('news.show_category', [
            'category' => $category,
        ]);
    }
}
