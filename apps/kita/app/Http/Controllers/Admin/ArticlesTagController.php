<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;
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
        $escapedSearch = '%' . addcslashes($search, '%_\\') . '%';

        if (!empty($escapedSearch)) {
            $articleTags = ArticleTag::where('name', 'like', $escapedSearch)->orderBy('created_at', 'desc')->paginate(CommonConst::PAGINATION_ADMIN);
            return view('admin.tag_index', compact('articleTags'));
        } else {
            $articleTags = ArticleTag::orderBy('created_at', 'desc')->paginate(CommonConst::PAGINATION_ADMIN);
            return view('admin.tag_index', compact('articleTags'));
        }
    }

    /**
     * タグ作成ページへ遷移
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.tag_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20|unique:article_tags',
        ]);
        $articleTag = new ArticleTag;
        $articleTag->fill($validated)->save();

        return redirect()->route('article_tags.edit', $articleTag)->with('message', '登録処理が完了しました');
    }

    /**
     * タグ編集ページへ遷移
     * @param ArticleTag $articleTag
     * @param $articleTags
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ArticleTag $articleTag)
    {
        return view('admin.tag_edit', compact('articleTag'));
    }

    public function update(Request $request, ArticleTag $articleTag)
    {

        $validator = Validator::make($request->all(), [
            'name' => [
            'required',
            'max:20',
            Rule::unique('article_tags')->ignore($articleTag->id),
        ]]);

        $validated = $validator->validated();
        $articleTag->fill($validated)->save();

        return redirect()->route('article_tags.edit', $articleTag)->with('message', '編集処理が完了しました');
    }

    public function destroy(ArticleTag $articleTag)
    {
        $articleTag->articles()->detach();
        $articleTag->delete();
        return redirect()->route('article_tags.index')->with('message', '削除処理が完了しました');
    }
}
