<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ConocerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $stars_ = DB::table('star')->select('starred_user_id')->where('userid', Auth::user()->id)->get();
        $likes_ = DB::table('likes')->select('liked_user_id')->where('userid', Auth::user()->id)->get();
        $likes = [];
        foreach (json_decode($likes_, true) as $v) array_push($likes, $v["liked_user_id"]);
        $stars = [];
        foreach (json_decode($stars_, true) as $v) array_push($stars, $v["starred_user_id"]);
        $users  = User::all()->where('isadmin', '=', 0)->where('id', '!=', Auth::user()->id);
        $users = $users->shuffle()->splice(0, 25);  // shuffle and take only 25 users
        $notifications = NotificationsController::getNotificationsLikes();
        $notifications_messages = NotificationsController::getNotificationsMessages();
        $messages = null;

        return view('conocer', compact(
            [
                'users',
                'likes',
                'stars',
                'notifications',
                'notifications_messages',
                'messages'
            ]
        ));
    }
}
