<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;

class ArticleController extends Controller
{
    public function index() {
    	$articles = Article::all();
    	return $articles;
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
    	Article::create($request->all());
    	return response()->json('The article successfully added');
    }

    public function edit($id) {
    	$article = Article::find($id);
    	return response()->json($article);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $article = Article::find($id)->update($request->all());
        return response()->json('The article successfully updated');
    } 

    public function delete($id) {
        $article = Article::find($id);
        $article->delete();
        return response()->json('The article successfully deleted');
    }
}
