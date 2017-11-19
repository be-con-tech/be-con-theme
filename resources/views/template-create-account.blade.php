{{--
  Template Name: Create Account Template
--}}

@extends('layouts.app')

@section('content')
    <section id="create-account" class="section">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <h2>Create Account</h2>
                    <div class="oauth button-row center">
                        <a href="#" class="button oauth-button twitter"><i class="fa fa-twitter"></i> Log in with Twitter</a> <a href="#" class="button oauth-button facebook"><i class="fa fa-facebook"></i> Log in with Facebook</a>
                    </div>
                    <p class="or">Or</p>
                    <form name="registerform" id="registerform" action="{{ get_bloginfo('url') }}/wp-login.php?action=register" method="post" _lpchecked="1">
                        <p class="login-username">
                            <label for="user_login">Username</label>
                            <input type="text" name="user_login" id="user_login" class="input" value="" size="20">
                        </p>
                        <p class="login-email">
                            <label for="user_email">Email</label>
                            <input type="email" name="user_email" id="user_email" class="input" value="" size="20">
                        </p>
                        <p class="login-submit">
                            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Create Account">
                            <input type="hidden" name="redirect_to" value="{{ get_bloginfo('url') }}/account-thanks/">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
