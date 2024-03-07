<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;

use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkReservation()
    {
        //

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $eventId, string $plan)
    {
        //
        $auto = Event::where('id', $eventId)->value('autoTicket');
        $reserved = Reservation::where('event_id', $eventId)->where('user_id', Auth::id())->first();
        if($plan == 'vip')
        {
            $plan = 'vip';
        }
        elseif($plan == 'standard')
        {
            $plan ='standard';
        }



        if(!$reserved && !$auto)
        {
            $reservation = Reservation::create([
                'user_id' => Auth::id(),
                'event_id' => $eventId,
                'status' => 'Being processed',
                'plan' => $plan,
            ]);
            // dd($reservation);
            Event::where('id', $eventId)->decrement('quantity', 1);

        }
        elseif(!$reserved && $auto)
        {
            $reservation = Reservation::create([
                'user_id' => Auth::id(),
                'event_id' => $eventId,
                'status' => 'Reserved',
                'plan' => $plan,
            ]);
            // dd($reservation);
            Event::where('id', $eventId)->decrement('quantity', 1);

        }

        return redirect()->back()->with(compact('reserved', 'plan'));
    }

    /**
     * Display the specified resource.
     */
    public function generateTicket(string $id)
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
