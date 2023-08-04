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
}
