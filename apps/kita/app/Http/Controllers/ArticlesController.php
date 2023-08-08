<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Consts\CommonConst;

class ArticlesController extends Controller
{

    /**
     * 一覧表示と検索
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $escapedSearch = '%' . addcslashes($search, '%_\\') . '%';
        $articles = Article::with('member')->orderBy('created_at', 'desc');

        if (!empty($escapedSearch)) {
            $articles->where('title', 'like', "%$escapedSearch%")->OrWhere('contents', 'like', "%$escapedSearch%");
        }

        $articles = $articles->paginate(CommonConst::PAGINATION_ARTICLE);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.articles_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'contents' => 'required|max:400',
        ]);
        $article = new Article();
        $article->title = $validated['title'];
        $article->contents = $validated['contents'];
        $article->member_id = auth()->id();
        $article->save();
        return redirect()->route('articles.edit', $article)->with('message', '記事投稿が完了しました');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $comments = $article->comments()->with('article', 'member')->get();
        return view('articles.articles_show', compact('article', 'comments',));
    }

    /**
     * 編集ページへ遷移
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.articles_edit', compact('article'));
    }

    /**
     * 編集した記事をデータベースに上書き
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
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
    public function destroy(Article $article)
    {
        if (Auth::id() === $article->member->id) {
            $article->delete();
            return redirect()->route('articles.index')->with('message', '記事が削除されました');
        } else {
            return redirect()->route('articles.index')->with('error', '投稿した本人ではありません');
        }
    }
}
