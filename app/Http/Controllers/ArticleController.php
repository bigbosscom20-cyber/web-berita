<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'user.profile', 'tags'])->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'category_id'=> 'required|exists:categories,id',
            'content'    => 'required|string',
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'tags'       => 'nullable|array',
            'tags.*'     => 'exists:tags,id',
        ], [
            'image.required' => 'Gambar sampul berita wajib diunggah.',
            'image.image'    => 'Berkas harus berupa gambar.',
            'image.mimes'    => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, webp.',
            'image.max'      => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Simpan gambar ke storage/app/public/articles
        $imagePath = $request->file('image')->store('articles', 'public');

        $article = Article::create([
            'user_id'     => Auth::id(),
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . time(),
            'content'     => $request->content,
            'image'       => $imagePath,
        ]);

        if ($request->has('tags')) {
            $article->tags()->attach($request->tags);
        }

        return redirect()->route('articles.index')
            ->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'category_id'=> 'required|exists:categories,id',
            'content'    => 'required|string',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'tags'       => 'nullable|array',
            'tags.*'     => 'exists:tags,id',
        ]);

        $imagePath = $article->image;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . $article->id,
            'content'     => $request->content,
            'image'       => $imagePath,
        ]);

        // Sinkronisasi tags (hapus yang tidak dipilih, tambah yang baru)
        $article->tags()->sync($request->tags ?? []);

        return redirect()->route('articles.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        // Hapus file gambar dari storage
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        return redirect()->route('articles.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}