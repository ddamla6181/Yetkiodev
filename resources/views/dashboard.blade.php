@extends('layouts.app')

@section('title', 'Kullanıcı Paneli')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <div>
                        <h2 class="h4 fw-bold mb-1">Hesap Özeti</h2>
                        <p class="text-muted small mb-0">Sistem üzerindeki profil bilgilerin ve yetki düzeyin.</p>
                    </div>

                    @if(auth()->user()->role == 'admin')
                        <span class="badge bg-danger fs-6 px-3 py-2">Admin Yetkisi</span>
                    @elseif(auth()->user()->role == 'editor')
                        <span class="badge bg-warning text-dark fs-6 px-3 py-2">Editör Yetkisi</span>
                    @else
                        <span class="badge bg-primary fs-6 px-3 py-2">Standart Kullanıcı</span>
                    @endif
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small">Ad Soyad</div>
                            <div class="fw-semibold">{{ auth()->user()->name }}</div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small">E-posta</div>
                            <div class="fw-semibold">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small">Sistem Rolü</div>
                            <div class="fw-semibold text-uppercase">{{ auth()->user()->role }}</div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-dark px-4">
                        Yazıları Görüntüle →
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
