<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Article_comment;

class CommentsController extends Controller
{
    //
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($id) {
        $article = Article::findOrFail($id);
        $comments = $article->Comment::with('article', 'member')->paginate(10);
        return view('articles.show', compact('comments', 'article'));
    }

}
