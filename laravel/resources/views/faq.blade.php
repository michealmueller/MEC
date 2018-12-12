<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 12/6/2018
 * Time: 12:17 PM
 */
?>
@extends('layouts.master')
@section('content')
<section class="container  g-pt-100 g-pb-10">
    <!-- Accordion -->
    <div id="purchase" class="u-shadow-v11 rounded g-py-100 g-mb-100">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Heading -->
                <div class="text-center g-mb-60">
                    <h2 class="g-font-weight-600 text-uppercase mb-2">F.A.Q</h2>
                </div>
                <!-- End Heading -->

                <div id="accordion" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">
                    <!-- Card -->
                    <div class="card g-brd-none rounded-0 g-mb-20">
                        <div id="accordion-heading-01" class="g-brd-bottom g-brd-gray-light-v4 g-pa-0" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed d-flex justify-content-between g-color-main g-text-underline--none--hover rounded-0 g-px-30 g-py-20" href="#accordion-body-01" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="accordion-body-01">
                                    How do I donate!?
                                    <span class="u-accordion__control-icon">
                          <i class="fa fa-angle-down"></i>
                          <i class="fa fa-angle-up"></i>
                        </span>
                                </a>
                            </h5>
                        </div>
                        <div id="accordion-body-01" class="collapse" role="tabpanel" aria-labelledby="accordion-heading-01" data-parent="#accordion">
                            <div class="u-accordion__body g-color-gray-dark-v4 g-pa-30">
                                If you would like to donate there is a button in the footer at the bottom of all pages.
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card g-brd-none rounded-0 g-mb-20">
                        <div id="accordion-heading-02" class="g-brd-bottom g-brd-gray-light-v4 g-pa-0" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed d-flex justify-content-between g-color-main g-text-underline--none--hover rounded-0 g-px-30 g-py-20" href="#accordion-body-02" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="accordion-body-02">
                                    What will you do with the donations?
                                    <span class="u-accordion__control-icon">
                          <i class="fa fa-angle-down"></i>
                          <i class="fa fa-angle-up"></i>
                        </span>
                                </a>
                            </h5>
                        </div>
                        <div id="accordion-body-02" class="collapse" role="tabpanel" aria-labelledby="accordion-heading-02" data-parent="#accordion">
                            <div class="u-accordion__body g-color-gray-dark-v4 g-pa-30">
                               All donations are first used for server fees, monthly cost is around $20 at the moment. once we get to a point that the server is chocking this will increase.
                                after the current months fees are covered the rest is kept for the following month. If donations are consistent and cover an entire year before the year is up
                                what remains will be used for paid features ( better IP detection for timezone conversions ).
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card g-brd-none rounded-0 g-mb-20">
                        <div id="accordion-heading-03" class="g-brd-bottom g-brd-gray-light-v4 g-pa-0" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed d-flex justify-content-between g-color-main g-text-underline--none--hover rounded-0 g-px-30 g-py-20" href="#accordion-body-03" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="accordion-body-03">
                                    Does Omega Corporation own / or is affiliated with this site?
                                    <span class="u-accordion__control-icon">
                          <i class="fa fa-angle-down"></i>
                          <i class="fa fa-angle-up"></i>
                        </span>
                                </a>
                            </h5>
                        </div>
                        <div id="accordion-body-03" class="collapse" role="tabpanel" aria-labelledby="accordion-heading-03" data-parent="#accordion">
                            <div class="u-accordion__body g-color-gray-dark-v4 g-pa-30">
                                While I am an Omega Corporation member, this site, and server are owned and operated by me, independently from Omega Corp.
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card g-brd-none rounded-0 g-mb-20">
                        <div id="accordion-heading-04" class="g-brd-bottom g-brd-gray-light-v4 g-pa-0" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed d-flex justify-content-between g-color-main g-text-underline--none--hover rounded-0 g-px-30 g-py-20" href="#accordion-body-04" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="accordion-body-04">
                                    Why was this site created.
                                    <span class="u-accordion__control-icon">
                          <i class="fa fa-angle-down"></i>
                          <i class="fa fa-angle-up"></i>
                        </span>
                                </a>
                            </h5>
                        </div>
                        <div id="accordion-body-04" class="collapse" role="tabpanel" aria-labelledby="accordion-heading-04" data-parent="#accordion">
                            <div class="u-accordion__body g-color-gray-dark-v4 g-pa-30">
                                I created this site as my way of helping all organizations organize, co-operate, and just have fun. Any organization is free to use or not use the site.
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Accordion -->
</section>
@endsection