<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // İçerikleri listele
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    // İçerik ekleme sayfası
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('posts.create');
    }

    // İçerik kaydet
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'İçerik başarıyla eklendi.');
    }

    // İçerik düzenleme sayfası
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    // İçerik güncelle
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'İçerik başarıyla güncellendi.');
    }

    // İçerik sil
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'İçerik silindi.');
    }
}
