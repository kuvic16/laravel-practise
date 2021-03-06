<?php

namespace App\Http\Controllers;

use App\Article;
use App\Services\UserService;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Showing articles page
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = [];
        if (request('tag')) {
            $tag = Tag::where('name', request('tag'))->first();
            if ($tag) $articles = $tag->articles;
        } else {
            $articles = Article::latest()->get();
        }
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
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Persist the new resource
     * 
     * @return void
     */
    public function store()
    {
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }

    /**
     * Show a view to edit an existing resource
     * 
     * @param int $id
     * 
     * @return \Illuminate\View\View
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Persist the edited resource
     * 
     * @param int $id
     * 
     * @return \Illuminate\View\View
     */
    public function update(Article $article)
    {
        $article->update($this->validateArticle());
        //return redirect(route('articles.show', $article));
        return redirect($article->path());
    }

    /**
     * Delete the resource
     */
    public function destroy()
    {
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title'   => 'required',
            'excerpt' => 'required',
            'body'    => 'required',
            'tags'    => 'exists:tags,id'
        ]);
    }
}
