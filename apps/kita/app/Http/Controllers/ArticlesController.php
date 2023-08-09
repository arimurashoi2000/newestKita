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
     * 一覧表示と検索
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $search = $request->input('search');
        $escapedSearch = '%' . addcslashes($search, '%_\\') . '%';
        $articles = Article::with('member')->orderBy('created_at', 'desc');

        if (!empty($escapedSearch)) {
            $articles->where('title', 'like', "%$escapedSearch%")->OrWhere('contents', 'like', "%$escapedSearch%");
        }

        $articles = $articles->paginate(CommonConst::PAGINATION_ARTICLE);
        return view('articles.index', compact('articles'));
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

    public function showEditPage($id) {
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

        return redirect()->route('articles.edit', ['id' => $article->id])->with('message', '編集しました。');;
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

    public function delete($id) {
        $article = Article::findOrFail($id);
        if (Auth::id() === $article->member->id) {
            $article->delete();
            return redirect()->route('index')->with('success', '記事が削除されました');
        } else {
            return view('index')->with('message', '投稿した本人ではありません');
        }
    }
}
