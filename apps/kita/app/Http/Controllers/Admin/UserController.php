<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * 会員画面一覧と検索
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');

        $users = Member::orderBy('created_at', 'desc');
        if (!empty($name)) {
            $users->where('name', 'like', "%$name%");
        }
        if (!empty($email)) {
            $users->where('email', 'like', "%$email%");
        }

        $users = $users->paginate(5);
        return view('admin.user_index', compact('users'));
    }
}
