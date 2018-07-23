<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

      /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function profile($id)
    {
        $user = User::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($user == null || count($user) == 0) {
            return redirect()->intended('/profile');
        }

        return view('profile', ['user' => $user]);
    }
}
