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

    /**
     * Shows a view to create a new resource
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
    }

    /**
     * Persist the new resource
     * 
     * @return void
     */
    public function store()
    {
    }

    /**
     * Show a view to edit an existing resource
     * 
     * @return \Illuminate\View\View
     */
    public function edit()
    {
    }

    /**
     * Persist the edited resource
     * 
     * @return
     */
    public function update()
    {
    }

    /**
     * Delete the resource
     */
    public function destroy()
    {
    }
}
