<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.account', compact('user'));
    }

    /**
     * Updates account details of user.
     */
    public function update(User $user, Request $request)
    { 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return back()->with('success', 'You updated your account details');
    }

    public function updateUser(UpdateAccount $request)
    {
        $user = Auth::user();
        
        $user->username = Request::input('username');
        $user->email = Request::input('email');

        if ( ! Request::input('password') == '')
        {
            $user->password = bcrypt(Request::input('password'));
        }

        $user->save();

        Flash::message('Your account has been updated!');
        return Redirect::to('/account');
    }
}
