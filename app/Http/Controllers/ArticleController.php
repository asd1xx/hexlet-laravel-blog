<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $dataSearch = $request->input('search');

        if ($dataSearch) {
            $articles = Article::where('name', 'like', "%{$dataSearch}%")->get();
        } else {
            $articles = Article::paginate();
            // $articles = Article::all();
        }

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles', 'dataSearch'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(Request $request)
    {
        $dataRequest = $request->validate([
            'name' => 'required|unique:articles',
            'body' => 'required|min:5',
        ]);

        $article = new Article();
        $article->fill($dataRequest);
        $article->save();

        return redirect()->route('articles.index');
    }
}
