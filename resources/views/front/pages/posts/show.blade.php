@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12 mb-4">
            <h1 class="display-4">{{ $post->title }}</h1>
            <p class="text-muted">Category: {{ $post->category->name }}</p>
        </div>

        <!-- სურათები carousel ან row-ში -->
        @if($post->images->count() > 0)
            <div id="postImagesCarousel" class="carousel slide col-12 mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($post->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/images/' . $image->name) }}" class="d-block w-100" alt="Image {{ $key+1 }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#postImagesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#postImagesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif

        <div class="col-12">
            <p class="lead">{{ $post->description }}</p>
        </div>

        <div class="col-12 mt-4">
            <a href="{{ route('front.posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        </div>
    </div>
</div>
@endsection
