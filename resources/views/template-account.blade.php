{{--
  Template Name: Account Template
--}}
@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <section id="account-settings" class="section">
    <div class="wrapper">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
          @php
            $user = wp_get_current_user();
          @endphp
          <h2>Account Settings</h2>
          <form name="settings" method="POST" action="{{ esc_url( admin_url('admin-post.php') ) }}">
            <div class="form-row">
              <label for="display_name">Display Name</label>
              <input type="text" name="display_name" placeholder="Display Name" value="{{ $user->display_name }}" />
            </div>
            <div class="form-row">
              <label for="email">Email Address</label>
              <input type="email" name="email" placeholder="Email Address" value="{{ $user->user_email }}" />
            </div>
            <div class="form-row">
              <label for="password">Password</label>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <div class="form-row">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" name="password_confirmation" placeholder="Confirm Password" />
            </div>
            <!--<div class="form-row">
              <label for="accessibility_needs[]">Accessibility Needs</label>
              <ul class="gfield_checkbox">
                <li><input type="checkbox" name="accessibility_needs[]" value="Blind/Vision Access" /><label>Blind / Vision Access</label></li>
                <li><input type="checkbox" name="accessibility_needs[]" value="Childcare" /><label>Childcare</label></li>
                <li><input type="checkbox" name="accessibility_needs[]" value="Dietary Accommodations" /><label>Dietary Accommodations</label></li>
                <li><input type="checkbox" name="accessibility_needs[]" value="Mobility Access" /><label>Mobility Access</label></li>
              </ul>
            </div>-->
            @if(get_field('is_registration_open', 'option'))
                <div class="form-row">
                <label for="badges">Badges Registered to Account</label>
                <ul class="badges">
                    <li><i class="fa fa-id-badge"></i> <span class="name">Carly Ho</span> <a href="#">(edit)</a></li>
                    <li><i class="fa fa-id-badge"></i> <span class="name">Stephanie Slattery</span> <a href="#">(edit)</a></li>
                </ul>
                </div>
            @endif
            <input type="hidden" name="user_id" value="{{ $user->ID }}" />
            <input type="hidden" name="action" value="update_user_from_frontend">
            <div class="button-row right">
              <input type="submit" value="Update" class="button" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  @endwhile
@endsection