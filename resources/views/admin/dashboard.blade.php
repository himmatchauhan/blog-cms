@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Admin Dashboard</h2>
                </div>
                <div class="card-body">
                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Posts</h5>
                                    <h2>{{ $totalPosts }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Published</h5>
                                    <h2>{{ $publishedPosts }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Drafts</h5>
                                    <h2>{{ $draftPosts }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Users</h5>
                                    <h2>{{ $totalUsers }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Quick Actions</h5>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary me-2">
                                        <i class="fas fa-plus"></i> Create New Post
                                    </a>
                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary me-2">
                                        <i class="fas fa-list"></i> Manage Posts
                                    </a>
                                    <a href="{{ route('blog.index') }}" class="btn btn-outline-primary" target="_blank">
                                        <i class="fas fa-eye"></i> View Blog
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Posts -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Recent Posts</h5>
                                </div>
                                <div class="card-body">
                                    @if($recentPosts->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Created</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($recentPosts as $post)
                                                    <tr>
                                                        <td>{{ $post->title }}</td>
                                                        <td>
                                                            @if($post->is_published)
                                                                <span class="badge bg-success">Published</span>
                                                            @else
                                                                <span class="badge bg-warning">Draft</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p class="text-muted">No posts found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
