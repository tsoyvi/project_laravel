<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(10);
        return view('admin.news.index', [
            'newsList' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->only(['title', 'author', 'status', 'description']) + [
            'slug' => Str::slug($request->input('title'))
        ];

        $created = News::create($data);

        if ($created) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        } else {
            return back()->with('error', 'Не удалось добавить запись')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categoryNews = $news->category;

        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categoryNews' => $categoryNews,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {

        $data = $request->only(['title', 'author', 'status', 'description']) + [
            'slug' => Str::slug($request->input('title'))
        ];

        $updated = $news->fill($data)->save();

        if ($updated) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        } else {
            return back()->with('error', 'Не удалось обновить запись')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
