<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user()->id;
        $events = Event::where('validated' , 1)->get();
        $reservations = Reservation::where('user_id', $user)->where('status', 'Reserved')->get();
        $ticket=[];
        foreach ($reservations as $reservation)
        {
            Ticket::create([

                'reservation_id' => $reservation->id,
                'plan' => $reservation->plan,
             ]);
            $ticket[$reservation->id] = Ticket::where('reservation_id', $reservation->id)->with('User')->first();
            // dd($ticket[$reservation->id]);

        }
        // dd($ticket);

        
        $currentUser = 0;
        $myEvents = 0;
        if(Auth::user())
        {
            $currentUser = User::where('id', session('user_id'))->first();
            $myEvents = Event::where('user_id', Auth::user()->id)->get();
            return view('tickets', compact('events', 'ticket','reservations', 'currentUser','myEvents'));
        }
        // dd($currentUser->image);
        return view('tickets',compact('events', 'currentUser', 'myEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createTicket(int $id)
    {
        //
        $reservation = Reservation::where('id', $id)->first();
        if ($reservation) {
            $reservation->status = 'Reserved';
            $reservation->save();
            Ticket::create([
                'reservation_id' => $reservation->id,
                'plan' => $reservation->plan,
            ]);
        }
        return redirect()->back();

        
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
