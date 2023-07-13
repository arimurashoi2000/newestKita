<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Article_comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //
    public function store(Request $request) {
        $validated = $request->validate([
            'contents' => 'string|required|max:100',
            'article_id' => 'required',
        ]);
        $comment = new Article_comment();
        $comment->contents = $validated['contents'];
        $comment->member_id = Auth::id();
        $comment->article_id = $validated['article_id'];
        $comment->save();
        return redirect()->route('articles.show', $comment->article_id);
    }


}
