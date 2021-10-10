<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $notifications = NotificationsController::getNotificationsLikes();
        $notifications_messages = NotificationsController::getNotificationsMessages();
        $user = Auth::user();
        return view('profile', compact('user', 'notifications', 'notifications_messages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPublicProfile($id)
    {
        $notifications = NotificationsController::getNotificationsLikes();
        $notifications_messages = NotificationsController::getNotificationsMessages();
        $user = DB::table('users')->select(array("id", "name", "gender", "country", "city", "birthday", "image"))->where('id', '=', $id)->get();
        $stars_ = DB::table('star')->select('starred_user_id')->where('userid', Auth::user()->id)->get();
        $likes_ = DB::table('likes')->select('liked_user_id')->where('userid', Auth::user()->id)->get();
        $likes = [];
        foreach (json_decode($likes_, true) as $v) array_push($likes, $v["liked_user_id"]);
        $stars = [];
        foreach (json_decode($stars_, true) as $v) array_push($stars, $v["starred_user_id"]);
        return view('public_profile', compact(
            'user',
            'notifications',
            'notifications_messages',
            'likes',
            'stars',
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|int',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'new_password' => "string|nullable|min:8",
            'old_password' => "string|nullable|min:8",
            'password_confirmation' => "string|nullable|min:8",
            'gender' => 'required|string',
            'country' => 'required|string',
            'city' => 'string|nullable',
            'birthday' => 'required|date',
            'image' => 'image|nullable|max:1999', /* 2MB */
        ]);

        if (!Auth::user()->isadmin && Auth::user()->id != $request->id)
            return back()->withErrors(["Solo puedes modificar tu proprio perfil!"]);

        $user = User::findOrFail($request->id);

        $image_name = "";
        if ($request->hasFile('image')) {
            $old_image_name = $user->name . "_1." . $request->image->extension();
            File::delete('profile_images' . '/' . $old_image_name);

            $image_name = $request->name . "_1." . $request->image->extension();
            $request->image->move('profile_images/', $image_name);  // /public/profile_images/file.png
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->new_password != null) {
            if (Hash::make($request->old_password) != Hash::make($user->password))
                return back()->withErrors(["La contrase&ntilde;a actual no es correcta."]);
            if ($request->new_password != $request->password_confirmation)
                return back()->withErrors(["Las contrase&ntilde;as no coinciden."]);
            if ($request->new_password == null || $request->new_password == "")
                return back()->withErrors(["La nueva contrase&ntilde;a no es valida."]);
            $user->password = Hash::make($request->new_password);
        }
        $user->gender = $request->gender;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->birthday = $request->birthday;
        $user->isadmin = 0;
        if ($request->hasFile('image'))
            $user->image = $image_name;

        $user->save();

        // return redirect(RouteServiceProvider::HOME);
        return redirect('/profile')->with("message", "Perfil actualizado!");
    }
}
