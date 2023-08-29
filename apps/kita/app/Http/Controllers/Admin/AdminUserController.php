<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Consts\CommonConst;

class AdminUserController extends Controller
{
    /**
     * 管理者画面一覧と検索
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $lastName = $request->input('last_name');
        $firstName = $request->input('first_name');
        $email = $request->input('email');

        $escapedLastName = '%' . addcslashes($lastName, '%_\\') . '%';
        $escapedFirstName = '%' . addcslashes($firstName, '%_\\') . '%';
        $escapedEmail = '%' . addcslashes($email, '%_\\') . '%';

        $adminUsers = AdminUser::orderBy('created_at', 'desc');

        if (!empty($lastName)) {
            $adminUsers->where('last_name', 'like', $escapedLastName);
        }

        if (!empty($firstName)) {
            $adminUsers->where('first_name', 'like', $escapedFirstName);
        }

        if (!empty($email)) {
            $adminUsers->where('email', 'like', $escapedEmail);
        }

        $adminUsers = $adminUsers->paginate(CommonConst::PAGINATION_ADMIN);
        return view('admin.index', compact('adminUsers'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * 管理者追加処理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin_users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $adminUser = new AdminUser();
        $adminUser->fill([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $adminUser->save();

        return redirect()->route('admin_users.edit', $adminUser)->with('message', '登録処理が完了しました。');
    }

    public function edit(AdminUser $adminUser)
    {
        return view('admin.edit', compact('adminUser'));
    }

    public function update(Request $request, AdminUser $adminUser)
    {
        $validator = Validator::make($request->all(), [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('admin_users')->ignore($adminUser),
            ],
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin_users.create')->withErrors($validator)->withInput();
        }

        $adminUser->fill($request->all())->save();

        return redirect()->route('admin_users.edit', $adminUser)->with('message', '更新処理が完了しました。');
    }

    public function destroy(AdminUser $adminUser)
    {
        $adminUser->delete();
        return redirect()->route('admin_users.index')->with('message', '削除処理が完了しました');
    }
}
