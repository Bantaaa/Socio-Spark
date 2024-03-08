<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Reservation;
// use App\Models\Event;

class OrgaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $reservationRequest = [];
        // $myEvents = Event::where('user_id', Auth::user()->id)->get();
        $myEvents = Event::where('user_id', Auth::user()->id)
            ->with('Reservation.User')
            ->get();
        // $reservations = Event::where('user_id', Auth::user()->id)
        //     ->whereHas('Reservation', function ($query) {
        //         $query->where('status', 'Being processed');
        //     })
        //     ->with('Reservation.User')
        //     ->get();
        // return response()->json($myEvents);
        // dd($myEvents);
        // foreach ($myEvents as $event)
        // {

        //     $reservationRequest[$event->id] = Reservation::where('event_id', $event->id)->where('status', 'Being processed')->get();
        //     dd($reservationRequest);
        // }

        return view('orga', compact('myEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
