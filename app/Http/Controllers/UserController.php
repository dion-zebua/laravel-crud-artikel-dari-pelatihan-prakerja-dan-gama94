<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $credentials = $request->validate([
            'name'  => 'required',
            'password'  => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors('Name or Passowrd incorrect');
    }

    public function logout_view(Request $request)
    {
        if (!Auth::user()) {
            abort(404);
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login_view');
    }
}
