<section id="page-content" class="section">
  <div class="wrapper">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-xs-12">
        @include('partials/entry-meta')
        @php(the_content())
        <footer>
          {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        </footer>
        @php(comments_template('/partials/comments.blade.php'))
      </div>
    </div>
  </div>
</section>