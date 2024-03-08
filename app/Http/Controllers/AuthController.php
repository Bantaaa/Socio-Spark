<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Folows;
use App\Models\Likes;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use App\Models\Reservation;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function auth()
    {

        return view("auth");
    }

    public function forbidden()
    {
        return view('forbidden');
    }
    public function signup(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);
        
        $image = $request->file('image');
        $destinationPath = null;

        if ($image = $request->file('image')) {
            $destinationPath = 'images/profile/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        }
        
         

         User::create([
            'name' => $request->input('name'),
            'image' => $imageName,
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully');
    }

    
    public function signin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Authentication successful
            // session()->put('role', $user->role);
            session()->put([
                // 'role' => $user->role,
                'name' => $user->name,
                'user_id' => $user->id,
                'role' => $user->role,
            ]);
            // dd(session('role'));
            if($user ->active == 0)
            {
                return redirect()->route('forbidden');
            }
            return redirect()->route('home');
        } else {
            // Authentication failed
            return redirect()->route('register');
        }
    }

    // public function showSearch() {
    //     return view('posts.search');
    // }

    // public function searchUsers(Request $request)
    // {
    //     $keyword = $request->input('title_s');

    //     if ($keyword === '') {
    //         // If the search keyword is empty, return all users or handle as needed
    //         $users = User::all();
    //     } else {
    //         // Search for users with names containing the keyword
    //         $users = User::where('Fname', 'like', '%' . $keyword . '%')->get();
    //     }

    //     // dd($users);

    //     // Pass the users data to the view
    //     return response()->json($users);
    // }


    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect()->route('login'); // Redirect to your logout route after logout
    }
}
