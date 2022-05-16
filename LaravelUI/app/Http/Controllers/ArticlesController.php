<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::all();
        $categories = Category::all();

        return view('page.articles.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'category_id' => 'required',
        ]);
        $data = $request->all();

        $image = $request->file('image');
        $image->storeAs('public/article', $image->hashName());

        $data['image'] = $image->hashName();
        $data['user_id'] = Auth::id();

        $article = Articles::create($data);
        if ($article) {
            Alert::success('Success add article');
            return redirect()->route('article.index');
        } else {
            Alert::error('Error');
            return redirect()->route('article.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $article = Articles::findOrFail($id);
        return view('page.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->all();

        $article = Articles::findOrFail($id);

        if (!$request->file('image')) {
            $data['image'] = $article->image;
            $update = $article->update($data);
        } else {
            $image = $request->file('image');
            Storage::delete('public/article/' . $article->image);
            $image->storeAs('public/article', $image->hashName());
            $data['image'] = $image->hashName();
            $update = $article->update($data);
        }
        if ($update) {
            Alert::success('Success update article');
        }
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        Storage::delete('public/article/' . $article->image);
        $delete = $article->delete();
        if ($delete) {
            Alert::success('Success delete article');
        }
        return redirect()->route('article.index');
    }
}
