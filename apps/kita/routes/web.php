<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticlesTagController;

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
Route::resource('articles', ArticlesController::class)->only(['index', 'create', 'store', 'edit', 'update']);
//コメント投稿機能
Route::post('/articles/{id}', [CommentsController::class, 'store'])->name('comments.store');
//プロフィール編集ページに遷移
Route::get('/profile', [ProfileController::class, 'showEditProfilePage'])->name('profile.edit')->middleware('auth');
//プロフィール編集機能
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//管理者の認証機能
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm']);
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('admin.logout');
Route::get('/admin/admin_users/create', [App\Http\Controllers\Admin\RegisterController::class, 'showRegistrationForm']);
Route::post('/admin/admin_users', [App\Http\Controllers\Admin\RegisterController::class, 'register'])->name('admin.create');
//管理者画面の基本的なCRUD操作
Route::resource('/admin/admin_users', AdminUserController::class)->only(['index', 'edit', 'update', 'destroy']);
//会員管理
Route::get('/admin/users',  [UserController::class, 'index'])->name('user.index');
//基本的なタグ機能のCRUD操作
Route::resource('/admin/article_tags', ArticlesTagController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
