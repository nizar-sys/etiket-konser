<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateOrder;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datePicked = request()->date_picked ?? date('Y-m-d');
        $formatedDatePicked = \Carbon\Carbon::parse($datePicked)->translatedFormat('F Y');

        $orders = Order::orderBy('created_at', 'asc')
        ->whereMonth('created_at', date('m', strtotime($datePicked)))
        ->get();

        return view('dashboard.orders.index', compact('orders', 'formatedDatePicked', 'datePicked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateOrder $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $order = Order::create($validated);

        return redirect(route('orders.index'))->with('success', 'Data pesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('dashboard.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateOrder $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $order = Order::findOrFail($id);

        $order->update($validated);

        return redirect(route('orders.index'))->with('success', 'Data pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect(route('orders.index'))->with('success', 'Data pesanan berhasil dihapus.');
    }
}
