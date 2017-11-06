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
              <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <p class="email">Email: <a href="mailto:">email@be-con.com</a></p>
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endsection
