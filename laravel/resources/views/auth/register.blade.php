@extends('layouts.master')

@section('content')
    <!-- Signup -->
    <section class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-9 col-lg-6">
                <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
                    <div class="text-center mb-4">
                        <h2 class="h2 g-color-white g-font-weight-600">Signup</h2>
                    </div>
                    @include('shared.errors')
                    <!-- Form -->
                    <form class="g-py-15" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="justify-content-center text-center col-md-12">
                            <h5>Organization Logo</h5>
                        </div>
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
                        <div class="mb-4">
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

                    <footer class="text-center">
                        <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Already have an account? <a class="g-font-weight-600" href="{{ route('login') }}">Sign in</a>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </section>
    <!-- End Signup -->
@endsection
