<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Consts\CommonConst;

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

        $escapedName = '%' . addcslashes($name, '%_\\') . '%';
        $escapedEmail = '%' . addcslashes($email, '%_\\') . '%';

        $users = Member::orderBy('created_at', 'desc');
        if (!empty($escapedName)) {
            $users->where('name', 'like', "%$escapedName%");
        }
        if (!empty($escapedEmail)) {
            $users->where('email', 'like', "%$escapedEmail%");
        }

        $users = $users->paginate(CommonConst::PAGINATION_ADMIN);
        return view('admin.user_index', compact('users'));
    }
}
