<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resources\CreateRequest;
use App\Http\Requests\Resources\UpdateRequest;
use App\Models\Resource;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Codec\ResourceedTimeCodec;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::paginate(10);

        return view('admin.resource.index', [
            'resources' => $resources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resource = Resource::all();
        return view('admin.resource.create', [
            'resource' => $resource,
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
        $data = $request->validated();
        $created = Resource::create($data);

        if ($created) {
            return redirect()->route('admin.resource.index')
                ->with('success', __('messages.resources.created.success'));
        } else {
            return back()->with('error', __('messages.resources.created.error'))->withInput();
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
    public function edit(Resource $resource)
    {
        return view('admin.resource.edit', [
            'resource' => $resource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Resource $resource)
    {
        $data = $request->validated();

        $updated = $resource->fill($data)->save();

        if ($updated) {
            return redirect()->route('admin.resource.index')
                ->with('success', __('messages.resources.updated.success'));
        } else {
            return back()->with('error', __('messages.resources.updated.error'))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        try {
            $resource->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            return response()->json('error', 400);
        }
    }
}
