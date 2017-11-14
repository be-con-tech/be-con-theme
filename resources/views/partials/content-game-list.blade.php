@php
    $games = get_posts(array(
        'orderby' => 'menu_order',
        'posts_per_page' => -1,
        'post_type' => 'game'
    ));
@endphp
<section id="game-list" class="section text">
    <div class="wrapper">
        @if($games)
            @foreach($games as $game)
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <h2><span>{{ $game->post_title }}</span></h2>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        {!! get_field('short_description', $game) !!} <a href="{{ get_permalink($game) }}" class="readmore">Read more</a></p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>