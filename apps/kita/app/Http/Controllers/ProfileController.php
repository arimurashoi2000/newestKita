<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Article;
use App\Consts\CommonConst;
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

    /**
     * 自分の書いた記事一覧表示機能
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $member = \Auth::user();
        $myArticle = Article::with('member')->orderBy('created_at', 'desc')->where('member_id', $member->id);

        $myArticle = $myArticle->paginate(CommonConst::PAGINATION_ARTICLE);
        return view('articles.mypage', compact('myArticle'));
    }

    /**
     * 複数の記事削除機能
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $articleNum = $request->input('myArticle');
        // $myArticle はカンマ区切りの文字列なので、explode() 関数を使用して配列に変換
        $articleId = explode(',', $articleNum);
        // 記事を削除
        Article::whereIn('id', $articleId)->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
