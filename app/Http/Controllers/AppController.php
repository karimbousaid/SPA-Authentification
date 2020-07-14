<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function init()
    {
        if (Auth::check())
        {
            return response()->json(Auth::user(), 200);
        }
        else {
            return response()->json(Null, 500);
        }

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            return response()->json(Auth::user(), 200);
        }
    }

    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(isset($user->id))
        {
           return response()->json(['error' => 'Email already exists'], 401);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return response()->json($user, 200);

    }

    public function logout()
    {
        Auth::logout();
        return response()->json([null], 200);

    }
}
