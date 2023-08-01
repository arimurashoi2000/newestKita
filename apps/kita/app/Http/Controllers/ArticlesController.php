<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
use App\Consts\CommonConst;

class ArticlesController extends Controller
{
    /**
     * 記事の一覧表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $paginationLimit = CommonConst::PAGINATION_ARTICLE;
        $articles = Article::with('member')->orderBy('created_at', 'desc')->paginate($paginationLimit);
        return view('articles.index', compact('articles'));
    }

}
