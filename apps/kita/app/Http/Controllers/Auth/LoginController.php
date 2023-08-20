<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        \Auth::guard('members')->logout();

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
        return redirect()->route('members.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo() {
        return route('articles.index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:members')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('members');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
