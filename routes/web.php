<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CloseFriendController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\isNotLogin;


Route::get('/main', function () {
    return view('main.main');
})->name('main');

Route::get('/check-session', [AuthController::class, 'check']);

// Route::get('/check_login', function(){
//     return ' ehe dia login';
// })->name('check_login')->middleware(isLogin::class);w

Route::get('/', [MainController::class, 'index'])->name('home')->middleware(isLogin::class);

Route::post('/', [MainController::class, 'store'])->name('post_image')->middleware(isLogin::class);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(isLogin::class);

Route::get('/register', [AuthController::class, 'registerview'])->name('register_page')->middleware(isNotLogin::class);

Route::post('/register', [AuthController::class, 'register'])->name('register_store')->middleware(isNotLogin::class);

Route::get('/login', [AuthController::class, 'loginview'])-> name('login_page')->middleware(isNotLogin::class);

Route::post('/login',[AuthController::class, 'login'])->name('login_store')->middleware(isNotLogin::class);


// Route::resource('admin', AdminController::class)->middleware([isLogin::class, isAdmin::class]);
Route::get('/admin',[AdminController::class, 'index']);


#update profile
Route::post('/updateProfile', [AuthController::class, 'updateProfile'])->name('update.profile');
Route::post('/update-username', [AuthController::class, 'updateUsername'])->name('update.username');
Route::post('/update-profile-desc', [AuthController::class, 'updateProfileDesc'])->name('update.profile.desc');


Route::get('/history', function(){
 return view("history");
});

Route::get('/close-friend', [CloseFriendController::class, 'getCloseFriends'])->name('closeFriends')->middleware(isLogin::class);
Route::post('/add-close-friend', [CloseFriendController::class, 'addCloseFriend'])->name('addCloseFriend');
Route::post('/delete-close-friend', [CloseFriendController::class, 'deleteCloseFriend'])->name('deleteCloseFriend');
Route::post('/clear-close-friends', [CloseFriendController::class, 'clearCloseFriends'])->name('clearCloseFriends');


Route::post('/users/{friendId}/follow', [MainController::class, 'follow'])->name('follow');
Route::delete('/users/{friendId}/unfollow', [MainController::class, 'unfollow'])->name('unfollow');

Route::get('/search-users', [MainController::class, 'searchUsers'])->name('search.users');
Route::get('/search-friends', [MainController::class, 'searchFriends'])->name('search.friends');

Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');