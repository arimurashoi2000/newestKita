<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminUserController;
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
//記事一覧機能
Route::get('/articles', [ArticlesController::class, 'index'])->name('index');
//記事検索機能
Route::get('/articles/search', [ArticlesController::class, 'search'])->name('articles.search');
//記事作成機能
Route::get('/articles/create', [ArticlesController::class, 'showCreatePage'])->name('articles.create');
Route::post('/articles', [ArticlesController::class, 'store'])->name('store');
//記事編集機能
Route::get('/articles/{id}/edit', [ArticlesController::class, 'showEditPage'])->name('articles.edit');
Route::post('/articles/{id}', [ArticlesController::class, 'update'])->name('update');
//記事詳細表示機能
Route::get('/articles/{id}', [ArticlesController::class, 'show'])->name('articles.show');
//コメント投稿機能
Route::post('/articles/{id}', [CommentsController::class, 'store'])->name('comments.store');
//記事削除機能
Route::delete('/artilces/{id}', [ArticlesController::class, 'delete'])->name('articles.delete');
//プロフィール編集ページに遷移
Route::get('/profile', [ProfileController::class, 'showEditProfilePage'])->name('profile.edit')->middleware('auth');
//プロフィール編集機能
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//管理者の認証機能
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm']);
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('admin.logout');
Route::get('/admin/admin_users/create', [App\Http\Controllers\Admin\RegisterController::class, 'showRegistrationForm']);
Route::post('/admin/admin_users', [App\Http\Controllers\Admin\RegisterController::class, 'register'])->name('admin.register');
Route::view('/admin/home', 'admin/home')->middleware('auth:admin_users');
//管理者画面の基本的なCRUD操作
Route::resource('/admin/admin_users', AdminUserController::class)->only(['index', 'edit', 'update'])->names([
    'index' => 'admin.index',
    'edit' => 'admin.edit',
    'update' => 'admin.update'
]);
Route::post('/admin/admin_users', [AdminUserController::class, 'index'])->name('admin.search');
