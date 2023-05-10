<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreOrUpdateOrder;
use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function dashboard()
    {
        $orderQuery = Order::query();
        $eventQuery = Event::query();

        $countData = [
            'staff' => User::count(),
            'event' => $eventQuery->count(),
            'order' => $orderQuery->count(),
        ];

        // get most sold ticket event
        $mostSoldTicketEvent = $orderQuery->selectRaw('event_id, count(*) as total')
        ->groupBy('event_id')
        ->orderBy('total', 'desc')
        ->get();


        return view('dashboard.index', compact('countData', 'mostSoldTicketEvent'));
    }

    function eventList()
    {
        $events = Event::orderBy('tanggal_acara', 'asc')
        ->when(request()->search, function($events) {
            $search = request()->search;
            $events->where('nama_acara', 'like', "%{$search}%");
        })
        ->paginate(9);

        return view('frontend.event_list', compact('events'));
    }

    function eventDetail($nama_acara)
    {
        // change slug to name
        $nama_acara = str_replace('-', ' ', $nama_acara);

        $event = Event::where('nama_acara', 'LIKE', '%'.$nama_acara.'%')->first();
        
        if(is_null($event)){
            return redirect('/')->with('error', 'Event tidak ditemukan');
        }

        return view('frontend.event_detail', compact('event'));
    }

    function checkoutTiket(Request $request, $nama_acara)
    {
        $nama_acara = str_replace('-', ' ', $nama_acara);

        $event = Event::where('nama_acara', 'LIKE', '%'.$nama_acara.'%')->first();
        
        if(is_null($event)){
            return redirect('/')->with('error', 'Event tidak ditemukan');
        }

        
        return view('frontend.event_checkout', compact('event'));
    }

    public function orderTiketEvent(RequestStoreOrUpdateOrder $request)
    {
        $newOrder = Order::create($request->validated() + [
            'event_id' => $request->event_id,
        ]);

        return redirect()->route('event.order.detail', $newOrder->id)->with('success', 'Berhasil memesan tiket');
    }

    public function orderDetail($orderId)
    {
        $order = Order::whereId($orderId)->first();

        if(is_null($order)){
            return redirect('/')->with('error', 'Data pemesanan tidak ditemukan');
        }

        return view('frontend.event_order_detail', compact('order'));
    }

    public function printOrderDetail($orderId)
    {
        $order = Order::whereId($orderId)->first();

        if(is_null($order)){
            return redirect('/')->with('error', 'Data pemesanan tidak ditemukan');
        }

        return view('print.e_tiket', compact('order'));
    }
}
