<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $events = Event::all();
        return view('home', compact('events', 'users'));
    }

    public function singleEvent($id)
    {
        $events = Event::all();
        $event = Event::where('id', $id)->first();
        // dd($event);
        return view('event', compact('event', 'events'));
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

    $event = Event::create([
        'title' => $request->input('title'),
        'image' => $imageName, 
        'description' => $request->input('description'),
        'date' => $request->input('date'),
        'place' => $request->input('place'),
        'quantity' => $request->input('quantity'),
        'category' => $request->input('category'),
    ]);

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
