<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Validators\ArticleValidator;
use App\Consts\CommonConst;
use App\Models\ArticleTag;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:members')->except(['index', 'show']);
    }

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

    /**
     * 記事投稿画面へ移動
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $tags = ArticleTag::orderBy('created_at', 'desc')->get();
        return view('articles.articles_create', compact('tags'));
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validator = new ArticleValidator();
        $validatedData = $validator->validate($request->all());
        $validatedData['member_id'] = auth()->id();

        $article = new Article();
        $article->fill($validatedData)->save();

        // 選択されたタグのIDを中間テーブルに関連付ける
        if ($request->has('tag_id')) {
            $selectedTags = $request->input('tag_id');
            $article->tags()->attach($selectedTags);
        }

        return redirect()->route('articles.edit', compact('article'))->with('message', '記事登録が完了しました。');
    }

    /**
     * 編集ページへ遷移
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article) {
        $tags = ArticleTag::orderBy('created_at', 'desc')->get();
        return view('articles.articles_edit', compact('article', 'tags'));
    }

    /**
     * 編集した記事をデータベースに上書き
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article) {
        if (auth()->guard('members')->check() && auth()->id() == $article->member_id) {
            $validator = new ArticleValidator();
            $validatedData = $validator->validate($request->all());
            $article->fill($validatedData)->save();

            // 選択されたタグのIDを中間テーブルに関連付ける
            if ($request->has('tag_id')) {
                $selectedTags = $request->input('tag_id');
                $article->tags()->sync($selectedTags);
            }

            return redirect()->route('articles.edit', $article)->with('message', '記事編集が完了しました。');
        } else {
            return redirect()->route('articles.show', $article)->with('error', '他人の記事は編集できません。');
        }
    }

    /**
     * 記事詳細画面を表示する
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Article $article) {
        $tags = $article->tags;
        $comments = $article->comments;
        return view('articles.articles_show',compact('article', 'tags', 'comments'));
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
