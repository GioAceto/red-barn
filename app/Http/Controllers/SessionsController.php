<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function index()
    {
        require_once(__DIR__ . '/../../data/nav_data.php');

        return view("home", ['nav_data' => $nav_data]);
    }

    public function create()
    {
        if (auth()->check() && auth()->user()->email_verified_at) {
            return redirect('/');
        }

        return view('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email address or password.'
            ]);
        }

        if (auth()->check() && !auth()->user()->email_verified_at) {
            return redirect()->route('verification.notice');
        }

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
