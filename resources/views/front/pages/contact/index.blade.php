@extends('layouts.app')
@push('banner')
    @include('front.components.baner', ['banner_title'=>'contact page','banner_text'=>'contact page']);
@endpush

@section('content')
contact page
@endsection