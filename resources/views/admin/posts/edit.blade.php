@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Edit Post: {{ $post->title }}</h2>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Posts
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $post->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Short Description -->
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description *</label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                              id="short_description" name="short_description" rows="3" required>{{ old('short_description', $post->short_description) }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">A brief summary of your post (max 500 characters)</div>
                                </div>

                                <!-- Content -->
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content *</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" name="content" rows="12" required>{{ old('content', $post->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Current Cover Image -->
                                @if($post->cover_image)
                                <div class="mb-3">
                                    <label class="form-label">Current Cover Image</label>
                                    <div class="text-center">
                                        <img src="{{ $post->cover_image_url }}" alt="Current cover" class="img-fluid rounded mb-2" style="max-height: 200px;">
                                        <br>
                                        <small class="text-muted">Current image</small>
                                    </div>
                                </div>
                                @endif

                                <!-- Cover Image -->
                                <div class="mb-3">
                                    <label for="cover_image" class="form-label">Update Cover Image</label>
                                    <input type="file" class="form-control @error('cover_image') is-invalid @enderror" 
                                           id="cover_image" name="cover_image" accept="image/*">
                                    @error('cover_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Leave empty to keep current image. Max 2MB.</div>
                                </div>

                                <!-- Publish Status -->
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_published" 
                                               name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">
                                            Publish this post
                                        </label>
                                    </div>
                                </div>

                                <!-- Post Info -->
                                <div class="mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Post Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <strong>Slug:</strong><br>
                                                <code>{{ $post->slug }}</code>
                                            </div>
                                            <div class="mb-2">
                                                <strong>Created:</strong><br>
                                                <small>{{ $post->created_at->format('M d, Y \a\t g:i A') }}</small>
                                            </div>
                                            @if($post->updated_at != $post->created_at)
                                            <div class="mb-2">
                                                <strong>Last Updated:</strong><br>
                                                <small>{{ $post->updated_at->format('M d, Y \a\t g:i A') }}</small>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('short_description');

    // Auto-generate slug from title
    titleInput.addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        // Note: In a real app, you might want to show this to the user
    });
});
</script>
@endpush
@endsection
