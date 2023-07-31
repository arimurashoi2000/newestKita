<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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

        public function edit($id) {
        $admin_users = Admin_user::findOrFail($id);
        return view('admin.edit', compact('admin_users'));
        }

        public function update(Request $request, $id) {
            $admin_users = Admin_user::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('admin_users')->ignore($id),
                ],
            ]);
            if ($validator->fails()) {
                return redirect()->route('admin.edit')->withErrors($validator)->withInput();
            }

        $admin_users->fill($request->all())->save();

        return redirect()->route('admin.edit', ['admin_user' => $id])->with('message', '更新処理が完了しました。');
        }

        public function destroy($id) {
            $admin_users = Admin_user::findOrFail($id);
                $admin_users->delete();
                return redirect()->route('admin.index')->with('success', '記事が削除されました');
        }
}
