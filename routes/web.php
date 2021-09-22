<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConocerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatsController;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check())
        return redirect('/conocer');
    else
        return view('welcome');
});

Route::get('/collaborators', function (Request $request) {
    return view('collaborators');
});

Route::get('/dashboard', function () {
    return redirect('conocer');
})->middleware(['auth'])->name('dashboard');

Route::get('/conocer', [ConocerController::class, 'show'])
    ->middleware(['auth'])->name('conocer');

Route::get('/profile', [ProfileController::class, 'show'])
    ->middleware('auth');

Route::get('/public_profile/{id}', [ProfileController::class, 'showPublicProfile'])
    ->middleware('auth');

Route::post('/profile/update', [ProfileController::class, 'update'])
    ->middleware('auth');

// Route::get('/get-user-data/{id}', function (Request $request, $id) {
//     return DB::table('users')->where('id', '=', $id)->first(['id', 'name', 'image']);
// });

// the user stars another user
Route::get('/star/{id}', function (Request $request, $id) {
    DB::insert('insert into star (userid, starred_user_id) values (?, ?)', [Auth::user()->id, $id]);
    return "ok";
})->middleware('auth');

// the user unstars another user
Route::get('/unstar/{id}', function (Request $request, $id) {
    DB::delete('delete from star where userid = ? and starred_user_id = ?', [Auth::user()->id, $id]);
    return "ok";
})->middleware('auth');

// the user likes another user
Route::get('/like/{id}', function (Request $request, $id) {
    DB::insert('insert into likes (userid, liked_user_id) values (?, ?)', [Auth::user()->id, $id]);
    event(new App\Events\LikeEvent($id, true));
    return "ok";
})->middleware('auth');

// the user unlikes another user
Route::get('/unlike/{id}', function (Request $request, $id) {
    DB::delete('delete from likes where userid = ? and liked_user_id = ?', [Auth::user()->id, $id]);
    // event(new App\Events\LikeEvent($id, false));
    return "ok";
})->middleware('auth');

// mark all notifications of unread messages as read
// TODO left as future work, need to add a field isread to table likes
Route::get('/mark-all-likes-as-read', function (Request $request) {
    // $r = DB::table('likes')->where('user_id_to', Auth::user()->id)->orWhere('user_id_from', Auth::user()->id)->update(['isread' => 1]);
    return 'nok';
})->middleware(['auth']);

Route::get('/messages/{id?}', [ChatsController::class, 'show'])
    ->middleware(['auth'])->name('messages');

// get all messages
Route::get('/fetch-messages/{id}', [ChatsController::class, 'fetchMessages'])
    ->middleware(['auth']);

// delete messages with user
Route::get('/delete-messages/{id}', [ChatsController::class, 'deleteMessages'])
    ->middleware(['auth']);

// a user sends a message
Route::post('/send-message', [ChatsController::class, 'sendMessage'])
    ->middleware(['auth']);

// mark all notifications of unread messages as read
Route::get('/mark-all-messages-as-read', [ChatsController::class, 'markAllAsRead'])
    ->middleware(['auth']);

// test socket.io; and test it through localhost:8000/conocer (two browser windows)
Route::get('/fire', function (Request $request) {
    event(new App\Events\TestEvent("hellooo"));
    return "ok";
});

Route::get('/future-works', function (Request $request) {
    return view('future_works');
});

require __DIR__ . '/auth.php';
