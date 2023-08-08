<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Consts\CommonConst;
use App\Models\Article_tag;

class ArticlesController extends Controller
{
    public function __construct() {
        $this->middleware('auth:members')->except(['index', 'show']);
    }
    /**
     * 記事の一覧表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articles = Article::with('member')->orderBy('created_at', 'desc')->paginate(CommonConst::PAGINATION_ARTICLE);
        return view('articles.index', compact('articles'));
    }

    /**
     * 記事投稿画面へ移動
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $tags = Article_tag::orderBy('created_at', 'desc')->get();
        return view('articles.articles_create', compact('tags'));
    }

    /**
     * 記事を作成しデータベースに挿入
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->merge(['member_id' => auth()->id()]);
        //TODO 記事編集機能でvalidatorで切り出し済み
        $validated = $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required|max:10000',
            'member_id' => 'required',
            'tag_id' => 'array|max:5',
        ]);
        $article = new Article();
        $article->fill($validated)->save();

        // 選択されたタグのIDを中間テーブルに関連付ける
        if ($request->has('tag_id')) {
            $selectedTags = $request->input('tag_id');
            $article->tags()->attach($selectedTags);
        }

        //TODO 編集機能作成後にリダイレクト先を変更
        return redirect()->route('articles.create')->with('success', '記事投稿が完了しました。');
    }
}
