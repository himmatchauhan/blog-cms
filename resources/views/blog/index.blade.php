<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Laravel CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
        }
        .post-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .post-cover {
            height: 200px;
            object-fit: cover;
        }
        .admin-link {
            position: fixed;
            top: 20px;
            right: 20px;
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

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Welcome to Our Blog</h1>
            <p class="lead mb-4">Discover interesting articles, insights, and stories from our writers</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#posts" class="btn btn-light btn-lg">Read Posts</a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Admin Panel</a>
            </div>
        </div>
    </section>

    <!-- Posts Section -->
    <section id="posts" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="text-center mb-4">Latest Blog Posts</h2>
                </div>
            </div>

            @if($posts->count() > 0)
                <div class="row g-4">
                    @foreach($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="card post-card h-100">
                            @if($post->cover_image)
                                <img src="{{ $post->cover_image_url }}" class="card-img-top post-cover" alt="{{ $post->title }}">
                            @else
                                <div class="card-img-top post-cover bg-secondary d-flex align-items-center justify-content-center">
                                    <i class="fas fa-newspaper fa-3x text-white"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text text-muted">{{ $post->excerpt }}</p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                        </small>
                                        <span class="badge bg-success">Published</span>
                                    </div>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary w-100">
                                        Read More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
                    <h3 class="text-muted">No posts available</h3>
                    <p class="text-muted">Check back later for new content!</p>
                </div>
            @endif
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
