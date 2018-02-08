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
            @if(is_user_logged_in())
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
                  <label for="game_name">Title</label>
                  <p class="help">This should be no more than 40 characters.  If your title is longer, abbreviate it, and list your full name in your long description.</p>
                  <input type="text" name="game_name" placeholder="Title" required="required" maxlength="40" />
                </div>
                <div class="form-row">
                  <label for="writers">Author(s)</label>
                  <input type="text" name="writers" placeholder="Author(s)" required="required" />
                </div>
                <div class="form-row">
                  <label for="gms">GMs</label>
                  <p class="help">This should include the people who are running or organizing the larp.</p>
                  <input type="text" name="gms" placeholder="List of GMs" required="required" />
                </div>
                <div class="form-row">
                  <label for="organization">Organization Name</label>
                  <p class="help">You can list your writing or running group here.</p>
                  <input type="text" name="organization" placeholder="Organization Name" />
                </div>
                <div class="form-row">
                  <label for="organization_link">Organization Link</label>
                  <input type="url" name="organization_link" placeholder="Organization Link" />
                </div>
                <div class="form-row">
                  <label for="email">Contact E-mail Address</label>
                  <p class="help">This email address will be posted publicly on the site and available to potential attendees.</p>
                  <input type="email" name="email" placeholder="Email Address" required="required" />
                </div>
                <div class="form-row">
                  <label for="short_description">Short Description</label>
                  <p class="help">This will display on the list of games under the title. You are limited to 350 characters.</p>
                  <input type="text" name="short_description" placeholder="Short Description" required="required" maxlength="350" />
                </div>
                <div class="form-row">
                  <label for="game_description">Full Game Description</label>
                  <p class="help">This will display on your game's individual page.  It should at least include everything in the short description.</p>
                  <textarea name="game_description" placeholder="Full Game Description" required="required"></textarea>
                  <p class="help">You can edit this field with <a href="https://daringfireball.net/projects/markdown/syntax" rel="external" target="_blank">Markdown</a>.</p>
                </div>
                <div class="form-row">
                  <label for="content_warnings">Content Warnings</label>
                  <p class="help">This field should include all sensitive content which is in your game.  These will display on your game’s individual page. See the content warning section of the <a href="/social-contract/">Social Contract</a> for more information and examples of required warnings.</p>
                  <textarea name="content_warnings" placeholder="List of content warnings, if any" required></textarea>
                </div>
                <div clss="form-row">
                  <label for="age_requirements">Age Requirements</label>
                  <p class="help">This field should specify the age requirements for players for the larp.  Examples include "Children and Teens Welcome", "16+", "18+, with 16+ allowed with parent and GM approval".</p>
                  <input type="text" name="age_requirements" placeholder="Age Requirements" required="required" />
                </div>
                <div class="form-row">
                  <label for="player_spaces">Player Spaces</label>
                  <p class="help">Specify the minimum and maximum number of characters supported in each of these 4 categories. Be-Con will be matching players with your listed spaces based on what they have indicated they are willing to play. Be-Con’s advice on gender and casting is available <a href="/how-do-i-run-a-game/#section-7">here</a>.</p>
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Minimum</th>
                        <th>Maximum</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th><label for="female_min">Female</label></th>
                        <td><input type="number" value="0" name="female_min" required="required" min="0" /></td>
                        <td><input type="number" value="0" name="female_max" required="required" min="0" /></td>
                      </tr>
                      <tr>
                        <th><label for="male_min">Male</label></th>
                        <td><input type="number" value="0" name="male_min" required="required" min="0" /></td>
                        <td><input type="number" value="0" name="male_max" required="required" min="0" /></td>
                      </tr>
                      <tr>
                        <th><label for="player_defined_min">Player Defined</label></th>
                        <td><input type="number" value="0" name="player_defined_min" required="required" min="0" /></td>
                        <td><input type="number" value="0" name="player_defined_max" required="required" min="0" /></td>
                      </tr>
                      <tr>
                        <th><label for="other_min">Other</label></th>
                        <td><input type="number" value="0" name="other_min" required="required" min="0" /></td>
                        <td><input type="number" value="0" name="other_max" required="required" min="0" /></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="form-row">
                  <label for="duration">Duration</label>
                  <p class="help">This is the number of hours needed for your larp.  This must go beyond expected play time, and  include time for any briefing, workshops or debriefing that you are going to do.  The standard slot lengths Be-Con can support are 2, 3, or 4 hours.  Be-Con can support a small number of larps that are 5 or 6 hours as well as 1 hour games hosted in your hotel suite.  See the "<a href="/how-do-i-run-a-game/">How Do I Run a Game</a>" page for details.</p>
                  <input type="number" name="duration" placeholder="Duration" required="required" />
                </div>
                <div class="form-row">
                  <label for="special_requirements">Special Requirements</label>
                  <p class="help">Indicate if you will need more than 1 hour for setup and teardown, if you are using a sound system, set decoration or anything else that needs extra time, space or accommodations. (Be-Con cannot provide these, but we want to know in order to better plan.)</p>
                  <textarea name="special_requirements" placeholder="Special Requirements"></textarea>
                </div>
                <div class="form-row">
                  <label for="food_used">Is food used in your LARP?</label>
                  <p class="help">Indicate if food is being used in your game, and if so, how it is part of your game.  GM/Game provided food is only allowed in the suites.</p>
                  <textarea name="food_used"></textarea>
                </div>
                <div class="form-row">
                  <label for="physical_abilities">Physical Abilities</label>
                  <p class="help">Check all for things that are required of a player to participate in your game. Do not check anything for which you can make accommodations for players with different abilities, but see our <a href="/how-do-i-run-a-game/">How Do I Run A Game</a> page for information on accommodations and casting.</p>
                  <ul class="checkbox">
                    <li><input type="checkbox" name="physical_abilities[]" value="standing" /> <label for="physical_abilities[]">Standing for long periods</label></li>
                    <li><input type="checkbox" name="physical_abilities[]" value="sitting" /> <label for="physical_abilities[]">Sitting for long periods</label></li>
                    <li><input type="checkbox" name="physical_abilities[]" value="walking" /> <label for="physical_abilities[]">Walking</label></li>
                    <li><input type="checkbox" name="physical_abilities[]" value="vision" /> <label for="physical_abilities[]">Vision</label></li>
                    <li><input type="checkbox" name="physical_abilities[]" value="hearing" /> <label for="physical_abilities[]">Hearing</label></li>
                    <li><input type="checkbox" name="physical_abilities[]" value="athletic_movement" /> <label for="physical_abilities[]">Athletic movement</label></li>
                    <li><input type="checkbox" name="physical_abilities[]" value="singing" /> <label for="physical_abilities[]">Singing</label></li>
                    <li><label for="physical_abilities_other">Other:</label> <input type="text" name="physical_abilities_other" /></li>
                  </ul>
                </div>
                <div class="form-row">
                  <label for="default_physical_contact">Will you be using the Be-Con default physical contact rules?</label>
                  <p class="help">See the <a href="/social-contract/">Social Contract</a> for more information.</p>
                  <ul class="radio">
                    <li><input type="radio" value="true" name="default_physical_contact" required checked /> <label for="default_physical_contact">Yes</label></li>
                    <li><input type="radio" value="false" name="default_physical_contact" required id="default-contact-no" /> <label for="default_physical_contact">No</label></li>
                  </ul>
                </div>
                <div class="form-row">
                  <label for="other_physical_contact">If not, describe the physical contact rules you will be using.</label>
                  <textarea name="other_physical_contact"></textarea>
                </div>
                <div class="form-row">
                  <label for="default_safety_mechanics">Will you be using the Be-Con default safety mechanics?</label>
                  <p class="help">See the <a href="/social-contract/">Social Contract</a> for more information.</p>
                  <ul class="radio">
                    <li><input type="radio" value="true" name="default_safety_mechanics" required checked /> <label for="default_safety_mechanics">Yes</label></li>
                    <li><input type="radio" value="false" name="default_safety_mechanics" required id="default-safety-no" /> <label for="default_safety_mechanics">No</label></li>
                  </ul>
                </div>
                <div class="form-row">
                  <label for="other_safety_mechanics">If not, describe the safety mechanics you will be using.</label>
                  <textarea name="other_safety_mechanics"></textarea>
                </div>
                <div class="form-row">
                  <label for="other_mechanics">What other mechanics will you be using?</label>
                  <p class="help">Examples include contingency envelopes, Ars Amandi, a published rule system and combat resolution.</p>
                  <textarea name="other_mechanics" required></textarea>
                </div>
                <div class="form-row">
                  <label for="communications">What communications can your players expect from you?</label>
                  <p class="help">Include how casting will be handled, what information such as characters will be sent in advance, and how far before the convention to expect these.</p>
                  <textarea name="communications" required></textarea>
                </div>
                <div class="form-row">
                  <label for="space_requirements">What are the space requirements?</label>
                  <p class="help">Be-Con has the following possible spaces.  Please check all of the spaces you can possibly run in.</p>
                  <ul class="checkbox">
                    <li><input type="checkbox" name="space_requirements[]" value="ohare" /> O'Hare Room
                      <p class="help">This typical convention and meeting room is 1000 square feet, and we expect it to hold games in the 20-30 player range.  It is available Friday and Saturday.  It is a large open space with configurable banquet chairs and tables, and includes a whiteboard and pull down projection screen.  Game/GM provided food is not allowed in this room.  Pictures are available <a href="#">here</a>.</p>
                    </li>
                    <li><input type="checkbox" name="space_requirements[]" value="midway" /> Midway Room
                      <p class="help">This typical convention and meeting room is 900 square feet, and we expect it to hold games in the 20-30 player range.  It is available Saturday.  It is a large open space with configurable banquet chairs and tables, and includes a whiteboard and pull down projection screen.  Game/GM provided food is not allowed in this room. Pictures are available <a href="#">here</a>.</p>
                    </li>
                    <li><input type="checkbox" name="space_requirements[]" value="two_room" /> Two-Bedroom Suite
                      <p class="help">This room is 740 square feet, and we expect it to hold games in the 12-15 player range.  It is available Friday and Saturday.  This room has a main suite area, and two separate bedrooms.  The standard variety of guest room furniture will remain in the space. Pictures are available <a href="#">here</a>.</p>
                    </li>
                    <li><input type="checkbox" name="space_requirements[]" value="studio_suite" /> Studio Suite
                      <p class="help">This room is 485 square feet, and we expect it to hold games in the 6-10 player range.  It is available Friday and Saturday.  This room has a main suite area, and two separate bedrooms.  The standard variety of guest room furniture will remain in the space. Pictures are available <a href="#">here</a>.</p>
                    </li>
                    <li><input type="checkbox" name="space_requirements[]" value="studio_suite" /> Your own hotel suite
                      <p class="help">You can also reserve your own hotel suite in one of the available suite formats (studio, 1 bedroom or 2 bedroom) to run your game.  Larps with fewer than 6 players will need to select this.</p>
                    </li>
                  </ul>
                </div>
                <div class="form-row">
                  <label for="slots_available">When are you available to run your larp?</label>
                  <p class="help">We will be scheduling larps to try to ensure there are enough players for each game, as well as enough games for each player.  To do this, we ask you be as flexible as possible and list all the times that are options.</p>
                  <ul class="checkbox">
                    <li><input type="checkbox" name="slots_available[]" value="fri_night" /> Friday night (maximum 6 hours)</li>
                    <li><input type="checkbox" name="slots_available[]" value="sat_morning" /> Saturday morning (maximum 2 hours)</li>
                    <li><input type="checkbox" name="slots_available[]" value="sat_afternoon" /> Saturday afternoon (maximum 4 hours)</li>
                    <li><input type="checkbox" name="slots_available[]" value="sat_evening" /> Saturday evening (maximum 5 hours)</li>
                    <li><input type="checkbox" name="slots_available[]" value="sun_morning" /> Sunday morning (maximum 3 hours)</li>
                  </ul>
                </div>
                <div class="form-row">
                  <label for="anything_else">Is there anything else we should know for scheduling your game?</label>
                  <textarea name="anything_else"></textarea>
                </div>
                <input type="hidden" name="action" value="submit_game_proposal">
                <input type="hidden" name="user_id" value="{{ wp_get_current_user() }}" />
                <div class="button-row right">
                  <input type="submit" value="Submit Game" class="button" />
                </div>
              </form>
            @else
              <center>Thanks for your interest in proposing a game to Be-Con! Please <a href="/login/">log in</a> or <a href="/create-account/">create an account</a> first.
            @endif
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endsection
