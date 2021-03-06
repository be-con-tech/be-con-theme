<div id="preheader">
	<div class="wrapper container-fluid">
		<div class="row right-xs middle-xs">
				@if(is_user_logged_in())
					<a href="{{ get_bloginfo('url') }}/account/">Account</a>
					@php
						echo do_shortcode('[wppb-logout text="" link_text="Logout" redirect="'.get_bloginfo('url').'"]');
					@endphp
				@else
					<a href="/login/">Login</a>
					<a href="/create-account/">Create an Account</a>
				@endif
		</div>
	</div>
</div>
<header class="header">
	<div class="wrapper container-fluid">
		<div class="row middle-xs between-xs">
			<div class="logo"><a href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a></div>

			<button class="hamburger hamburger--spin js-hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</button>

      <nav class="nav-primary">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>

			<a href="/contact/" class="button">Contact Us</a>
		</div>
	</div>
</header>
