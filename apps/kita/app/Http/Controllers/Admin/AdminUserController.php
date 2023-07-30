<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin_user;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * 管理者管理画面へ移動
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $email = $request->input('email');

        $admin_users = Admin_user::orderBy('created_at', 'desc');
        if (!empty($last_name)) {
            $admin_users->where('last_name', 'like', "%$last_name%");
        }

        if (!empty($first_name)) {
            $admin_users->where('first_name', 'like', "%$first_name%");
        }

        if (!empty($email)) {
            $admin_users->where('email', 'like', "%$email%");
        }

        $admin_users = $admin_users->paginate(5);
        return view('admin.index', compact('admin_users'));
        }
}
