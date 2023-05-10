<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateEvent;
use Illuminate\Support\Facades\Hash;

class EventController extends Controller
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

        $events = Event::orderBy('tanggal_acara', 'asc')
        ->whereMonth('tanggal_acara', date('m', strtotime($datePicked)))
        ->get();

        return view('dashboard.events.index', compact('events', 'formatedDatePicked', 'datePicked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateEvent $request)
    {
        $validated = $request->validated();

        if($request->hasFile('poster')){
            $fileName = time() . '.' . $request->poster->extension();
            $validated['poster'] = $fileName;

            // move file
            $request->poster->move(public_path('uploads/images/posters'), $fileName);
        }

        $event = Event::create($validated);

        return redirect(route('events.index'))->with('success', 'Data acara berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Event::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateEvent $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $event = Event::findOrFail($id);

        $validated['poster'] = $event->poster;

        if($request->hasFile('poster')){
            $fileName = time() . '.' . $request->poster->extension();
            $validated['poster'] = $fileName;

            // move file
            $request->poster->move(public_path('uploads/images'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/images/posters/'.$event->poster);
            if(file_exists($oldPath) && $event->poster != 'dummy.png'){
                unlink($oldPath);
            }
        }

        $event->update($validated);

        return redirect(route('events.index'))->with('success', 'Data acara berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/images/posters/'.$event->poster);
        if(file_exists($oldPath) && $event->poster != 'dummy.png'){
            unlink($oldPath);
        }
        $event->delete();

        return redirect(route('events.index'))->with('success', 'Data acara berhasil dihapus.');
    }
}
