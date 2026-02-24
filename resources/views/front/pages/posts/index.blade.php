@extends('layouts.app')


@section('content')
    <h1>Posts</h1>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="{{route('front.posts.show',$post->id)}}"><img class="card-img-top" src="{{'/storage/images/'.$post->image?->filename}}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{$post->created_at->format('M d')}}</div>
                        <h2 class="card-title h4">{{$post->title}}</h2>
                        <a class="btn btn-primary" href="{{route('front.posts.show',$post->id)}}">Read more →</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
