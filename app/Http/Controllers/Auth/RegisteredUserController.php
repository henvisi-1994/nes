<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //return 'registration temporarily disabled';
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    { //return 'registration temporarily disabled';
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
            'gender' => 'required|string',
            'country' => 'required|string',
            'city' => 'string|nullable',
            'birthday' => 'required|date',
            'image' => 'image|nullable|max:1999', /* 2MB */
            'cbox_terms' => 'required|accepted',
        ]);

        $image_name = "";
        if ($request->hasFile('image')) {
            $image_name = $request->name . "_1." . $request->image->extension();
            $request->image->move('profile_images/', $image_name);  // /public/profile_images/file.png
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isadmin' => 0,
            'gender' => $request->gender,
            'country' => $request->country,
            'city' => $request->city,
            'birthday' => $request->birthday,
            'image' => $image_name,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
