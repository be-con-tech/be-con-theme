<section id="page-content" class="section">
    <div class="wrapper">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
          @php(the_content())
          {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        </div>
      </div>
    </div>
  </section>
