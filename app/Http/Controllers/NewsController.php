<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show(int $id, int $idNews)
    {

        $news = News::getNewsById($idNews);

        //dd($news);
        return view('news.show_news',  [
            'news' => $news,
            'categoryId' => $id,
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
