<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
class ArticlesController extends Controller
{
    //

    public function index() {
        $member_id = auth()->id();
        $articles = Article::with('member')->paginate(10);
        return view('articles.articles', compact('articles'));
    }

    /**
     * タイトルや内容で検索をします。
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request) {
        $search = $request->input('search');
        $escapedSearch = '%' . addcslashes($search, '%_\\') . '%';
        $articles_num = 10;
        $articles = Article::where('title', 'like', $escapedSearch)->orWhere('contents', 'like', $escapedSearch)->paginate($articles_num);
        $articles->appends(['search' => $search]); // クエリ文字列を追加
        return view('articles.articles', compact('articles'));
    }
}
