<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Forms\Feedbacks\CreateRequest;
use App\Http\Requests\Forms\Feedbacks\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::paginate(10);

        return view('admin.feedback.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.create', [
            'feedbacks' => $feedbacks,
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
        $created = Feedback::create($data);


        if ($created) {
            return redirect()->route('admin.feedback.index')
                ->with('success', __('messages.feedbacks.created.success'));
        } else {
            return back()->with('error', __('messages.feedbacks.created.error'))->withInput();
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
    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', [
            'feedback' => $feedback,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Feedback $feedback)
    {
        $data = $request->validated();
        $updated = $feedback->fill($data)->save();
        if ($updated) {
            return redirect()->route('admin.feedback.index')
                ->with('success', __('messages.feedbacks.updated.success'));
        } else {
            return back()->with('error', __('messages.feedbacks.updated.error'))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        try {
            $feedback->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            return response()->json('error', 400);
        }
    }
}
