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
    public function show(Article $article)
    {
        if ($article == null) {
            abort(404, 'Sorry, that article was not found.');
        }
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Shows a view to create a new resource
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Persist the new resource
     * 
     * @return void
     */
    public function store()
    {
        request()->validate([
            'title'   => 'required',
            'excerpt' => 'required',
            'body'    => 'required'
        ]);

        Article::create([
            'title'   => request('title'),
            'excerpt' => request('excerpt'),
            'body'    => request('body')
        ]);
        return redirect('/articles');
    }

    /**
     * Show a view to edit an existing resource
     * 
     * @param int $id
     * 
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Persist the edited resource
     * 
     * @param int $id
     * 
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        request()->validate([
            'title'   => 'required',
            'excerpt' => 'required',
            'body'    => 'required'
        ]);

        $article = Article::findOrFail($id);

        $article->title   = request('title');
        $article->excerpt = request('excerpt');
        $article->body    = request('body');
        $article->save();

        return redirect('/articles/' . $article->id);
    }

    /**
     * Delete the resource
     */
    public function destroy()
    {
    }
}
