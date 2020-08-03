<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show($id)
    {
        $article = Article::find($id);
        if ($article == null) {
            abort(404, 'Sorry, that article was not found.');
        }
        return view('articles.show', ['article' => $article]);
    }
}
