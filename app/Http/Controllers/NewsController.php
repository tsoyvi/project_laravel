<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show(int $id, int $idNews)
    {
        $newsList = $this->getNews($idNews);

        return view('news.show_news', [
            'news' => $newsList,
            'idCategory' => $id,
        ]);
    }
}
