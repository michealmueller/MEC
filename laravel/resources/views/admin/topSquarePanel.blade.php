<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/17/2018
 * Time: 2:41 PM
 */
?>


    <!-- Panel -->
    <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
        <div class="card-block g-font-weight-300 g-pa-20">
            <div class="media">
                <div class="d-flex g-mr-15">
                    <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightblue-v4 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                        <i class="hs-admin-briefcase g-absolute-centered"></i>
                    </div>
                </div>

                <div class="media-body align-self-center">
                    <div class="d-flex align-items-center g-mb-5">
                        <span class="g-font-size-24 g-line-height-1 g-color-black">{{ $adminData['userCount'] }}</span>

                    </div>

                    <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Current Users</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- End Panel -->
</div>

<div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
    <!-- Panel -->
    <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
        <div class="card-block g-font-weight-300 g-pa-20">
            <div class="media">
                <div class="d-flex g-mr-15">
                    <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-teal-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                        <i class="hs-admin-check-box g-absolute-centered"></i>
                    </div>
                </div>

                <div class="media-body align-self-center">
                    <div class="d-flex align-items-center g-mb-5">
                        <span class="g-font-size-24 g-line-height-1 g-color-black">{{ $adminData['eventCount'] }}</span>

                    </div>

                    <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Total Events</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- End Panel -->
</div>

<div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
    <!-- Panel -->
    <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
        <div class="card-block g-font-weight-300 g-pa-20">
            <div class="media">
                <div class="d-flex g-mr-15">
                    <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-darkblue-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                        <i class="hs-admin-wallet g-absolute-centered"></i>
                    </div>
                </div>

                <div class="media-body align-self-center">
                    <div class="d-flex align-items-center g-mb-5">
                        <span class="g-font-size-24 g-line-height-1 g-color-black">{{ $adminData['orgCount'] }}</span>

                    </div>

                    <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Total Organizations</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- End Panel -->
</div>

<div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
    <!-- Panel -->
    <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
        <div class="card-block g-font-weight-300 g-pa-20">
            <div class="media">
                <div class="d-flex g-mr-15">
                    <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightred-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                        <i class="hs-admin-user g-absolute-centered"></i>
                    </div>
                </div>

                <div class="media-body align-self-center">
                    <div class="d-flex align-items-center g-mb-5">
                        <span class="g-font-size-24 g-line-height-1 g-color-black">148</span>
                    </div>

                    <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">New Clients</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- End Panel -->
</div>
