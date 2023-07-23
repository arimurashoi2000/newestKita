<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;

class ArticlesController extends Controller
{
    /**
     * 記事の一覧表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $article_num = 10;
        $articles = Article::with('member')->orderBy('created_at', 'desc')->paginate($article_num);
        return view('articles.index', compact('articles'));
    }

}
