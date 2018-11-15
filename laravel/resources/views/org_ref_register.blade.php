<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 11/15/2018
 * Time: 11:52 AM
 */
?>
@extends('layouts.master')

@section('content')
<section class="g-py-200--md g-py-80">
  <div class="container text-center">
      <div style="background: url('/storage/app/org_logos/{{ $organization->org_logo }}') no-repeat center;background-size: contain ">
      </div>
    <div class="row">
      <div class="col-md-10 ml-md-auto mr-md-auto">
            <h3 class="h5 text-uppercase g-font-weight-700 g-mb-20">Request to Join</h3>
            <h2 class="display-4 text-uppercase g-font-weight-600 g-mb-20">
              <span><img height="100px" src="/storage/app/org_logos/{{ $organization->org_logo }}"> </span><span class="g-color-primary" >{{ $organization->org_name }}</span>
            </h2>

            <p class="lead g-mb-40">Since you have a reference code, signup will be over in a snap,<br> all we need is a username, email and password!</p>
          @include('shared.errors')
          <form class="g-py-15" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="org_id" value="{{ $organization->id }}">
              <div class="mb-4">
                  <div class="input-group">
                      <input class="form-control text-center " name="username" type="text" placeholder="Username" value="{{ old('username') }}" required>
                  </div>
              </div>
              <div class="mb-4">
                  <div class="input-group">
                      <input class="form-control text-center " name="email" type="email" placeholder="Email" value="{{ old('email') }}" required>
                  </div>
              </div>

              <div class="row">
                  <div class="col-xs-12 col-sm-6 mb-4">
                      <div class="input-group">
                          <input class="form-control text-center " name="password" type="password" placeholder="Password" required>
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 mb-4">
                      <div class="input-group">
                          <input class="form-control text-center" name="password_confirmation" type="password" placeholder="Confirm Password" required>
                      </div>
                  </div>
              </div>

              <div class="mb-4">
                  <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="terms" value="1" required>
                      <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                          <i class="fa g-rounded-2" data-check-icon="&#xf00c"></i>
                      </div>
                      I accept the <a href="/terms" target="_blank">Terms and Conditions</a>
                  </label>
              </div>

              <button class="btn btn-block btn-primary rounded-0 g-py-15 mb-5" type="submit">Signup</button>

          </form>
      </div>
    </div>
  </div>
</section>
<!-- Hero Info #05 -->
@endsection