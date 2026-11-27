<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol - LaravelÖdev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .brand-side {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        }
    </style>
</head>
<body>

<div class="container-fluid h-100 p-0">
    <div class="row g-0 h-100">
        <!-- Sol Karşılama Alanı -->
        <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-center text-white brand-side p-5">
            <div class="text-center" style="max-width: 440px;">
                <h1 class="display-5 fw-bold mb-3">LaravelÖdev</h1>
                <p class="lead text-white-50 mb-0">
                    Saniyeler içinde yeni bir hesap oluştur ve içeriklerini hemen yönetmeye başla.
                </p>
            </div>
        </div>

        <!-- Sağ Form Alanı -->
        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center bg-white p-4 p-sm-5">
            <div class="w-100" style="max-width: 420px;">
                <h2 class="fw-bold mb-1">Hesap Oluştur</h2>
                <p class="text-muted mb-4">Kayıt olmak için aşağıdaki alanları doldur.</p>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 small ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Ad Soyad</label>
                        <input type="text" id="name" name="name" class="form-control form-control-lg"
                               value="{{ old('name') }}" placeholder="Adınız Soyadınız" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">E-posta Adresi</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                               value="{{ old('email') }}" placeholder="ornek@mail.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Parola</label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg"
                               placeholder="En az 6 karakter" required>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Parola Tekrar</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="form-control form-control-lg" placeholder="Parolanızı tekrar girin" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100 fw-semibold">Kayıt Ol</button>
                </form>

                <div class="text-center mt-4">
                    <span class="text-muted">Zaten hesabın var mı?</span>
                    <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Giriş Yap</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
