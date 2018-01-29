@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  	<section id="hero">
  		<div class="wrapper">
  			<div class="row bottom-xs">
  				<div class="col-xs-12">
  					<p class="subtitle">{{ get_field('convention_dates', 'options') }}</p>
  					<h1>{{ get_bloginfo('description') }}</h1>
  				</div>
  			</div>
  		</div>
  		<div class="banner-overlay"></div>
  		<div class="banner" style="background-image:url(images/placeholder-2.jpg);"></div>
  	</section>
  	<section id="intro" class="section intro yellow">
  		<div class="wrapper">
  			<div class="row">
  				<div class="col-md-8 col-md-offset-2 col-xs-12">
  					<h2>{{ get_field('intro_headline') }}</h2>
  					<div class="content">
  						{!! get_field('intro_content') !!}
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  	<section id="newsletter" class="section">
  		<div class="wrapper">
  			<div class="row center-xs">
  				<div class="col-md-10 col-xs-12">
  					<h2>Sign up for our newsletter!</h2>
					<form action="https://twitter.us16.list-manage.com/subscribe/post?u=8099ba1d98d16a217cd0e982b&amp;id=818881b8f7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate newsletter-form" novalidate>
						<label for="mce-EMAIL">Sign up for our newsletter!</label>
						<div class="form-row">
							<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							<div aria-hidden="true"><input type="text" name="b_8099ba1d98d16a217cd0e982b_818881b8f7" tabindex="-1" value=""></div>
							<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</div>
					</form>
  				</div>
  			</div>
  		</div>
  	</section>
  	<section id="funding" class="section sidebyside gradient">
  		<div class="wrapper">
  			<div class="row middle-xs">
  				<div class="col-md-6 col-xs-12">
  					<h2>{{ get_field('funding_headline') }}</h2>
  					<div class="content">
  						{!! get_field('funding_content') !!}
						@if(get_field('funding_cta_text') && get_field('funding_cta_link'))
							<div class="button-row">
								<a href="{{ get_field('funding_cta_link') }}" class="button">{{ get_field('funding_cta_text') }}</a>
							</div>
						@endif
  					</div>
  				</div>
  				<div class="col-md-6 col-xs-12">
  					@if(get_field('other_content'))
						{!! get_field('other_content') !!}
					@endif
  				</div>
  			</div>
  		</div>
  	</section>
  	<section id="updates" class="section cards">
  		<div class="wrapper">
  			<div class="row center-xs">
  				<div class="col-xs-12">
  					<h2>Recent Updates</h2>
  				</div>
				@php
					$recent = get_posts(array(
						'posts_per_page' => 3
					));
				@endphp
				@if(count($recent) > 0)
					@foreach($recent as $rec)
						<div class="col-md-4 col-xs-12">
							<div class="card">
								<h3><a href="{{ get_the_permalink($rec) }}">{{ get_the_title($rec) }}</a></h3>
								<p class="datetime">{{ get_the_date('n/j/Y') }}</p>
								<div class="card-content">
									{{ get_the_excerpt($rec) }}
								</div>
							</div>
						</div>
					@endforeach
				@endif
				@php(wp_reset_postdata())
  				<div class="col-xs-12">
  					<div class="button-row center">
  						<a href="/news/" class="button">More Posts</a>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  @endwhile
@endsection
