<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    /**
     * マイページ編集ページへ遷移
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditProfilePage()
    {
        $member = \Auth::user();
        return view('articles.profile', compact('member'));
    }

    /**
     * 編集したプロフィールを保存
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = Auth::id();
        $member = Member::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('members')->ignore($member->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.edit')->withErrors($validator)->withInput();
        }

        $member->fill($request->all())->save();

        return redirect()->route('profile.edit')->with('message', 'プロフィールを編集しました。');
    }
}
