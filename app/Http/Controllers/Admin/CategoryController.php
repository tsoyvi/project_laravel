<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(10);

        return view('admin.categories.index', [
            'categoriesList' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $created = Category::create($data);

        if ($created) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.created.success'));
        } else {
            return back()->with('error', __('messages.admin.categories.created.error'))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        $categoriesNews = $category->newsInCategory;

        return view('admin.categories.edit', [
            'category' => $category,
            'categoryNews' => $categoriesNews,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $updated = $category->fill($data)->save();
        if ($updated) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.updated.success'));
        } else {
            return back()->with('error', __('messages.admin.categories.updated.error'))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            return response()->json('error', 400);
        }
    }
}
