<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/16/2018
 * Time: 8:49 AM
 */
?>
@extends('layouts.master')

@section('content')
    <div class="container">
    <!-- Figure -->
    <figure class="row">
        <!-- Figure Image -->
        <div class="col-md-8 col-lg-4 g-mb-30 g-mt-30">
            <img class="w-100" src="/assets/images/dev-team-photos/Micheal-Jack.jpg" alt="Micheal Mueller">
        </div>
        <!-- End Figure Image -->

        <!-- Figure Body -->
        <div class="col-lg-8 g-mt-30">
            <div class="d-flex justify-content-between g-mb-10">
                <div class="g-mb-20">
                    <h4 class="h5 g-mb-5">Micheal Mueller (Arthmael)</h4>
                    <em class="d-block g-font-style-normal g-font-size-default text-uppercase g-color-primary">Lead Developer</em>
                </div>

                <!-- Figure Social Icons -->
                <ul class="list-inline">
                    <li class="list-inline-item g-mx-2">
                        <a class="u-icon-v3 u-icon-size--xs g-color-gray-light-v1 g-bg-gray-light-v5 g-color-white--hover g-bg-primary--hover rounded-circle" href="https://twitter.com/arthmael86">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-2">
                        <a class="u-icon-v3 u-icon-size--xs g-color-gray-light-v1 g-bg-gray-light-v5 g-color-white--hover g-bg-primary--hover rounded-circle" href="https://www.linkedin.com/in/micheal-mueller-4bb70850">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-2">
                        <a class="u-icon-v3 u-icon-size--xs g-color-gray-light-v1 g-bg-gray-light-v5 g-color-white--hover g-bg-primary--hover rounded-circle" href="https://github.com/arthmael8610">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Figure Social Icons -->
            </div>

            <!-- Figure Info -->
            <div class="g-mb-50">
                <p>Hello, My name is Micheal (Arthmael), I am a father, gamer and developer, I want to create something that
                    people use, and is useful. If you are a developer of any kind, you know what I am talking about. </p>
                <p>So i am the one responsible for this site, i created this out of the need for co-operation and ease of use.
                    I seen a need to unite organizations within star citizen and also an easy way to share what we are all doing
                    in order to work together and practice organization co-operation.</p>
                <p>My hope is that this site along with the sister site <a target="_blank" href="https://citizenwarfare.com">citizenwarfare.com</a>
                    will be useful to at the very least a few organizations.</p>

            </div>
            <!-- End Info -->
        </div>
        <!-- End Figure Body -->
    </figure>
    <!-- End Figure -->
    </div>
@endsection