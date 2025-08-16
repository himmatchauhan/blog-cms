<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
        }
        .post-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }
        .post-content p {
            margin-bottom: 1.5rem;
        }
        .post-content h2, .post-content h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .post-meta {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
        }
        .admin-link {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        .back-link {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Admin Link -->
    <div class="admin-link">
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
            <i class="fas fa-user-shield"></i> Admin
        </a>
    </div>

    <!-- Back Link -->
    <div class="back-link">
        <a href="{{ route('blog.index') }}" class="btn btn-outline-light btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Blog
        </a>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-5 fw-bold mb-3">{{ $post->title }}</h1>
                    <p class="lead mb-4">{{ $post->short_description }}</p>
                    <div class="d-flex justify-content-center align-items-center gap-4 text-light">
                        <span>
                            <i class="fas fa-calendar-alt me-2"></i>
                            {{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}
                        </span>
                        <span>
                            <i class="fas fa-user me-2"></i>
                            Admin
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Post Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Cover Image -->
                    @if($post->cover_image)
                    <div class="text-center mb-4">
                        <img src="{{ $post->cover_image_url }}" alt="{{ $post->title }}" class="img-fluid rounded shadow" style="max-height: 400px;">
                    </div>
                    @endif

                    <!-- Post Meta -->
                    <div class="post-meta mb-4">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <strong>Published:</strong><br>
                                <span class="text-muted">{{ $post->published_at ? $post->published_at->format('M d, Y \a\t g:i A') : $post->created_at->format('M d, Y \a\t g:i A') }}</span>
                            </div>
                            <div class="col-md-4">
                                <strong>Reading Time:</strong><br>
                                <span class="text-muted">{{ ceil(str_word_count($post->content) / 200) }} min read</span>
                            </div>
                            <div class="col-md-4">
                                <strong>Status:</strong><br>
                                <span class="badge bg-success">Published</span>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="post-content">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    <!-- Post Footer -->
                    <div class="border-top pt-4 mt-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Blog
                            </a>
                            <div class="text-muted">
                                <small>Last updated: {{ $post->updated_at->format('M d, Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Laravel Blog CMS. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
