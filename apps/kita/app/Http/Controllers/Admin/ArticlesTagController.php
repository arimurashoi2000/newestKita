<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article_tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Consts\CommonConst;
class ArticlesTagController extends Controller
{
    /**
     * タグ一覧と検索
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('name');
        $escapedSearch = addcslashes($search, '%_\\');
        if (!empty($escapedSearch)) {
            $article_tags = Article_tag::where('name', 'like', '%' . $escapedSearch . '%')->orderBy('created_at', 'desc')->paginate(CommonConst::PAGINATION_ADMIN);
            return view('admin.tag_index', compact('article_tags'));
        } else {
            $article_tags = Article_tag::orderBy('created_at', 'desc')->paginate(CommonConst::PAGINATION_ADMIN);
            return view('admin.tag_index', compact('article_tags'));
        }
    }

    /**
     * タグ作成ページへ遷移
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        return view('admin.tag_create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:20|unique:article_tags',
        ]);
        $article_tag = new Article_tag;
        $article_tag->fill($validated)->save();

        return redirect()->route('article_tags.edit', $article_tag)->with('message', '登録処理が完了しました');
    }

    /**
     * タグ編集ページへ遷移
     * @param Article_tag $article_tag
     * @param $article_tags
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article_tag $article_tag) {
        return view('admin.tag_edit', compact('article_tag'));
    }

    public function update(Request $request, Article_tag $article_tag) {

        $validator = Validator::make($request->all(), [
            'name' => [
            'required',
            'max:20',
            Rule::unique('article_tags')->ignore($article_tag->id),
        ]]);

        $validated = $validator->validated();
        $article_tag->fill($validated)->save();

        return redirect()->route('article_tags.edit', compact('article_tag') )->with('message', '編集処理が完了しました');
    }

    public function destroy(Article_tag $article_tag) {
        $article_tag->articles()->detach();
        $article_tag->delete();
        return redirect()->route('article_tags.index')->with('message', '削除処理が完了しました');
    }
}
