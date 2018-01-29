<section id="game-list" class="section text">
  <div class="wrapper">
    <div class="row">
      <div class="col-md-3 col-xs-12">
        <h2><span>Description</span></h2>
      </div>
      <div class="col-md-9 col-xs-12">
        <div class="description">
          @php
            $Parsedown = new Parsedown();
          @endphp
          {!! $Parsedown->text(get_field('long_description')) !!}
        </div>
      </div>
    </div>
  </div>
</section>
<section id="credits" class="section text">
  <div class="wrapper">
    <div class="row">
      <div class="col-md-3 col-xs-12">
        <h2><span>Credits &amp; Contact</span></h2>
      </div>
      <div class="col-md-9 col-xs-12">
        <dl>
          @if(get_field('written_by'))
            <dt>Written by</dt>
            <dd>@php(the_field('written_by'))</dd>
          @endif
          @if(get_field('run_by'))
            <dt>GMs</dt>
            <dd>@php(the_field('run_by'))</dd>
          @endif
          @if(get_field('primary_contact_email'))
            <dt>Game Contact</dt>
            <dd><a href="mailto:@php(the_field('primary_contact_email'))" rel="external" target="_blank">@php(the_field('primary_contact_email'))</a>
          @endif
          @if(get_field('organization_name') || get_field('organization_link'))
            <dt>Organization</dt>
            <dd>
              @if(get_field('organization_link'))
                <a href="@php(the_field('organization_link'))">
              @endif
              {{ (get_field('organization_name')) ? get_field('organization_name') : get_field('organization_link') }}
              @if(get_field('organization_link'))
                </a>
              @endif
            </dd>
          @endif
        </dl>
      </div>
    </div>
  </div>
</section>
<section id="game-info" class="section text">
  <div class="wrapper">
    <div class="row">
      <div class="col-md-3 col-xs-12">
        <h2><span>Game Information</span></h2>
      </div>
      <div class="col-md-9 col-xs-12">
        <dl>
            <dt>Scheduled</dt>
            <dd>{{ get_field('start_time') ? get_field('start_time') : "Games are not yet scheduled." }}</dd>
            <dt>Room</dt>
            <dd>{{ get_field('location') ? get_field('location') : "Rooms are not yet assigned." }}</dd>
            @if(get_field('duration'))
              <dt>Duration</dt>
              <dd>@php(the_field('duration')) {{ (get_field('duration') == 1) ? 'hour' : 'hours' }}</dd>
            @endif
            <dt>Players</dt>
            @php
              $min_players = get_field('spaces_female_minimum') + get_field('spaces_male_minimum') + get_field('spaces_player_defined_minimum') + get_field('spaces_other_minimum');
              $max_players = get_field('spaces_female_maximum') + get_field('spaces_male_maximum') + get_field('spaces_player_defined_maximum') + get_field('spaces_other_maximum');
            @endphp
            <dd>{{ $min_players.(($min_players != $max_players) ? "-".$max_players : '') }} [{{ get_field('spaces_female_minimum').((get_field('spaces_female_minimum') != get_field('spaces_female_maximum')) ? "-".get_field('spaces_female_maximum') : '') }} female, {{ get_field('spaces_male_minimum').((get_field('spaces_male_minimum') != get_field('spaces_male_maximum')) ? "-".get_field('spaces_male_maximum') : '') }} male, {{ get_field('spaces_player_defined_minimum').((get_field('spaces_player_defined_minimum') != get_field('spaces_player_defined_maximum')) ? "-".get_field('spaces_player_defined_maximum') : '') }} player-defined, {{ get_field('spaces_other_minimum').((get_field('spaces_other_minimum') != get_field('spaces_other_maximum')) ? "-".get_field('spaces_other_maximum') : '') }} other]</dd>
            @if(get_field('age_requirements'))
              <dt>Age Requirements</dt>
              <dd>@php(the_field('age_requirements'))</dd>
            @endif
            @if(get_field('physical_abilities') || get_field('physical_abilities_other'))
              <dt>Physical Requirements</dt>
              @php
                $all_abilities = get_field('physical_abilities');
                if (get_field('physical_abilities_other')) {
                  array_push($all_abilities, get_field('physical_abilities_other'));
                }
              @endphp
              <dd>{{ join(", ", $all_abilities) }}</dd>
            @endif
            @if(get_field('content_warnings'))
              <dt>Content Warnings</dt>
              <dd>@php(the_field('content_warnings'))</dd>
            @endif
            @if(get_field('gm_communications'))
              <dt>GM Communications</dt>
              <dd>@php(the_field('gm_communications'))</dd>
            @endif
            <dt>Physical Contact Rules</dt>
            <dd>
              @if(get_field('default_physical_contact') == true)
                This game will be using the Be-Con default <a href="/social-contract/">physical contact rules</a>.
              @else
                @php(the_field('other_physical_contact'))
              @endif
            </dd>
            <dt>Safety Mechanics</dt>
            <dd>
              @if(get_field('default_safety_mechanics') == true)
                This game will be using the Be-Con default <a href="/social-contract/">safety mechanics</a>.
              @else
                @php(the_field('other_safety_mechanics'))
              @endif
            </dd>
            @if(get_field('food_used'))
              <dt>Food in use</dt>
              <dd>@php(the_field('food_used'))</dd>
            @endif
          </dl>
        </div>
      </div>
  </section>
