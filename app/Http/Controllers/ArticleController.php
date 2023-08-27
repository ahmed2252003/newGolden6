<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    //** special function */
    public function sayHello()
    {
        return 'Hello';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Query builder ---> table
        // Object Rerational Mapping  --> Model
        // $articles = Article::all();
        $articles = Article::paginate(4);
        // dd($articles);
        // return view('articles.index', []);
        return view('dashboard.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd(request('title'));

        $validated = $request->validate([
            'title'     => ['required', 'string', 'min:5', 'max:15'],//'required|string|min:5|max:15', // 
            'content'   => ['required', 'string', 'min:15', 'max:150'],//'required|string|min:5|max:15', // 

        ]);

        Article::create(
            [
                'title'     => request('title'),
                'content'   => request('content'),
                'status'    => 1,
                'user_id'   => 1
            ]
        );

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // $article = Article::findOrFail($article->id);
        // dd($article->content);
        return view('dashboard.articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
