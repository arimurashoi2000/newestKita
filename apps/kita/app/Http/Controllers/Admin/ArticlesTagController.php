<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article_tag;
use Illuminate\Http\Request;

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
}
