<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin_user;

class AdminUserController extends Controller
{
    /**
     * 管理者管理画面へ移動
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $admin_users = Admin_user::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.index', compact('admin_users'));
    }
}
