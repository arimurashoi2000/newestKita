<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticlesController;
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
//ミドルウェアが必要ないarticlesのCRUD操作
Route::resource('articles', ArticlesController::class)->only(['index'])
    ->names([
        'index' => 'articles.index'
    ]);
//記事検索機能
Route::get('/articles/search', [ArticlesController::class, 'search'])->name('articles.search');
//articlesのミドルウェアが必要なCRUD操作
Route::middleware('auth')->resource('articles', ArticlesController::class)->only(['create', 'store', 'edit', 'update'])
    ->names([
        'create' => 'articles.create',
        'store' => 'store',
        'edit' => 'articles.edit',
        'update' => 'update',
    ]);
