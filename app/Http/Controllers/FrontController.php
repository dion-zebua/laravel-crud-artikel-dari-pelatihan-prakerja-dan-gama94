<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $articles = Artikel::orderBy('id', 'desc')->get();

        return view('index', compact('articles'));
    }

    public function single_article($slug)
    {
        $all_articles = Artikel::orderBy('id', 'desc')->limit(6)->get();
        $single_article = Artikel::where('slug', $slug)->firstOrFail();

        return view('single_article', compact(['all_articles', 'single_article']));
    }
}
