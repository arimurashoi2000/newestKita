<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;

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
    return view('example');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 会員登録ルート
Route::get('/member_registration', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/member_registration', [RegisterController::class, 'register']);
// ログインルート
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
// ログアウトルート
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
//articles基本的なCRUD操作
Route::resource('articles', ArticlesController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
//コメント投稿機能
Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store')->middleware('auth:members');
//プロフィール編集ページに遷移
Route::get('/profile', [ProfileController::class, 'showEditProfilePage'])->name('profile.edit')->middleware('auth:members');
//プロフィール編集機能
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth:members');
// パスワード変更機能
Route::put('/password_change', [PasswordController::class, 'changePassword'])->name('password.update')->middleware('auth');
