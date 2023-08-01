<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
class ArticlesController extends Controller
{
    public function index() {
        $member_id = auth()->id();
        $articles = Article::with('member')->paginate(10);
        return view('articles.articles', compact('articles'));
    }
    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $articles = Article::where('title', 'like', "%$keyword%")->orWhere('contents', 'like', "%$keyword%")->paginate(10);
        $articles->appends(['keyword' => $keyword]); // クエリ文字列を追加
        return view('articles.articles', compact('articles'));
    }

    /**
     * 記事投稿画面へ移動
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        return view('articles.articles_create');
    }

    /**
     * 記事を作成しデータベースに挿入
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $request->merge(['member_id' => auth()->id()]);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required|max:10000',
            'member_id' => 'required',
        ]);
        $article = new Article();
        $article->fill($validated)->save();
        //編集機能作成後にリダイレクト先を変更
        return redirect()->route('articles.create')->with('success', '記事投稿が完了しました。');
    }
}
?>
