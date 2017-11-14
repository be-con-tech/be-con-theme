<section id="game-list" class="section text">
    <div class="wrapper">
      <div class="row">
        <div class="col-md-3 col-xs-12">
          <h2><span>Description</span></h2>
        </div>
        <div class="col-md-9 col-xs-12">
          {!! get_field('long_description') !!}
        </div>
      </div>
  </section>
  <section id="game-info" class="section info-box purple">
    <div class="wrapper">
      <div class="row">
        <div class="col-xs-12">
          <h3>Game Information</h3>
          <ul>
            <li><strong>Written By</strong>
              {{ get_field('written_by') }}</li>
            <li><strong>Run By</strong>
              {{ get_field('run_by') }}</li>
            <li><strong>Number of Players</strong>
              {{ get_field('number_of_players') }}</li>
            <li><strong>Content Warnings</strong>
              {{ (get_field('content_warnings')) ? get_field('content_warnings') : 'None' }}</li>
            <li><strong>Pre-Casting</strong>
              {{ (get_field('pre_casting')) ? 'Available' : 'Not Available'}}</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
