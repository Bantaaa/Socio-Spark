<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $users = User::all();
        $events = Event::where('validated' , 1)->get();
        
        // dd($myEvents);
        // $canceledEvents = Event::where('user_id', Auth::user()->id)->where('validated', 3)->get();
        // $pendingEvents = Event::where('user_id', Auth::user()->id)->where('validated', 0)->get();
        
        $currentUser = 0;
        $myEvents = 0;
        if(Auth::user())
        {
            $currentUser = User::where('id', session('user_id'))->first();
            $myEvents = Event::where('user_id', Auth::user()->id)->get();
        }
        // dd($currentUser->image);
        return view('home', compact('events', 'currentUser', 'myEvents'));
    }

    public function singleEvent($id)
    {
        $plan = Reservation::where('event_id', $id)->where('user_id', Auth::id())->value('plan');
        $reserved = Reservation::where('event_id', $id)->where('user_id', Auth::id())->first();
        // dd($plan);

        $events = Event::where('validated' , 1)->get();
        $event = Event::where('id', $id)->first();
        // dd($event);
        $currentUser = User::where('id', session('user_id'))->first();
        // dd($currentUser->image);
        $left = Event::where('id', $id)->value('quantity');

        return view('event', compact('event', 'events', 'currentUser', 'reserved', 'plan', 'left'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('includes.form');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $image = $request->file('image');
        $destinationPath = null;

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        }

        $acceptance = 0;

        if ($request->input('acceptance') == 'on') {
            $acceptance = 1;
        }

        // dd($acceptance);


        $event = Event::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'image' => $imageName,
            'autoTicket' => $acceptance,
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'place' => $request->input('place'),
            'quantity' => $request->input('quantity'),
            'category' => $request->input('category'),
        ]);

        // dd($event);

        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $events = Event::all();
        return view('events.show', compact('events'));
    }

    public function orga()
    {
        // $events = Event::all();
        return view('orga');
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
    public function destroy(int $id)
    {
        //
        Event::destroy($id);
        return redirect()->back();
    }
}
