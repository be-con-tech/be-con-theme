<footer class="footer">
	<div class="wrapper container-fluid">
		<div class="row between-xs">
			<div class="copyright">
				<a class="logo" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
			</div>
			<div class="nav">
				<div class="newsletter-signup">
					<h3>Sign up for our newsletter!</h3>
					<form class="newsletter-form" method="POST" target="popupwindow" action="{{ get_field('newsletter_form', 'option')}}">
						<label name="email" class="for-screenreader">Email</label>
						<input type="email" name="email" id="tlemail" /><input name="embed" type="hidden" value="1" /><input type="submit" value="Subscribe" class="button" />
					</form>
				</div>
				@if (has_nav_menu('footer_navigation'))
					{!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'menu']) !!}
				@endif
			</div>
		</div>
	</div>
</footer>
