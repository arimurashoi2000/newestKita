<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function logout(Request $request)
    {
        \Auth::guard('admin_users')->logout();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * ログアウト機能
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loggedOut(Request $request)
    {
        return redirect()->route('showLoginForm');
    }

    /**
     * ログイン後は管理者一覧画面に遷移
     * @return string
     */
    protected function redirectTo() {
        return route('admin_users.index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin_users')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin_users');
    }

    /**
     * 管理者側のログイン画面へ遷移
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }
}
