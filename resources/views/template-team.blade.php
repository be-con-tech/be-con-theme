{{--
  Template Name: Team Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <section id="con-com" class="section purple">
      <div class="wrapper">
        <div class="row center-xs">
          <div class="col-xs-12">
            <h2>Convention Committee</h2>
          </div>
        </div>
        <div class="row">
          @if(get_field('committee_members'))
            @foreach(get_field('committee_members') as $member)
              <div class="col-md-4 col-xs-12">
                <div class="card image-card">
                  <div class="image" style="background-image: url('{{ $member['image']['sizes']['medium'] }}')"></div>
                  <h3>{{ $member['name'] }}</h3>
                  {!! $member['bio'] !!}
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </section>
    @php
      $gms = get_posts(array(
        'post_type' => 'gm',
        'posts_per_page' => -1
      ));
    @endphp
    @if(count($gms) > 0)
      <section id="gm-list" class="section">
        <div class="wrapper">
          <div class="row center-xs">
            <h2>List of GMs</h2>
          </div>
          <div class="row">
            @foreach($gms as $gm)
              <div class="col-md-4 col-xs-12">
                <div class="card">
                  <h3>{{ $gm->post_title }}</h3>
                  {!! $gm->post_content !!}
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif
  @endwhile
@endsection
