<?php

namespace App\Http\Controllers;


use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Events\Validated;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Artikel::orderBy('id', 'desc')->get();

        return view('admin.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_article');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request['slug']) {
            $request['slug'] = Str::slug($request->title);
        }

        $article = $request->validate([
            'title' => 'required|unique:artikels|max:123',
            'slug' => 'unique:artikels',
            'thumbnail' => 'required|unique:artikels|mimes:jpeg,png,jpg,gif,svg,jfif,webp',
            'description' => 'required',
        ]);

        if ($request->thumbnail) {
            $new_name = Str::uuid()->toString() . date('H-i-s') . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('uploads'), $new_name);
            $article['thumbnail'] = $new_name;
        }

        Artikel::create($article);

        return redirect()->route('article.admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Artikel $artikel, $slug)
    {
        $article = Artikel::where('slug', $slug)->firstOrFail();
        return view('admin.update_article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel, $slug)
    {
        $data = Artikel::where('slug', $slug)->firstOrFail();
        if (!$request['slug']) {
            $request['slug'] = Str::slug($request->title);
        }

        $article = $request->validate([
            'title' => 'required|unique:artikels,title,' . $data->id . '|max:123',
            'slug' => 'unique:artikels,title,' . $data->id,
            'thumbnail' => 'mimes:jpeg,png,jpg,gif,svg,jfif,webp|max:1024',
            'description' => 'required',
        ]);

        if ($request->thumbnail) {

            $thumbnail = public_path('uploads/' . $data->thumbnail);
            if (File::exists($thumbnail)) {
                File::delete($thumbnail);
            }

            $new_name = Str::uuid()->toString() . date('H-i-s') . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('uploads'), $new_name);
            $article['thumbnail'] = $new_name;
        }

        Artikel::where('slug', $slug)->update($article);

        return redirect()->route('article.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel, $slug)
    {
        $article = Artikel::where('slug', $slug)->firstOrFail();

        $thumbnail = public_path('uploads/' . $article->thumbnail);
        if (File::exists($thumbnail)) {
            File::delete($thumbnail);
        }
        $article->delete();

        return redirect()->route('article.admin.index');
    }
}
