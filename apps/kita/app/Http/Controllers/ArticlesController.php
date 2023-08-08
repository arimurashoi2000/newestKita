<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Consts\CommonConst;

class ArticlesController extends Controller
{
    /**
     * 記事の一覧表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $articles = Article::with('member')->orderBy('created_at', 'desc')->paginate(CommonConst::PAGINATION_ARTICLE);
        return view('articles.index', compact('articles'));
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $articles = Article::where('title', 'like', "%$keyword%")->orWhere('contents', 'like', "%$keyword%")->paginate(10);
        $articles->appends(['keyword' => $keyword]); // クエリ文字列を追加
        return view('articles.articles', compact('articles'));
    }
    public function showCreatePage() {
        return view('articles.articles_create');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'contents' => 'required|max:400',
        ]);
        $article = new Article();
        $article->title = $validated['title'];
        $article->contents = $validated['contents'];
        $article->member_id = auth()->id();
        $article->save();
        return redirect()->route('index');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
        return view('articles.articles_edit', compact('article'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'contents' => 'required|max:400',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $validated['title'];
        $article->contents = $validated['contents'];
        $article->save();

        return redirect()->route('articles.edit', $article->id)->with('message', '編集しました。');;
    }

    /**
     * 記事詳細画面を表示する
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Article $article) {
        return view('articles.articles_show', compact('article'));
    }
}
