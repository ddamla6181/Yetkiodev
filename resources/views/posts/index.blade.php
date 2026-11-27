@extends('layouts.app')

@section('title', 'İçerik Yönetimi')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h1 class="h3 fw-bold mb-1">İçerik Yönetim Sistemi</h1>
            <p class="text-muted small mb-0">
                Aktif Rolün: <span class="badge bg-secondary text-uppercase">{{ auth()->user()->role }}</span>
            </p>
        </div>

        @can('create', App\Models\Post::class)
            <a href="{{ route('posts.create') }}" class="btn btn-primary fw-semibold">
                + Yeni İçerik Ekle
            </a>
        @endcan
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($posts->isEmpty())
        <div class="card shadow-sm p-5 text-center">
            <h5 class="text-muted mb-2">Henüz eklenmiş bir içerik bulunmuyor.</h5>
            @can('create', App\Models\Post::class)
                <div class="mt-2">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">İlk İçeriği Oluştur</a>
                </div>
            @endcan
        </div>
    @else
        <div class="row g-4">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="card shadow-sm h-100 d-flex flex-column">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $post->title }}</h5>
                            <p class="card-text text-secondary" style="white-space: pre-line;">{{ $post->content }}</p>
                        </div>

                        <div class="card-footer bg-white border-top-0 pt-0 pb-3 px-3 d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Yazar: <strong class="text-dark">{{ $post->user->name }}</strong>
                            </small>

                            <div class="d-flex gap-2">
                                @can('update', $post)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm fw-semibold">
                                        Düzenle
                                    </a>
                                @endcan

                                @can('delete', $post)
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="m-0"
                                          onsubmit="return confirm('Bu içeriği silmek istediğine emin misin?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm fw-semibold">
                                            Sil
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
