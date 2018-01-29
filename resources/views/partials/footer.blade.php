<footer class="footer">
	<div class="wrapper container-fluid">
		<div class="row between-xs">
			<div class="copyright">
				<a class="logo" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
			</div>
			<div class="nav">
				<div class="newsletter-signup">
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
				@if (has_nav_menu('footer_navigation'))
					{!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'menu']) !!}
				@endif
			</div>
		</div>
	</div>
</footer>
