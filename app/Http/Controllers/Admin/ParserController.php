<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Jobs\AddDBNewsParsingJob;
use App\Models\News;
use App\Models\Resource;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $urls = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
        ];



        foreach ($urls as $url) {
            dispatch(new NewsParsingJob($url));
        }

        echo "Парсинг завершен";
    }

    public function load(Request $request, Parser $service)
    {

        $resources = Resource::select('name', 'url')->get();
        $url = $request->query('resourceUrl');

        if (!is_null($url)) {
             // dd($url);
            $news = $service->setLink($url)
                ->parseResource();
        } else {
            $news = [];
        }


        return view('admin.parser.index', [
            'newsList' => $news,
            'resources' => $resources,
        ]);
    }

   public function loadAll(Request $request, Parser $service)
    { 

        $resources = Resource::select('name', 'url')->get();

        foreach ($resources as $resource) {
            
            dispatch(new AddDBNewsParsingJob ($resource->url));
                       
        }
        
         return  redirect()->route('admin.news.index');
    }

    
}
