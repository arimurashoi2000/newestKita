<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
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

// 会員登録ルート
Route::get('/member_registration', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/member_registration', [RegisterController::class, 'register']);
// ログインルート
Route::get('login', [LoginController::class, 'showLoginForm'])->name('members.loginForm');
Route::post('login', [LoginController::class, 'login'])->name('members.login');
// ログアウトルート
Route::post('logout', [LoginController::class, 'logout'])->name('members.logout');
//articles基本的なCRUD操作
Route::resource('articles', ArticlesController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
//コメント投稿機能
Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store')->middleware('auth:members');

Route::prefix('admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('admin.logout');

    Route::middleware('auth:admin_users')->group(function () {
        Route::resource('/admin_users', AdminUserController::class)->except(['show']);
    });

    Route::get('/users', [UserController::class, 'index'])->name('user.index');

    Route::resource('/article_tags', ArticlesTagController::class)->except(['show']);
});
