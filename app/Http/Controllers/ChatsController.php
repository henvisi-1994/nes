<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Events\MessageEvent;
use App\Models\User;

class ChatsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $likes_ = DB::table('likes')->select('liked_user_id')->where('userid', Auth::user()->id)->get();
        $likes = [];
        foreach (json_decode($likes_, true) as $v) array_push($likes, $v["liked_user_id"]);
        $users  = User::all()->where('isadmin', '=', 0)->where('id', '!=', Auth::user()->id);
        $notifications = NotificationsController::getNotificationsLikes();
        $notifications_messages = NotificationsController::getNotificationsMessages();

        // select * from ( (select messages.*, users.image, users.name from messages inner join users on users.id = messages.user_id_to where user_id_from = 19) union (select messages.*, users.image, users.name from messages inner join users on users.id = messages.user_id_from where user_id_to = 19) ) as i order by created_at desc limit 1
        DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

        $messages = DB::select("select * from ( (select messages.*, users.image, users.name, messages.user_id_to as receiver_id from messages inner join users on users.id = messages.user_id_to where user_id_from = ? group by messages.user_id_to) union (select messages.*, users.image, users.name, messages.user_id_from as receiver_id from messages inner join users on users.id = messages.user_id_from where user_id_to = ? group by messages.user_id_from) ) as i order by created_at desc", [Auth::user()->id, Auth::user()->id]); 

        // user wants to begin chat with new user
        $new_user = null;
        if ($id != null && DB::table('messages')->select('messages.id')->where('messages.user_id_to', Auth::user()->id)->where('messages.user_id_from', $id)->orWhere('messages.user_id_to', $id)->where('messages.user_id_from', Auth::user()->id)->limit(1)->count() == 0)
            $new_user = DB::table('users')->where('id', '=', $id)->first(['id', 'name', 'image']);
            
        $specificUserID = -1;
        if ($id != null) $specificUserID = $id;

        return view('mis_mensajes_responder', compact(
            [
                'users',
                'likes',
                'notifications',
                'messages',
                'notifications_messages',
                'new_user',
                'specificUserID',
            ]
        ));
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages(Request $request, $id)
    {
        $this->markAsRead($id);
        $messages = DB::table('messages')->where('user_id_to', Auth::user()->id)->where('user_id_from', $id)->orWhere('user_id_from', Auth::user()->id)->where('user_id_to', $id)->orderBy('created_at')->get();
        return $messages;
    }

    /**
     * Delete all messages
     *
     * @return Message
     */
    public function deleteMessages(Request $request, $id)
    {
        $r = DB::table('messages')->where('user_id_to', Auth::user()->id)->where('user_id_from', $id)->orWhere('user_id_from', Auth::user()->id)->where('user_id_to', $id)->delete();
        return 'ok';
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'user_id_to' => 'required|integer',
            'message' => 'required|string|max:255|min:1'
        ]);

        $message = Message::create([
            'message' => $request->message,
            'user_id_to' => $request->user_id_to,
            'user_id_from' => Auth::user()->id,
            'isread' => 0,
        ]);

        event(new MessageEvent($message));

        // TODO probably this is the right response in all cases
        return ['success' => true, 'message' => 'ok'];;
    }

    public function markAllAsRead(Request $request)
    {
        $r = DB::table('messages')->where('user_id_to', Auth::user()->id)->orWhere('user_id_from', Auth::user()->id)->update(['isread' => 1]);
        return 'ok';
    }

    public function markAsRead($user_id_to)
    {
        $r = DB::table('messages')->where('user_id_to', Auth::user()->id)->where('user_id_from', $user_id_to)->orWhere('user_id_from', Auth::user()->id)->where('user_id_to', $user_id_to)->update(['isread' => 1]);
    }
}
