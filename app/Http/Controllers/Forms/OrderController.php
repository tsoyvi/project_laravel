<?php

namespace App\Http\Controllers\Forms;

use App\Http\Requests\Forms\Orders\CreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('forms.order.index');
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
        $created = Order::create($data);

        if ($created) {
            return redirect()->route('forms.order.index')
                ->with('success', __('messages.orders.created.success'));
        } else {
            return back()->with('error', __('messages.orders.created.error'))->withInput();
        }

    }
}
