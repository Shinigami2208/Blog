<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\article\createArticle;
use App\Models\article\Article;

class ArticleController extends Controller
{
    //
    public function update(Request $request){
        $article = Article::findOrFail($request->id);
        $article->fill($request->all());
        $article->save();
        return response()->json($request->id);
    }

    public function create(createArticle $request){
        // $article = new Article();
        // $article->fill($request->all());
        // $article->save();
        Article::Create($request->all());
        return redirect()->route('showListArticle');
    }

    public function delete(Request $request){
        $article = Article::findOrFail($request->id);
        $article->delete();
        return response()->json($request->id);
    }

    public function showForm(){
        return view('article.create');
    }

    public function listPage(Request $request){
        $key = $request->input('keyword');
        $articles = Article::where('title', 'like', '%'.$key.'%')->paginate(3);
        // sleep(1);

        return response()->json($articles);

        // return  view('article.list',['articles' => $articles]);
    }

    public function showListPage(Request $request){
        return view('article.list');
    }

    public function showEditForm(Request $request, $id){
        return view(
            'article.edit',
            [
                'article' => Article::findOrFail($id)
            ]
        );
    }

    public function showDetail(Request $request, $id){

        $article = Article::findOrFail($id);

        $comments = $article->comments()->paginate(1);

        return view(
            'article.detail',
            [
                'article' => Article::findOrFail($id),
                'comments' => $comments
            ]
        );
    }
}
