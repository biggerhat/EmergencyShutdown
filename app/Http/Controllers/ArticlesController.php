<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    /**
     * ArticlesController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create', 'edit']]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
  {
    $articles = Article::latest('published_at')->latest('id')->published()->paginate(5);
    return view('articles.index', compact('articles'));
  }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
  {
    $article = Article::findOrFail($id);

    return view('articles.show', compact('article'));
  }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
  {
    $tags = Tag::lists('name', 'id');
    return view('articles.create', compact('tags'));
  }

  /**
  *
  * Save a new article.
  *
  *@return Response
  */
  public function store(ArticleRequest $request)
  {
    $article = Auth::user()->articles()->create($request->all()); //sets user_id and saves article
      $article->tags()->attach($request->input('tag_list')); //set tags on the article.
    flash('Your article has been published!')->important();
    return redirect('articles');
  }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
  {
    $article = Article::findOrFail($id);

    $tags = Tag::lists('name', 'id');
    return view('articles.edit', compact('article', 'tags'));
  }

    /**
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ArticleRequest $request)
  {
    $article = Article::findOrFail($id);

    $article->update($request->all());
    $article->tags()->sync($request->input('tag_list'));

    return redirect('articles');
  }
}
