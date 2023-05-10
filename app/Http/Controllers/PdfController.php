<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function mostPopularEvent()
    {
        // get most sold ticket event
        $mostSoldTicketEvent = Order::selectRaw('event_id, count(*) as total')
        ->groupBy('event_id')
        ->orderBy('total', 'desc')
        ->get();

        $customPaper = array(0,0,1000.00,500.80);
        $pdf = Pdf::loadView('print.most_popular_event', compact('mostSoldTicketEvent'))->setPaper($customPaper, 'potrait');
        return $pdf->download('Data tiket terbanyak terjual.pdf');
    }

    public function events()
    {
        $datePicked = request()->date_picked ?? date('Y-m-d');
        $formatedDatePicked = \Carbon\Carbon::parse($datePicked)->translatedFormat('F Y');

        $events = Event::orderBy('tanggal_acara', 'asc')
        ->whereMonth('tanggal_acara', date('m', strtotime($datePicked)))
        ->get();

        $customPaper = array(0,0,1000.00,500.80);
        $pdf = Pdf::loadView('print.events', compact('events', 'formatedDatePicked', 'datePicked'))->setPaper($customPaper, 'potrait');
        return $pdf->download('Data acara.pdf');
    }

    public function orders()
    {
        $datePicked = request()->date_picked ?? date('Y-m-d');
        $formatedDatePicked = \Carbon\Carbon::parse($datePicked)->translatedFormat('F Y');

        $orders = Order::orderBy('created_at', 'asc')
        ->whereMonth('created_at', date('m', strtotime($datePicked)))
        ->get();

        $customPaper = array(0,0,1000.00,500.80);
        $pdf = Pdf::loadView('print.orders', compact('orders', 'formatedDatePicked', 'datePicked'))->setPaper($customPaper, 'potrait');
        return $pdf->download('Data pesanan.pdf');
    }

    public function users()
    {
        $users = User::orderByDesc('id')->get();
        
        $customPaper = array(0,0,1000.00,500.80);
        $pdf = Pdf::loadView('print.users', compact('users'))->setPaper($customPaper, 'potrait');
        return $pdf->download('Data staff.pdf');
    }
}
