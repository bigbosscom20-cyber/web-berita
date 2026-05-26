<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function show($slug)
    {
        $article = Article::with(['category', 'user.profile', 'tags'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('public.article', compact('article'));
    }
}