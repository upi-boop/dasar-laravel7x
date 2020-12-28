<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->paginate(8);

        return view('article.index', compact('articles'));
    }

    public function show($title)
    {
        $article = Article:: where('title',$title)->first();

        if($article == NULL)abort(404);

        return view('article.single', compact('article'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function Store(Request $request)
    {


        $request->validate([
            'thumbnail' => 'mimes:jpeg,png,jpg',
            'title' => 'required|max:255',
            'subject' => 'required',
        ]);
    

        $imgName = $request->thumbnail->getClientOriginalName(). '-' . time(). '.' .$request->thumbnail->extension();

         $request->thumbnail->move(public_path('image'), $imgName);

            Article::create([
                
            'title' => $request->title,
           
            'subject' => $request->subject,
            'thumbnail' => $imgName

            ]);

            return redirect('/article');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('article.edit', compact('article'));
    }
    
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|max:255',
            'subject' => 'required',
        ]);


        $imgName=null;
    if($request->thumbnail){
        $imgName = $request->thumbnail->getClientOriginalName(). '-' . time(). '.' .$request->thumbnail->extension();

        $request->thumbnail->move(public_path('image'), $imgName);

    }

        Article::find($id)->update([

            'title' => $request->title,
            'subject' => $request->subject,
            'thumbnail' => $imgName


        ]);

        return redirect('/article');
    }

    public function destroy($id)
    {
        
        Article::find($id)->delete();
        
        return redirect('/article');
    }
}
