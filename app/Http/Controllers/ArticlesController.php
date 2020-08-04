<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Showing articles page
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show article details
     * 
     * @param int $id
     * @return \Illuminate\View\View | abort
     */
    public function show($id)
    {
        $article = Article::find($id);
        if ($article == null) {
            abort(404, 'Sorry, that article was not found.');
        }
        return view('articles.show', ['article' => $article]);
    }
}
