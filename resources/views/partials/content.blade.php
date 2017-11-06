<div @php(post_class('wrapper blog-entry'))>
  <div class="row middle-xs">
    <div class="col-md-3 col-xs-12">
      {{ get_the_post_thumbnail('medium') }}
    </div>
    <div class="col-md-9 col-xs-12">
      <h2><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
      <div class="row">
        @if(get_field('subtitle'))
          <div class="col-xs-6">
            <h3>{{ get_field('subtitle') }}</h3>
          </div>
        @endif
        <div class="col-xs-6">
          <h3>{{ get_the_date('F j, Y') }}</h3>
        </div>
      </div>
      <div class="content">
        @php(the_excerpt())
      </div>
    </div>
  </div>
  </div>