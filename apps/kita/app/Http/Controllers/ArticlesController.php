<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Validators\ArticleValidator;
class ArticlesController extends Controller
{
    //
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
    public function showCreatePage() {
        return view('articles.articles_create');
    }
    public function store(Request $request) {
        $validator = new ArticleValidator();
        $validatedData = $validator->validate($request->all());

        $article = new Article();
        $article->title = $validatedData['title'];
        $article->contents = $validatedData['contents'];
        $article->member_id = auth()->id();
        $article->save();
        return redirect()->route('index');
    }

    /**
     * 編集ページへ遷移
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article) {
        return view('articles.articles_edit', compact('article'));
    }

    /**
     * 編集した記事をデータベースに上書き
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $article) {
        $validator = new ArticleValidator();
        $validatedData = $validator->validate($request->all());

        if ($validatedData->fails()) {
            return redirect()->route("article.edit")->withErrors($validatedData->messages());
        }

        $articleModel = Article::findOrFail($article);
        $articleModel->fill($validatedData)->save();

        return redirect()->route('articles.edit', $articleModel->id)->with('message', '記事編集が完了しました。');
    }
}
