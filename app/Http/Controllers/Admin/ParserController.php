<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $service)
    {




        $orders = Order::select('url', 'category')->get();

        $url = $request->query('orderUrl');


        if (!is_null($url)) {
            // dd($url);
            $news = $service->setLink($url)
                ->parse();
        } else {
            $news = [];
        }

        /*  $urls = [
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/music.rss'
        ];*/



        return view('admin.parser.index', [
            'newsList' => $news,
            'orders' => $orders,
        ]);
    }
}
