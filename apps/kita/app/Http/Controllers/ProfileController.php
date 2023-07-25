<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * マイページ編集ページへ遷移
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditProfilePage() {
        return view('articles.profile');
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $id = Auth::id();
        $member = Member::findOrFail($id);
        $member->name = $validated['name'];
        $member->email = $validated['email'];
        $member->save();

        return redirect()->route('profile.edit')->with('message', 'プロフィールを編集しました。');
    }
}
