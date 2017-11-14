{{--
  Template Name: Contact Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <section id="contact-links" class="section intro">
      <div class="wrapper">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 col-xs-12">
            <h2>Get in touch!</h2>
            <div class="social">
              <a href="{{ get_field('twitter_url', 'option') }}" rel="external" target="_blank"><i class="fa fa-twitter"></i></a> <a href="{{ get_field('facebook_url', 'option') }}" rel="external" target="_blank"><i class="fa fa-facebook"></i></a> <a href="{{ get_field('instagram_url', 'option') }}" rel="external" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
            <p class="email">Email: <a href="mailto:{{ get_field('email', 'option') }}">{{ get_field('email', 'option') }}</a></p>
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endsection
