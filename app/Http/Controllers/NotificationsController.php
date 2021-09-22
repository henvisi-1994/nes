<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Events\MessageEvent;
use App\Models\User;

class NotificationsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public static function getNotificationsMessages()
    {
        return DB::table('messages')->select(['users.name as messagingUserName', 'users.id as messagingUserID', 'users.image as messagingUserImage', 'messages.message', 'messages.created_at'])->where('messages.isread', 0)->where('messages.user_id_to', Auth::user()->id)->join('users', 'messages.user_id_from', '=', 'users.id')->limit(10)->orderBy('messages.created_at', 'desc')->get();
    }

    public static function getNotificationsLikes()
    {
        return DB::table('likes')->select('users.*')->where('liked_user_id', Auth::user()->id)->join('users', 'likes.userid', '=', 'users.id')->limit(10)->get();
    }
}
