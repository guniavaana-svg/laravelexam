@extends('layouts.app')
@push('banner')
    @include('front.components.baner', ['banner_title'=>'about page','banner_text'=>'about page']);
@endpush

@section('content')
about page
@endsection
