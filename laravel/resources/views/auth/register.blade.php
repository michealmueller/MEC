@extends('layouts.master')

@section('content')
    <!-- Login -->
    <section class="">
        <!-- Parallax Image -->
        <div class="" style="height: 140%; background-image: url(assets/images/caterpillar.jpg);"></div>
        <!-- End Parallax Image -->

        <div class="container g-pt-100 g-pb-20">
            <div class="row row-divided justify-content-between">
                <div class="col-md-6 col-lg-5 flex-md-unordered align-self-center g-mb-80">
                    <div class="u-shadow-v21 g-color-white rounded g-pa-25 g-brd-around g-brd-gray-light-v4 rounded">
                        <header class="text-center mb-4">
                            <h2 class="h2 g-color-white g-font-weight-600">New User Sign-up</h2>
                        </header>

                        <!-- Form -->
                        <form class="g-py-15" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('shared.errors')
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center">
                                    <div class="col-sm-12" style="margin-bottom:20px;">
                                        <img id="avatar" src="//placehold.it/100" class="mx-auto g-mb-10--md img-fluid img-circle d-block" alt="avatar">
                                        <label  class="btn-bs-file btn btn-block btn-primary ">
                                            Browse
                                            <input id="avatarUp" type="file" name="avatar" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
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
                            {{--<div class="mb-4">
                                <div class="input-group">
                                    <input class="form-control search-input text-center" type="text" name="q" placeholder="Organization" autocomplete="off" value="{{ old('q') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 mb-4">
                                    <div class="input-group">
                                        <input class="form-control text-center " name="org_rsi_site" type="url" placeholder="RSI Organization URL" value="{{ old('org_rsi_site') }}" required>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 mb-4">
                                    <div class="input-group">
                                        <input class="form-control text-center" name="org_discord" type="text" placeholder="Organization Discord(Optional)" value="{{ old('org_discord') }}">
                                    </div>
                                </div>
                            </div>--}}

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

                            <button class="btn btn-block btn-primary rounded-0 g-py-15 mb-5" type="submit">Sign Up</button>

                            <!--<div class="d-flex justify-content-center text-center g-mb-30">
                                <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
                                <span class="align-self-center g-color-gray-dark-v3 mx-4">OR</span>
                                <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
                            </div>

                            -- Form Social Icons --
                            <ul class="list-inline text-center mb-4">
                                <li class="list-inline-item g-mx-2">
                                    <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-facebook rounded-circle" href="/auth/facebook">
                                        <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
                                        <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-2">
                                    <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-twitter rounded-circle" href="/auth/twitter">
                                        <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-twitter"></i>
                                        <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-2">
                                    <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-google-plus rounded-circle" href="/auth/google">
                                        <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-google-plus"></i>
                                        <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Form Social Icons -->
                        </form>
                        <!-- End Form -->
                        <div>
                            <footer class="text-center" style="background:rgba(0,0,0,0.0)">
                                <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Already have an account? <a class="g-font-weight-600" href="{{ route('login') }}">Sign in</a>
                                </p>
                            </footer>
                        </div>
                    </div>
                </div>



                <div class="col-md-6 flex-md-first align-self-center g-mb-80">
                    <div class="mb-5">
                        <h1 class="h3 g-color-white g-font-weight-600 mb-3">Want to join your organization,<br>Ask your leadership for the reference code link.</h1>
                        <!--<p class="g-color-white-opacity-0_8 g-font-size-12 text-uppercase">Trusted by 31,000+ users globally</p>-->
                    </div>

                    <div class="row">
                        <div class="col-md-11 col-lg-9">
                            <!-- Icon Blocks -->
                            <div class="media mb-4">
                                <div class="d-flex mr-4">
                    <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                      <i class="icon-finance-168 u-line-icon-pro"></i>
                    </span>
                                </div>
                                <div class="media-body align-self-center">
                                    <p class="g-color-white mb-0">Create public events and share with other organizations</p>
                                </div>
                            </div>
                            <!-- End Icon Blocks -->

                            <!-- Icon Blocks -->
                            <div class="media mb-5">
                                <div class="d-flex mr-4">
                    <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                      <i class="icon-pu u-line-icon-pro"></i>
                    </span>
                                </div>
                                <div class="media-body align-self-center">
                                    <p class="g-color-white mb-0">Create Private events for inner organization training and Beer Fueled debauchery!</p>
                                </div>
                            </div>
                            <!-- End Icon Blocks -->

                            <!-- Testimonials --
                            <blockquote class="u-blockquote-v1 g-color-main rounded g-pl-60 g-pr-30 g-py-25 g-mb-40">Look no further you came to the right place. Unify offers everything you have dreamed of in one package.</blockquote>
                            <div class="media">
                                <img class="d-flex align-self-center rounded-circle g-width-40 g-height-40 mr-3" src="../../assets/img-temp/100x100/img12.jpg" alt="Image Description">
                                <div class="media-body align-self-center">
                                    <h4 class="h6 g-color-primary g-font-weight-600 g-mb-0">Alex Pottorf</h4>
                                    <em class="g-color-white g-font-style-normal g-font-size-12">Web Developer</em>
                                </div>
                            </div>
                            <!-- End Testimonials -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login -->
@endsection
