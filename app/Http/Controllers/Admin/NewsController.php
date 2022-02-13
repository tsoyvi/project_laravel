<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\Category;
use App\Models\News;
use Exception;
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
    public function create(Request $request)
    {

        $addNews = $request->query('AddNews');
 
        $categories = Category::all();

        return view('admin.news.create', [
            'categories' => $categories,
            'addNews' => $addNews,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated() + [
            'slug' => Str::slug($request->input('title'))
        ];

        $created = News::create($data);

        if ($created) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.created.success'));
        } else {
            return back()->with('error', __('messages.admin.news.created.error'))->withInput();
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
     * @param  News\UpdateReques  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, News $news)
    {

        $data = $request->validated() + [
            'slug' => Str::slug($request->input('title'))
        ];

        $updated = $news->fill($data)->save();

        if ($updated) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.updated.success'));
        } else {
            return back()->with('error', __('messages.admin.news.updated.error'))->withInput();
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
        try {
            $news->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            return response()->json('error', 400);
        }
    }
}
