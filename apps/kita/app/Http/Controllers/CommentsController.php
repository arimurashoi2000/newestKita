<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class CommentsController extends Controller
{
    /**
     * コメント投稿機能
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $comments = new ArticleComment();
        $comments->member_id = Auth::id();
        $validated = $request->validate([
            'contents' => 'string|required|max:1000',
            'article_id' => 'required',
        ]);
        $comments->fill($validated)->save();
        $articleId = $validated['article_id'];
        return redirect()->route('articles.show', ['article' => $articleId, 'comments' => $comments])->with('message', 'コメントを投稿しました');
    }
}
