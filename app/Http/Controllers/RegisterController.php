<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function create()
    {
        if (auth()->check() && auth()->user()->email_verified_at) {
            return redirect()->route('home');
        }

        return view('register.create');
    }
    public function store(Request $request)
    {
        $errorMessages = [
            'phone_number.*' => 'A valid phone number is required.',
            'is_21' => 'You must be 21 or older to participate in this program.',
            'accepted_terms_at' => 'You must accept the terms and conditions to create an account.'
        ];

        $request->validate([
            'first_name' => 'required|string|max:255|regex:/^[A-Za-z ]+$/',
            'last_name' => 'required|string|max:255|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email|unique:users|max:255',
            'phone_number' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'is_21' => 'required|accepted',
            'accepted_terms_at' => 'required|accepted'
        ], $errorMessages);

        $attributes = $request->all();

        $is21 = $request->input('is_21') === 'on';
        $acceptTerms = $request->input('accepted_terms_at') === 'on';
        $subscribeToNewsletter = $request->input('subscribe_to_newsletter') === 'on';

        $attributes = [
            'first_name' => strtolower($request->input('first_name')),
            'last_name' => strtolower($request->input('last_name')),
            'email' => strtolower($request->input('email')),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make($request->input('password')),
            'is_21' => $is21,
            'accepted_terms_at' => $acceptTerms ? now() : null,
            'subscribe_to_newsletter' => $subscribeToNewsletter,
        ];

        $user = User::create($attributes);

        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('verification.notice');

        // session()->flash('success', 'Registration successful!');
    }
}
