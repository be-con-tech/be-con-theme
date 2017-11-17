{{--
  Template Name: Create Account Template
--}}

@extends('layouts.app')

@section('content')
    <section id="login" class="section">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <h2>Create Account</h2>
                    <div class="oauth button-row center">
                        <a href="#" class="button oauth-button twitter"><i class="fa fa-twitter"></i> Log in with Twitter</a> <a href="#" class="button oauth-button facebook"><i class="fa fa-facebook"></i> Log in with Facebook</a>
                    </div>
                    <p class="or">Or</p>
                    <?php wp_register_form(); ?>
                </div>
            </div>
        </div>
    </section>
@endsection
