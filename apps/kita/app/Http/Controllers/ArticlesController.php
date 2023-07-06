<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;

class ArticlesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $articles = Article::with('member')->orderBy('created_at', 'desc')->paginate(10);
        return view('articles.articles', compact('articles'));
    }

}
