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
}
