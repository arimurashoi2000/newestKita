<?php
namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Member;
class ArticlesController extends Controller
{
    //

    $validated['member_id'] = auth()->id():
    public function index() {
        $articles = Article::paginate(10);
        return view('articles.articles', compact('articles'));
    }
    public function member() {
        return $this->belognsTo(Article::class);
    }
}
