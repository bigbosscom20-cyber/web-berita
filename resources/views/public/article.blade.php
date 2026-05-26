<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Web Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="mb-3">{{ $article->title }}</h1>
                <p class="text-muted mb-2">
                    <i class="fas fa-folder"></i> {{ $article->category->name }} |
                    <i class="fas fa-tags"></i>
                    @foreach($article->tags as $tag)
                        <span class="badge bg-secondary me-1">#{{ $tag->name }}</span>
                    @endforeach
                </p>
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded mb-4" alt="Sampul Berita">
                @endif
                <div class="content mb-4">
                    {!! nl2br(e($article->content)) !!}
                </div>
                <hr>
                <div class="card mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Tentang Penulis</h5>
                    </div>
                    <div class="card-body">
                        <h5>{{ $article->user->name }}</h5>
                        <p><strong>Telepon:</strong> {{ $article->user->profile->phone ?? '-' }}</p>
                        <p><strong>Biografi:</strong> {{ $article->user->profile->bio ?? 'Penulis belum mengisi biografi.' }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ url('/') }}" class="btn btn-primary">← Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>