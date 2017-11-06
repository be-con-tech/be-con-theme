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
          <div class="col-md-4 col-xs-12">
            <div class="card image-card">
              <div class="image" style="background-image: url('/images/placeholder-1.jpg')"></div>
              <h3>Firstname Lastname</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card image-card">
              <div class="image" style="background-image: url('/images/placeholder-2.jpg')"></div>
              <h3>Firstname Lastname</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card image-card">
              <div class="image" style="background-image: url('/images/placeholder-3.jpg')"></div>
              <h3>Firstname Lastname</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="gm-list" class="section">
      <div class="wrapper">
        <div class="row center-xs">
          <h2>List of GMs</h2>
        </div>
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="card">
              <h3>Firstname Lastname</h3>
              <p>GM blurb. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernat.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endsection