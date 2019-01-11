@extends('layouts.master')

@section('content')
    <!-- Signup -->
    <section class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-9 col-lg-6">
                <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
                    <div class="text-center mb-4">
                        <h2 class="h2 g-color-white g-font-weight-600">Login</h2>
                    </div>
                @include('shared.errors')
                <!-- Form -->
                    <form class="g-py-15" method="post">
                        {{ csrf_field() }}
                        <div class="mb-4">
                            <div class="input-group">
                                <input class="form-control text-center" name="email" type="text" placeholder="Email">
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group">
                                <input class="form-control text-center " name="password" type="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="text-center mb-4">
                                <p><a href="/password/reset">Forgot your Password?</a></p>
                        </div>
                        {{--<div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="g-mb-10">
                                    <div class="g-recaptcha" data-sitekey="6LdLoogUAAAAANqS_d8JJdc979_0VWd3BhmQuqOW"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>--}}


                        <button class="btn btn-md btn-block u-btn-primary rounded-0 g-py-15 mb-5" type="submit">Login</button>

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
                </div>
            </div>
        </div>
    </section>
    <!-- End Signup -->
@endsection
