@extends('layouts.app')
@section('content')
<h1>this is client front more</h1>
<div class="container my-5">
    <h1>{{ $client->name }} {{ $client->lastname }}</h1>

    <!-- ფოტო არ ჩანს -->
    <!-- რატომ იძახებ images->first() როცა image რელაცია გაქვს მოდელზე??? -->
    <!-- @if($client->images->count())
        <img src="{{ asset('storage/images/' . $client->images->first()->filename) }}" class="img-fluid mb-3" alt="{{ $client->name }}">
    @endif -->

    <!-- როცა ბევრი ფოტო გინდა დამოიტანო foreach უნდა გააკეთო -->

    @foreach($client->images as $image)
        <img src="{{ asset('storage/images/' . $image->name) }}" class="img-fluid mb-3" alt="{{ $client->name }}">
    @endforeach

    <!-- @if($client->images->count())
        <img src="{{ asset('storage/images/' . $client->images->first()->filename) }}" class="img-fluid mb-3" alt="{{ $client->name }}">
    @endif -->

    <p>{{ $client->description }}</p>

    <a href="{{ route('front.clients.index') }}" class="btn btn-secondary">Back to Clients</a>
</div>
@endsection