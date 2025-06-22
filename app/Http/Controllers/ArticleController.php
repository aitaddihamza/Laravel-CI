<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::create($request->only('title', 'content'));
        return response()->json($article, 201);
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }


    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $article->update($request->only('title', 'content'));

        return response()->json($article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(['article was deleted successfly'], 200);
    }

    public function comments(Article $article)
    {
        // some fake test comments
        $comments = [
            ['id' => 1, 'article_id' => $article->id, 'content' => 'This is a comment on article ' . $article->id],
            ['id' => 2, 'article_id' => $article->id, 'content' => 'Another comment on article ' . $article->id],
        ];
        return response()->json($comments);
    }

    public function price(Article $article)
    {
        // some fake price data
        $price = [
            'article_id' => $article->id,
            'price' => rand(10, 100) // random price between 10 and 100
        ];
        return response()->json($price);
    }

}
