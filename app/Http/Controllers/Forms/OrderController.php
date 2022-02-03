<?php

namespace App\Http\Controllers\Forms;

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
    public function store(Request $request)
    {
        // Storage::put('order.txt', json_encode($request->all())); 

        $order = new Order();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->comment = $request->input('comment');
        $order->save();

        return redirect()->route('forms.order.index')->with('success', 'Сообщение было добавлено!');
    }
}
