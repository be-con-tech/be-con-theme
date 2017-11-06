<footer class="footer">
	<div class="wrapper container-fluid">
		<div class="row between-xs">
			<div class="copyright">
				<a class="logo" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
			</div>
			<div class="nav">
				<div class="newsletter-signup">
					<h3>Sign up for our newsletter!</h3>
					<form class="newsletter-form">
						<input type="email" name="email" /><input type="submit" value="Subscribe" class="button" />
					</form>
				</div>
				@php(dynamic_sidebar('sidebar-footer'))
			</div>
		</div>
	</div>
</footer>
