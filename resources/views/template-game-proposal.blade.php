{{--
  Template Name: Game Proposal Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <section id="game-proposals" class="section text">
      <div class="wrapper">
        <div class="row">
          <div class="col-md-3 col-xs-12">
  					<h2><span>Game Proposal</span></h2>
  				</div>
          <div class="col-md-9 col-xs-12">
            <form name="proposal">
              <div class="form-row">
                <label for="game_name">Name of Game</label>
                <input type="text" name="game_name" placeholder="Name of Game" />
              </div>
              <div class="form-row">
                <label for="game_description">Full Game Description</label>
                <textarea name="game_description" placeholder="Full Game Description"></textarea>
              </div>
              <div class="form-row">
                <label for="short_description">Short Description</label>
                <input type="text" name="short_description" placeholder="Short Description" />
              </div>
              <div class="form-row">
                <label for="writers_gms">List of Writers and GMs</label>
                <input type="text" name="writers_gms" placeholder="List of Writers and GMs" />
              </div>
              <div class="form-row">
                <label for="label">Field Name</label>
                <input type="text" name="label" placeholder="Field Name" />
              </div>
              <div class="button-row right">
                <input type="submit" value="Submit Game" class="button" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endsection
