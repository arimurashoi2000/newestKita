<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article_tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class ArticlesTagController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->name;
        $search = addcslashes($search, '%_\\');
        if ($search === null) {
            $article_tags = Article_tag::orderBy('created_at', 'desc')->paginate(5);
            return view('admin.tag_index', compact('article_tags'));
        } else {
            $article_tags = Article_tag::where('name', 'like', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(5);
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
            'tag_name' => 'required|max:20|'
        ]);
        $article_tag = new Article_tag;
        $article_tag->name = $validated['tag_name'];
        $article_tag->save();
        //タグ編集機能を実装後にリダイレクト先を変更
        return redirect()->route('tag.create')->with('message', '登録処理が完了しました');
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

        return redirect()->route('tag.edit', compact('article_tag') )->with('message', '編集処理が完了しました');
    }

    public function destroy(Article_tag $article_tag) {
        $article_tag->detach();
        $article_tag->delete();
        return redirect()->route('tag.index')->with('success', '削除処理が完了しました');
    }
}
