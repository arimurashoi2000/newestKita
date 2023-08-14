<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Consts\CommonConst;

class AdminUserController extends Controller
{
    /**
     * 管理者画面一覧と検索
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $email = $request->input('email');

        $escapedLastName = '%' . addcslashes($last_name, '%_\\') . '%';
        $escapedFirstName = '%' . addcslashes($first_name, '%_\\') . '%';
        $escapedEmail = '%' . addcslashes($email, '%_\\') . '%';

        $admin_users = AdminUser::orderBy('created_at', 'desc');

        if (!empty($last_name)) {
            $admin_users->where('last_name', 'like', "%$escapedLastName%");
        }

        if (!empty($first_name)) {
            $admin_users->where('first_name', 'like', "%$escapedFirstName%");
        }

        if (!empty($email)) {
            $admin_users->where('email', 'like', "%$escapedEmail%");
        }

        $admin_users = $admin_users->paginate(CommonConst::PAGINATION_ADMIN);
        return view('admin.index', compact('admin_users'));
        }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        return view('admin.register');
    }

    /**
     * 管理者追加処理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin_users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin_user = new AdminUser();
        $admin_user->fill([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $admin_user->save();

        return redirect()->route('admin_users.edit', compact('admin_user'))->with('message', '登録処理が完了しました。');
    }

        public function edit(AdminUser $admin_user) {
        return view('admin.edit', compact('admin_user'));
        }

        public function update(Request $request, AdminUser $admin_user) {
            $validator = Validator::make($request->all(), [
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('admin_users')->ignore($admin_user),
                ],
            ]);
            if ($validator->fails()) {
                return redirect()->route('admin_users.create')->withErrors($validator)->withInput();
            }

        $admin_user->fill($request->all())->save();

        return redirect()->route('admin_users.edit', $admin_user)->with('message', '更新処理が完了しました。');
        }

        public function destroy(AdminUser $admin_user) {
                $admin_user->delete();
                return redirect()->route('admin_users.index')->with('message', '削除処理が削除されました');
        }
}
