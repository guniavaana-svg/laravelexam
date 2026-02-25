@extends('layouts.app')

@section('content')
<section class="clients text-center bg-light py-5">
    <div class="container">
        <h2 class="mb-5">Our Clients</h2>

        <div class="row">
            @foreach($clients as $client)
                <div class="col-lg-4">
                    <div class="client-item mx-auto mb-5 mb-lg-0 shadow-sm p-3 rounded bg-white">
                        @if($client->images->first())
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('storage/images/' . $client->images->first()->name) }}" alt="{{ $client->name }}" />
                        @else
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('front/assets/img/default-user.png') }}" alt="{{ $client->name }}" />
                        @endif
                        <h5>{{ $client->name }} {{ $client->lastname }}</h5>
                        @if($client->description)
                            <p class="font-weight-light mb-0">{{ Str::limit($client->description, 100) }}</p>
                        @else
                            <p class="font-weight-light mb-0">No description available.</p>
                        @endif
                        <a href="{{ route('front.clients.show', ['id' => $client->id]) }}" class="btn btn-primary mt-3">View</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endsection