<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    /**
     * パスワードを更新する機能
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request) {
        $member = Auth::user();

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.edit')->withErrors($validator)->withInput();
        }

        $member->password = Hash::make($request->input('password'));
        $member->save();

        return redirect()->route('profile.edit')->with('success', 'パスワードを変更しました。');
    }
}
