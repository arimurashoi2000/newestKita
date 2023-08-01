<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article_tag;

class ArticlesTagController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->name;
        $search = addcslashes($search, '%_\\');
        if ($search === null) {
            $article_tags = Article_tag::orderBy('created_at', 'desc')->paginate(5);
            return view('admin.tag_index', compact('article_tags'));
        } else {
            $article_tags = Article_tag::where('name', 'like', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(5);
            return view('admin.tag_index', compact('article_tags'));
        }
    }
}
