@extends('layouts.rtl.app')

@section('content')

@include('section.home.banner')

@include('section.home.projects')

@include('section.home.counter')

@include('section.home.partner')

@include('section.home.team')

@include('section.home.values')

@include('section.home.image-slider')
@if ($Images)
    @include('section.home.events')
@endif


<div class="mb-6"></div>
@include('section.home.contact')

@endsection