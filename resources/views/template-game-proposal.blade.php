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
            @if(!empty($_GET))
              <ul class="flash-messages">
                @if($_GET['submitted'] == "thanks")
                  <li class="success">Thanks for submitting a game proposal!</li>
                @endif
                @if($_GET['submitted'] == "error")
                  <li class="error">There was a problem submitting your game proposal—please try again!</li>
                @endif
              </ul>
            @endif
            <form name="proposal" action="{{ esc_url( admin_url('admin-post.php') ) }}" method="POST">
              <div class="form-row">
                <label for="game_name">Name of Game</label>
                <input type="text" name="game_name" placeholder="Name of Game" required="required" />
              </div>
              <div class="form-row">
                <label for="game_description">Full Game Description</label>
                <textarea name="game_description" placeholder="Full Game Description" required="required"></textarea>
              </div>
              <div class="form-row">
                <label for="short_description">Short Description</label>
                <input type="text" name="short_description" placeholder="Short Description" required="required" />
              </div>
              <div class="form-row">
                <label for="writers">Written By</label>
                <input type="text" name="writers" placeholder="List of Writers" required="required" />
              </div>
              <div class="form-row">
                <label for="gms">Run By</label>
                <input type="text" name="gms" placeholder="List of GMs" required="required" />
              </div>
              <div class="form-row">
                <label for="number">Number of Players</label>
                <input type="text" name="number" placeholder="Either an exact number or a range" required="required" />
              </div>
              <div class="form-row">
                <label for="content_warnings">Content Warnings</label>
                <input type="text" name="content_warnings" placeholder="List of content warnings, if any" />
              </div>
              <div class="form-row">
                <label for="pre_casting">Pre-Casting Available?</label>
                <input type="checkbox" name="pre_casting" value="true" />
              </div>
              <div class="form-row">
                <label for="primary_contact">Primary Contact Name</label>
                <input type="text" name="primary_contact" placeholder="Primary Contact Name" required="required" />
              </div>
              <div class="form-row">
                <label for="email">Primary Contact E-mail Address</label>
                <input type="email" name="email" placeholder="Email Address" required="required" />
              </div>
              <input type="hidden" name="action" value="submit_game_proposal">
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
