<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function checkout()
    {
        $tax = 0.07;
        return view('main.checkout', ['tax' => $tax]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function placeOrder(Request $request)
    {
        $order = $this->orderRepository->storeOrderDetails($request->all());
        if($order) {
            Cart::clear();
            return view('main.success', ['order' => $order]);
        }
        return redirect()->back()->with('warning', 'Order not placed');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
