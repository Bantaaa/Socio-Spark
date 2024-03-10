<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        $users = User::all();
        $nonApprovedEvents = Event::where('validated', 0)->get();
        $approvedEvents = Event::where('validated', 1)->get();
        $canceledEvents = Event::where('validated', 3)->get();
        $currentUser = User::where('id', session('user_id'))->first();


        // dd($events);

        return view('dashboard', compact('approvedEvents', 'nonApprovedEvents','canceledEvents', 'currentUser', 'users', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function approveEvent($id)
    {
        //
        $event = Event::find($id);
        $event->validated = 1;
        $event->save();

        return redirect()->back();
    }

    public function rejectEvent($id)
    {
        $event = Event::find($id);
        $event->validated = 3;
        $event->save();

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ban(int $id)
    {
        //
        $user = User::find($id);
        $user->role_id = 4;
        $user->active = 0;
        $user->save();

        return redirect()->back();
    }
    public function unban(int $id)
    {
        //
        $user = User::find($id);
        $user->active = 1;
        $user->role_id = 3;
        $user->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function getUsers()
    {
        //
        
        redirect()->back();
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
