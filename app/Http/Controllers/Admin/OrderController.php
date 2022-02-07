<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Forms\Orders\CreateRequest;
use App\Http\Requests\Forms\Orders\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class Ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);

        return view('admin.order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Order::all();
        return view('admin.order.create', [
            'order' => $order,
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
        $created = Order::create($data);

        if ($created) {
            return redirect()->route('admin.order.index')
                ->with('success', __('messages.orders.created.success'));
        } else {
            return back()->with('error', __('messages.orders.created.error'))->withInput();
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
    public function edit(Order $order)
    {
        return view('admin.order.edit', [
            'order' => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Order $order)
    {
        $data = $request->validated();

        $updated = $order->fill($data)->save();

        if ($updated) {
            return redirect()->route('admin.order.index')
                ->with('success', __('messages.orders.updated.success'));
        } else {
            return back()->with('error', __('messages.orders.updated.error'))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            return response()->json('error', 400);
        }
    }
}
