<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $articles = Article::with('member')->orderBy('created_at', 'desc')->paginate(10);
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function show($id) {
        $article = Article::findOrFail($id);
        $comments = $article->comments()->with('article', 'member')->get();
        return view('articles.articles_show', compact('article', 'comments',));
    }

    /**
     * 編集ページへ遷移
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id) {
        $article = Article::findOrFail($id);
        return view('articles.articles_edit', compact('article'));
    }

    /**
     * 編集した記事をデータベースに上書き
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'contents' => 'required|max:400',
        ]);

        $article = Article::findOrFail($id);
        $article->fill($validated)->save();

        return redirect()->route('articles.edit', $article->id)->with('message', '記事編集が完了しました。');
    }

    /**
     * 記事の削除機能
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id) {
        $article = Article::findOrFail($id);
        if (Auth::id() === $article->member->id) {
            $article->delete();
            return redirect()->route('articles.index')->with('success', '記事が削除されました');
        } else {
            return redirect()->route('articles.index')->with('message', '投稿した本人ではありません');
        }
    }
}
?>
