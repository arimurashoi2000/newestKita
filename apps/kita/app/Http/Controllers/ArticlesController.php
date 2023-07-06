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
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request) {
        $request->validate([
            'keyword' => ['regex:/^[^%#]+$/'],
        ]);
        $keyword = $request->input('keyword');
        $articles = Article::where('title', 'like', "%$keyword%")->orWhere('contents', 'like', "%$keyword%")->paginate(10);

        $articles->appends(['keyword' => $keyword]); // クエリ文字列を追加
        return view('articles.articles', compact('articles'));
    }



}
