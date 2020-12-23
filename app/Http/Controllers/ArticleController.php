<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware("auth");
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy("id", "desc")->paginate(5);
        return view("article.index", compact('articles'))->render();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("article.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "og_photo" => "mimes:png,jpg,jpeg"
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;

        $dir = "public/photo";
        $file = $request->file('og_photo');
        $fileName = uniqid() . "_" . $file->getClientOriginalName();
        Storage::putFileAs($dir, $file, $fileName);

        $article->og_photo = $fileName;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->user_id = Auth::id();
        $article->save();
        return redirect()->route("article.create")->with('status', '<p class="alert alert-success">Article is created successfully</p>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function aaa($a)
    {
        unlink("storage/photo/" . $a);
    }
    public function update(Request $request, Article $article)
    {
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        if ($request->hasFile('og_photo')) {
            $this->aaa($article->og_photo);
            $file = $request->file('og_photo');
            $dir = "public/photo";
            $fileName = uniqid() . "_" . $file->getClientOriginalName();
            Storage::putFileAs($dir, $file, $fileName);
            $article->og_photo = $fileName;
        }
        $article->category_id = $request->category_id;
        $article->update();
        return redirect()->route("article.show", $article->id)->with('edit-status', "<p class='alert alert-success'>Successfully Edited</p>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
