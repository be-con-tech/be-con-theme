{{--
  Template Name: Current Games Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-game-list')
  @endwhile
@endsection
