<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
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
        $reserved = Reservation::where('event_id', $eventId)->where('user_id', Auth::id())->first();
        if($plan == 'vip')
        {
            $plan = 'vip';
        }
        elseif($plan == 'standard')
        {
            $plan ='standard';
        }

        if(!$reserved)
        {
            $reservation = Reservation::create([
                'user_id' => Auth::id(),
                'event_id' => $eventId,
                'status' => 'created',
                'plan' => $plan,
            ]);
            // dd($reservation);
        }

        return redirect()->back()->with(compact('reserved', 'plan'));
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
