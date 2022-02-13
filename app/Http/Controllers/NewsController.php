<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show(Category $category, News $news)
    {

        // $news = News::getNewsById($idNews);
        //$news = News::query()->select(News::$availableFields)->get();
        // $categoryNews = $news->category;

        // dd($categoryNews);
        return view('news.show_news',  [
            'news' => $news,
            'category' => $category,
        ]);


        /*
        $newsList = $this->getNews($idNews);
        return view('news.show_news', [
            'news' => $newsList,
            'idCategory' => $id,
        ]);
        */
    }
}
