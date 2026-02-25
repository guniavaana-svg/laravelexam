@extends('layouts.app')
@section('content')
    <section class="showcase">
    <div class="container-fluid p-0">
        @foreach($posts as $index => $post)
            @php
                // ბექგრაუნდისთვის სურათის URL
                $bgImage = $post->images->first() ? asset('storage/images/' . $post->images->first()->name) : '/front/assets/img/default.jpg';
                // ორი სვეტის გადაცვლის კლასები
                $orderClass = $index % 2 == 0 ? true : false;
            @endphp

            <div class="row g-0">
                <div class="col-lg-6 {{ $orderClass ? 'order-lg-2' : '' }} text-white showcase-img" 
                     style="background-image: url('{{ $bgImage }}'); background-size: cover; background-position: center; min-height: 300px;">
                </div>
                <div class="col-lg-6 {{ $orderClass ? '' : 'order-lg-1' }} my-auto showcase-text p-4">
                    <h2>{{ $post->title }}</h2>
                    <p class="lead mb-1">{{ Str::limit($post->description, 200) }}</p>
                    <p class="text-muted">Category: {{ $post->category->name }}</p>
                    <a href="{{ route('front.posts.show', $post->id) }}" class="btn btn-primary mt-2">Read More</a>
                </div>
            </div>

        @endforeach
    </div>
</section>
@endsection




<style>
.showcase-img {
    transition: transform 0.3s ease;
}
.showcase-img:hover {
    transform: scale(1.05);
}
.showcase-text h2 {
    font-weight: 700;
}
.showcase-text p {
    font-size: 1.1rem;
}
</style>
