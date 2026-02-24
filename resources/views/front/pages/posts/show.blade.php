@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <a href="{{route('front.posts.show',$post->id)}}"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{$post->created_at->format('M d')}}</div>
                    <h2 class="card-title h4">{{$post->title}}</h2>
                    <p class="card-text">{{$post->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
