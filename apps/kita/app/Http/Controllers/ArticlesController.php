<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
class ArticlesController extends Controller
{
    /**
     * 一覧表示と検索
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $search = $request->input('search');

        $articles = Article::with('member')->orderBy('created_at', 'desc');

        if (!empty($search)) {
            $articles->where('title', 'like', "%$search%")->OrWhere('contents', 'like', "%$search%");
        }

        $articles = $articles->paginate(10);
        return view('articles.articles', compact('articles'));
    }
}
