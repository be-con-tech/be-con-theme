@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <section id="error" class="section">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="alert alert-warning">
                      {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
                    </div>
                    {!! get_search_form(false) !!}
                </div>
            </div>
        </div>
    </section>
  @endif
@endsection
