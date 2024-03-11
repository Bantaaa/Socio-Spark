<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $users = User::all();

        $events = Event::where('validated', 1)->get();
        $paginatedEvents = Event::where('validated', 1)->paginate(6);
        $categories = Category::all();

        // dd($myEvents);
        // $canceledEvents = Event::where('user_id', Auth::user()->id)->where('validated', 3)->get();
        // $pendingEvents = Event::where('user_id', Auth::user()->id)->where('validated', 0)->get();

        $currentUser = 0;
        $myEvents = 0;
        if (Auth::user()) {
            $currentUser = User::where('id', session('user_id'))->first();
            $myEvents = Event::where('user_id', Auth::user()->id)->get();
        }
        // dd($currentUser->image);
        return view('home', compact('events', 'currentUser', 'myEvents','paginatedEvents', 'categories'));
    }

    public function singleEvent($id)
    {
        $plan = Reservation::where('event_id', $id)->where('user_id', Auth::id())->value('plan');
        $reserved = Reservation::where('event_id', $id)->where('user_id', Auth::id())->first();
        // dd($plan);

        $events = Event::where('validated', 1)->get();
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
        $currentUser = 0;
        if (Auth::user()) {
            $currentUser = User::where('id', session('user_id'))->first();
        }
        $categories = Category::all();
        return view('includes.form', compact('categories', 'currentUser',));
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


        // dd($request->input('category_id'));
        $event = Event::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'image' => $imageName,
            'autoTicket' => $acceptance,
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'place' => $request->input('place'),
            'quantity' => $request->input('quantity'),
            'category_id' => $request->input('category_id'),
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

    public function searchEvents(Request $request)
    {
        $keyword = $request->get('query');
        $events = Event::where('validated', 1)->get();
        $categories = Category::all();

        


        if ($keyword === '') {
            // If the search keyword is empty, return all events or handle as needed
            $paginatedEvents = Event::where('validated', 1)->paginate(3);
        } else {
            // Search for users with names containing the keyword
            $paginatedEvents = Event::where('title', 'like', '%' . $keyword . '%')->where('validated', 1)->paginate(3);
        }

        // dd($users);
        $currentUser = 0;
        $myEvents = 0;
        if (Auth::user()) {
            $currentUser = User::where('id', session('user_id'))->first();
            $myEvents = Event::where('user_id', Auth::user()->id)->get();
        }
        return view('home', compact('paginatedEvents', 'currentUser', 'myEvents', 'events', 'categories'));
    }
    public function searchCategories(Request $request)
    {
        $keyword = $request->get('query');
        $events = Event::where('validated', 1)->get();
        $categories = Category::all();

        if ($keyword === '') {
            // If the search keyword is empty, return all events or handle as needed
            $paginatedEvents = Event::where('validated', 1)->paginate(3);
        } else {
            // Search for users with names containing the keyword
            $paginatedEvents = Event::where('category_id', 'like', '%' . $keyword . '%')->where('validated', 1)->paginate(3);
        }

        // dd($users);
        $currentUser = 0;
        $myEvents = 0;
        if (Auth::user()) {
            $currentUser = User::where('id', session('user_id'))->first();
            $myEvents = Event::where('user_id', Auth::user()->id)->get();
        }
        return view('home', compact('paginatedEvents', 'currentUser', 'myEvents', 'events', 'categories'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $categories = Category::all();
        $currentUser = User::where('id', session('user_id'))->first();
        $event = Event::findOrFail($id);
        return view('includes.update', compact('event', 'categories', 'currentUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEvent(Request $request, string $id)
    {
        //
        $destinationPath = null;

        
        $acceptance = 0;

        if ($request->input('acceptance') == 'on') {
            $acceptance = 1;
        }
        // dd($request->input('category_id'));
        $event = Event::findOrFail($id);
        $event->update([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'autoTicket' => $acceptance,
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'place' => $request->input('place'),
            'quantity' => $request->input('quantity'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('orga');
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
