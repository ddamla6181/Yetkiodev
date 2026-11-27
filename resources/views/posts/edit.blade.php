@extends('layouts.app')

@section('title', 'İçerik Düzenle')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <h2 class="h4 fw-bold mb-0">İçerik Düzenleme</h2>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">
                        ← İçeriklere Geri Dön
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 small ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">İçerik Başlığı</label>
                        <input type="text" id="title" name="title" class="form-control"
                               value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold">İçerik</label>
                        <textarea id="content" name="content" class="form-control"
                                  rows="8" required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('posts.index') }}" class="btn btn-light">İptal</a>
                        <button type="submit" class="btn btn-warning px-4 fw-semibold">İçeriği Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
