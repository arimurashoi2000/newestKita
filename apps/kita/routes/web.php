<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;

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
//記事一覧機能・検索
Route::get('/articles', [ArticlesController::class, 'index'])->name('index');
//記事作成機能
Route::get('/articles/create', [ArticlesController::class, 'showCreatePage'])->name('articles.create');
Route::post('/articles', [ArticlesController::class, 'store'])->name('store');
//記事編集機能
Route::get('/articles/{id}/edit', [ArticlesController::class, 'showEditPage'])->name('articles.edit');
Route::post('/articles/{id}', [ArticlesController::class, 'update'])->name('update');
//記事詳細表示機能
Route::get('/articles/{id}', [ArticlesController::class, 'show'])->name('articles.show');
//コメント投稿機能
Route::post('/articles/{id}', [CommentsController::class, 'store'])->name('comments.store')->middleware('auth');
