<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 12/19/2018
 * Time: 5:19 PM
 */
?>
@extends('layouts.master')

@section('content')
    <section class="container g-pt-100 g-pb-10 ">

        <div class="row justify-content-center text-center g-mb-50">
            <div class="col-lg-9">
                <h1 class="h2 g-color-white g-font-weight-600 mb-2">CitizenWarfare Discord Bot</h1>
                <div class="d-inline-block g-width-30 g-height-2 g-bg-primary mb-2"></div>
                <p class="lead mb-0">The Premier Star Citizen Event Notification Discord Bot</p>
            </div>
        </div>

        <div class="shortcode-html">
            <div class="row align-items-center">
                <div class="col-lg-5 text-center g-mb-40 g-mb-0--lg g-pr-60--lg">
                    <img class="g-mb-30" width="320" src="/assets/images/Bot_Preview.png" alt="Image Description">
                    <blockquote class="u-blockquote-v3 g-font-size-16 g-mb-20">Custom built Discord bot to make your life easier, no more cross posting in multiple discords to get your event traction.</blockquote>
                </div>

                <div class="col-lg-7">
                    <div class="row no-gutters align-items-center justify-content-center">
                        <div class="col-md-6 g-mb-30 g-z-index-2">
                            <!-- Article -->
                            <article class="text-center g-brd-around g-color-gray g-brd-gray-light-v5 g-pa-10">
                                <div class="g-bg-gray-light-v5 g-px-15 g-py-50">
                                    <!-- Article Title -->
                                    <h4 class="text-uppercase g-color-gray-dark-v3 g-font-weight-500 g-mb-10">Yearly</h4>
                                    <!-- End Article Title -->
                                    <!--<em class="g-font-style-normal">Yearly</em>-->

                                    <hr class="g-brd-gray-light-v4 g-my-20">

                                    <div class="g-color-primary g-my-30">
                                        <strong class="d-block g-font-size-30 g-line-height-1_2">$21.00</strong> per Year <small>@ $1.75/Month</small>
                                    </div>

                                    <hr class="g-brd-gray-light-v4 g-mt-20 g-mb-10">

                                    <ul class="list-unstyled g-mb-25">
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">CitizenWarfare Bot Presence in Discord.</li>
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">
                                            Receive public and private event notifications in one or two channels
                                        </li>
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">
                                            Development takes time, Adopt early for benifits down the road!, There is always More to <b>Come</b>
                                        </li>
                                    </ul>
                                    <form action="/subscription/new/yearly" method="POST">
                                        {{ csrf_field() }}
                                        <script
                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button "
                                                data-key="{{ env('STRIPE_KEY') }}"
                                                data-amount="2100"
                                                data-name="Citizenwarfare"
                                                data-description="Yearly Subscription"
                                                data-image="/storage/app/logos/Citizen_Warfare_Profile_Pic.png"
                                                data-locale="auto"
                                                data-zip-code="true"
                                                data-currency="USD"
                                                @if(Auth::check())
                                                data-email="{{ $user->email }}"
                                                @endif
                                        >
                                        </script>
                                    </form>
                                </div>
                            </article>
                            <!-- End Article -->
                        </div>

                        <div class="col-md-6 g-mb-30">
                            <!-- Article -->
                            <article class="text-center g-brd-around g-color-gray g-brd-gray-light-v5 g-pa-10">
                                <div class="g-bg-gray-light-v5 g-pa-30">
                                    <!-- Article Title -->
                                    <h4 class="text-uppercase g-color-gray-dark-v3 g-font-weight-500 g-mb-10">Monthly</h4>
                                    <!-- End Article Title -->
                                    <!--<em class="g-font-style-normal">Ed feugiat porttitor nunc, non</em>-->

                                    <hr class="g-brd-gray-light-v4 g-my-10">

                                    <div class="g-color-primary g-my-20">
                                        <strong class="d-block g-font-size-30 g-line-height-1_2">$2.00</strong> per month
                                    </div>

                                    <hr class="g-brd-gray-light-v4 g-mt-10 mb-0">

                                    <ul class="list-unstyled g-mb-25">
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">CitizenWarfare Bot Presence in Discord.</li>
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">
                                            Receive public and private event notifications in one or two channels
                                        </li>
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">
                                            Development takes time, Adopt early for benifits down the road!, There is always More to <b>Come</b>
                                        </li>
                                    </ul>
                                    <form action="{{ route('subMonthly') }}" method="POST">
                                        {{ csrf_field() }}
                                        <script
                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="{{ env('STRIPE_KEY') }}"
                                                data-amount="200"
                                                data-name="Citizenwarfare"
                                                data-description="Monthly Subscription"
                                                data-image="/storage/app/logos/Citizen_Warfare_Profile_Pic.png"
                                                data-locale="auto"
                                                data-zip-code="true"
                                                data-currency="USD"
                                                @if(Auth::check())
                                                data-email="{{ $user->email }}"
                                                @endif
                                        >
                                        </script>
                                    </form>
                                </div>
                            </article>
                            <!-- End Article -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
