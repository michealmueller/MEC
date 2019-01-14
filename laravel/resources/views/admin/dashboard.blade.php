<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/17/2018
 * Time: 2:44 PM
 */
?>
@extends('admin.adminMaster')

@section('content')
    <main class="container-fluid px-0 g-pt-65">
        <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
            @include('admin.adminnav')
            <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
                <div class="g-pa-20">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                            <!-- Panel -->
                            <div class="card h-100 g-brd-gray-light-v7 g-rounded-3">
                                <div class="card-block g-font-weight-300 g-pa-20">
                                    <div class="media">
                                        <div class="d-flex g-mr-15">
                                            <div class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightblue-v3 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                                <i class="hs-admin-briefcase g-absolute-centered"></i>
                                            </div>
                                        </div>

                                        <div class="media-body align-self-center">
                                            <div class="d-flex align-items-center g-mb-5">
                                                <span class="g-font-size-24 g-line-height-1 g-color-black">99.9%</span>
                                                <span class="d-flex align-self-center g-font-size-0 g-ml-5 g-ml-10--md">
                                                  <i class="g-fill-gray-dark-v9">
                                                    <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                      <g transform="translate(-21.000000, -751.000000)">
                                                        <g transform="translate(0.000000, 64.000000)">
                                                          <g transform="translate(20.000000, 619.000000)">
                                                            <g transform="translate(1.000000, 68.000000)">
                                                              <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                                                            </g>
                                                          </g>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                  </i>
                                                  <i class="g-fill-lightblue-v3">
                                                    <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                      <g transform="translate(-33.000000, -751.000000)">
                                                        <g transform="translate(0.000000, 64.000000)">
                                                          <g transform="translate(20.000000, 619.000000)">
                                                            <g transform="translate(1.000000, 68.000000)">
                                                              <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                                                            </g>
                                                          </g>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                  </i>
                                                </span>
                                            </div>

                                            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Projects Done</h6>
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
                                                <span class="g-font-size-24 g-line-height-1 g-color-black">324</span>
                                                <span class="d-flex align-self-center g-font-size-0 g-ml-5 g-ml-10--md">
                                                  <i class="g-fill-gray-dark-v9">
                                                    <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                      <g transform="translate(-21.000000, -751.000000)">
                                                        <g transform="translate(0.000000, 64.000000)">
                                                          <g transform="translate(20.000000, 619.000000)">
                                                            <g transform="translate(1.000000, 68.000000)">
                                                              <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                                                            </g>
                                                          </g>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                  </i>
                                                  <i class="g-fill-lightblue-v3">
                                                    <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                      <g transform="translate(-33.000000, -751.000000)">
                                                        <g transform="translate(0.000000, 64.000000)">
                                                          <g transform="translate(20.000000, 619.000000)">
                                                            <g transform="translate(1.000000, 68.000000)">
                                                              <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                                                            </g>
                                                          </g>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                  </i>
                                                </span>
                                            </div>

                                            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Total Tasks</h6>
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
                                                <span class="g-font-size-24 g-line-height-1 g-color-black">$124.2</span>
                                                <span class="d-flex align-self-center g-font-size-0 g-ml-5 g-ml-10--md">
                      <i class="g-fill-red">
                        <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g transform="translate(-21.000000, -751.000000)">
                            <g transform="translate(0.000000, 64.000000)">
                              <g transform="translate(20.000000, 619.000000)">
                                <g transform="translate(1.000000, 68.000000)">
                                  <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </i>
                      <i class="g-fill-gray-dark-v9">
                        <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g transform="translate(-33.000000, -751.000000)">
                            <g transform="translate(0.000000, 64.000000)">
                              <g transform="translate(20.000000, 619.000000)">
                                <g transform="translate(1.000000, 68.000000)">
                                  <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </i>
                    </span>
                                            </div>

                                            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Projects Done</h6>
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
                                                <span class="d-flex align-self-center g-font-size-0 g-ml-5 g-ml-10--md">
                      <i class="g-fill-gray-dark-v9">
                        <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g transform="translate(-21.000000, -751.000000)">
                            <g transform="translate(0.000000, 64.000000)">
                              <g transform="translate(20.000000, 619.000000)">
                                <g transform="translate(1.000000, 68.000000)">
                                  <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </i>
                      <i class="g-fill-gray-dark-v9">
                        <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g transform="translate(-33.000000, -751.000000)">
                            <g transform="translate(0.000000, 64.000000)">
                              <g transform="translate(20.000000, 619.000000)">
                                <g transform="translate(1.000000, 68.000000)">
                                  <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </i>
                    </span>
                                            </div>

                                            <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">New Clients</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel -->
                        </div>

                        <!-- Statistic Card -->
                        <div class="col-xl-12">
                            <!-- Statistic Card -->
                            <div class="card g-brd-gray-light-v7 g-pa-15 g-pa-25-30--md g-mb-30">
                                <header class="media g-mb-30">
                                    <h3 class="d-flex align-self-center text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">Project statistics</h3>

                                    <div class="media-body d-flex justify-content-end">
                                        <div id="rangePickerWrapper2" class="d-flex align-items-center u-datepicker-right u-datepicker--v3">
                                            <input id="rangeDatepicker2" class="g-font-size-12 g-font-size-default--md flatpickr-input" type="text" data-rp-wrapper="#rangePickerWrapper2" data-rp-type="range" data-rp-date-format="d M Y" data-rp-default-date="[&quot;01 Jan 2016&quot;, &quot;31 Dec 2017&quot;]" readonly="readonly" style="width: 187.5px;">
                                            <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v3"></i>
                                            <div class="flatpickr-calendar rangeMode animate showTimeInput arrowTop rightMost" tabindex="-1" style="top: 268.938px; left: auto; right: 117.984px;"><div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-current-month"><span class="cur-month" title="Scroll to increment">January </span><div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div></div><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays">
                                                <span class="flatpickr-weekday">
                                                  Mo</span><span class="flatpickr-weekday">Tu</span><span class="flatpickr-weekday">We</span><span class="flatpickr-weekday">Th</span><span class="flatpickr-weekday">Fr</span><span class="flatpickr-weekday">Sa</span><span class="flatpickr-weekday">Su
                                                </span>
                                                        </div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="December 28, 2015" tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="December 29, 2015" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="December 30, 2015" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="December 31, 2015" tabindex="-1">31</span><span class="flatpickr-day selected startRange" aria-label="January 1, 2016" tabindex="-1">1</span><span class="flatpickr-day inRange" aria-label="January 2, 2016" tabindex="-1">2</span><span class="flatpickr-day inRange" aria-label="January 3, 2016" tabindex="-1">3</span><span class="flatpickr-day inRange" aria-label="January 4, 2016" tabindex="-1">4</span><span class="flatpickr-day inRange" aria-label="January 5, 2016" tabindex="-1">5</span><span class="flatpickr-day inRange" aria-label="January 6, 2016" tabindex="-1">6</span><span class="flatpickr-day inRange" aria-label="January 7, 2016" tabindex="-1">7</span><span class="flatpickr-day inRange" aria-label="January 8, 2016" tabindex="-1">8</span><span class="flatpickr-day inRange" aria-label="January 9, 2016" tabindex="-1">9</span><span class="flatpickr-day inRange" aria-label="January 10, 2016" tabindex="-1">10</span><span class="flatpickr-day inRange" aria-label="January 11, 2016" tabindex="-1">11</span><span class="flatpickr-day inRange" aria-label="January 12, 2016" tabindex="-1">12</span><span class="flatpickr-day inRange" aria-label="January 13, 2016" tabindex="-1">13</span><span class="flatpickr-day inRange" aria-label="January 14, 2016" tabindex="-1">14</span><span class="flatpickr-day inRange" aria-label="January 15, 2016" tabindex="-1">15</span><span class="flatpickr-day inRange" aria-label="January 16, 2016" tabindex="-1">16</span><span class="flatpickr-day inRange" aria-label="January 17, 2016" tabindex="-1">17</span><span class="flatpickr-day inRange" aria-label="January 18, 2016" tabindex="-1">18</span><span class="flatpickr-day inRange" aria-label="January 19, 2016" tabindex="-1">19</span><span class="flatpickr-day inRange" aria-label="January 20, 2016" tabindex="-1">20</span><span class="flatpickr-day inRange" aria-label="January 21, 2016" tabindex="-1">21</span><span class="flatpickr-day inRange" aria-label="January 22, 2016" tabindex="-1">22</span><span class="flatpickr-day inRange" aria-label="January 23, 2016" tabindex="-1">23</span><span class="flatpickr-day inRange" aria-label="January 24, 2016" tabindex="-1">24</span><span class="flatpickr-day inRange" aria-label="January 25, 2016" tabindex="-1">25</span><span class="flatpickr-day inRange" aria-label="January 26, 2016" tabindex="-1">26</span><span class="flatpickr-day inRange" aria-label="January 27, 2016" tabindex="-1">27</span><span class="flatpickr-day inRange" aria-label="January 28, 2016" tabindex="-1">28</span><span class="flatpickr-day inRange" aria-label="January 29, 2016" tabindex="-1">29</span><span class="flatpickr-day inRange" aria-label="January 30, 2016" tabindex="-1">30</span><span class="flatpickr-day inRange" aria-label="January 31, 2016" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 1, 2016" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 2, 2016" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 3, 2016" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 4, 2016" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 5, 2016" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 6, 2016" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 7, 2016" tabindex="-1">7</span></div></div></div></div></div></div>

                                        <a class="d-flex align-items-center hs-admin-panel u-link-v5 g-font-size-20 g-color-gray-light-v3 g-color-secondary--hover g-ml-5 g-ml-30--md" href="#!"></a>
                                    </div>
                                </header>

                                <section>
                                    <ul class="list-unstyled d-flex g-mb-45">
                                        <li class="media">
                                            <div class="d-flex align-self-center g-mr-8">
                                                <span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-lightblue-v3"></span>
                                            </div>

                                            <div class="media-body align-self-center g-font-size-12 g-font-size-default--md">Total hits</div>
                                        </li>
                                        <li class="media g-ml-5 g-ml-35--md">
                                            <div class="d-flex align-self-center g-mr-8">
                                                <span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-darkblue-v2"></span>
                                            </div>

                                            <div class="media-body align-self-center g-font-size-12 g-font-size-default--md">Unique visits</div>
                                        </li>
                                        <li class="media g-ml-5 g-ml-35--md">
                                            <div class="d-flex align-self-center g-mr-8">
                                                <span class="u-badge-v2--md g-pos-stc g-transform-origin--top-left g-bg-lightred-v2"></span>
                                            </div>

                                            <div class="media-body align-self-center g-font-size-12 g-font-size-default--md">New orders</div>
                                        </li>
                                    </ul>

                                    <div class="js-area-chart u-area-chart--v1 g-pos-rel g-line-height-0" data-height="300px" data-mobile-height="180px" data-high="5000000" data-low="0" data-offset-x="30" data-offset-y="50" data-postfix=" m" data-is-show-area="true" data-is-show-line="false" data-is-show-point="true" data-is-full-width="true" data-is-stack-bars="true" data-is-show-axis-x="true" data-is-show-axis-y="true" data-is-show-tooltips="true" data-tooltip-description-position="right" data-tooltip-custom-class="u-tooltip--v2 g-font-weight-300 g-font-size-default g-color-gray-dark-v6" data-align-text-axis-x="center" data-fill-opacity=".7" data-fill-colors="[&quot;#e62154&quot;,&quot;#3dd1e8&quot;,&quot;#1d75e5&quot;]" data-stroke-color="#e1eaea" data-stroke-dash-array="0" data-text-size-x="14px" data-text-color-x="#000000" data-text-offset-top-x="10" data-text-size-y="14px" data-text-color-y="#53585e" data-points-colors="[&quot;#e62154&quot;,&quot;#3dd1e8&quot;,&quot;#1d75e5&quot;]" data-series="[
              [
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 500000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 700000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 1100000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 800000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 800000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 1000000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 2300000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 700000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 600000},
                {&quot;meta&quot;: &quot;Orders&quot;, &quot;value&quot;: 300000}
              ],
              [
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 3300000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 500000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 500000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 800000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 1100000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 1500000},
                {&quot;meta&quot;: &quot;Hits&quot;, &quot;value&quot;: 300000}
              ],
              [
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 2300000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 1000000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 500000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 500000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 500000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 1000000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 300000},
                {&quot;meta&quot;: &quot;Visits&quot;, &quot;value&quot;: 300000}
              ]
            ]" data-labels="[&quot;Jan&quot;, &quot;Feb&quot;, &quot;Apr&quot;, &quot;May&quot;, &quot;Jun&quot;, &quot;Jul&quot;, &quot;Aug&quot;, &quot;Sep&quot;, &quot;Oct&quot;, &quot;Nov&quot;, &quot;Dec&quot;]" id="areaCharts0"><div class="chartist-tooltip u-tooltip--v2 g-font-weight-300 g-font-size-default g-color-gray-dark-v6" style="top: 81.0625px; left: 1463.03px;"></div><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="300px" class="ct-chart-line" style="width: 100%; height: 300px;"><g class="ct-grids"><line x1="50" x2="50" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="186.4588068181818" x2="186.4588068181818" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="322.9176136363636" x2="322.9176136363636" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="459.37642045454544" x2="459.37642045454544" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="595.8352272727273" x2="595.8352272727273" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="732.294034090909" x2="732.294034090909" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="868.7528409090909" x2="868.7528409090909" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="1005.2116477272727" x2="1005.2116477272727" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="1141.6704545454545" x2="1141.6704545454545" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="1278.1292613636363" x2="1278.1292613636363" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="1414.588068181818" x2="1414.588068181818" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line x1="1551.046875" x2="1551.046875" y1="0" y2="270" class="ct-grid ct-horizontal"></line><line y1="270" y2="270" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="243" y2="243" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="216" y2="216" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="189" y2="189" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="162" y2="162" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="135" y2="135" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="108" y2="108" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="81" y2="81" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="54" y2="54" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="27" y2="27" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="50" x2="1551.046875" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,270L50,253.8C95.486,250.2,140.973,246.6,186.459,243C231.945,239.4,277.431,237,322.918,232.2C368.404,227.4,413.89,210.6,459.376,210.6C504.863,210.6,550.349,226.8,595.835,226.8C641.321,226.8,686.808,226.8,732.294,226.8C777.78,226.8,823.267,222.24,868.753,216C914.239,209.76,959.725,145.8,1005.212,145.8C1050.698,145.8,1096.184,220.68,1141.67,232.2C1187.157,243.72,1232.643,253.8,1278.129,253.8C1323.616,253.8,1369.102,237.6,1414.588,237.6C1460.074,237.6,1505.561,248.4,1551.047,253.8L1551.047,270Z" class="ct-area"></path><line x1="50" y1="253.8" x2="50.01" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Orders"></line><line x1="186.4588068181818" y1="243" x2="186.4688068181818" y2="243" class="ct-point" ct:value="500000" ct:meta="Orders"></line><line x1="322.9176136363636" y1="232.2" x2="322.9276136363636" y2="232.2" class="ct-point" ct:value="700000" ct:meta="Orders"></line><line x1="459.37642045454544" y1="210.6" x2="459.38642045454543" y2="210.6" class="ct-point" ct:value="1100000" ct:meta="Orders"></line><line x1="595.8352272727273" y1="226.8" x2="595.8452272727272" y2="226.8" class="ct-point" ct:value="800000" ct:meta="Orders"></line><line x1="732.294034090909" y1="226.8" x2="732.304034090909" y2="226.8" class="ct-point" ct:value="800000" ct:meta="Orders"></line><line x1="868.7528409090909" y1="216" x2="868.7628409090909" y2="216" class="ct-point" ct:value="1000000" ct:meta="Orders"></line><line x1="1005.2116477272727" y1="145.8" x2="1005.2216477272727" y2="145.8" class="ct-point" ct:value="2300000" ct:meta="Orders"></line><line x1="1141.6704545454545" y1="232.2" x2="1141.6804545454545" y2="232.2" class="ct-point" ct:value="700000" ct:meta="Orders"></line><line x1="1278.1292613636363" y1="253.8" x2="1278.1392613636363" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Orders"></line><line x1="1414.588068181818" y1="237.6" x2="1414.598068181818" y2="237.6" class="ct-point" ct:value="600000" ct:meta="Orders"></line><line x1="1551.046875" y1="253.8" x2="1551.056875" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Orders"></line></g><g class="ct-series ct-series-b"><path d="M50,270L50,253.8C95.486,253.8,140.973,253.8,186.459,253.8C231.945,253.8,277.431,253.8,322.918,253.8C368.404,253.8,413.89,253.8,459.376,253.8C504.863,253.8,550.349,253.8,595.835,253.8C641.321,253.8,686.808,91.8,732.294,91.8C777.78,91.8,823.267,243,868.753,243C914.239,243,959.725,243,1005.212,243C1050.698,243,1096.184,232.2,1141.67,226.8C1187.157,221.4,1232.643,216.771,1278.129,210.6C1323.616,204.429,1369.102,189,1414.588,189C1460.074,189,1505.561,232.2,1551.047,253.8L1551.047,270Z" class="ct-area"></path><line x1="50" y1="253.8" x2="50.01" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Hits"></line><line x1="186.4588068181818" y1="253.8" x2="186.4688068181818" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Hits"></line><line x1="322.9176136363636" y1="253.8" x2="322.9276136363636" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Hits"></line><line x1="459.37642045454544" y1="253.8" x2="459.38642045454543" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Hits"></line><line x1="595.8352272727273" y1="253.8" x2="595.8452272727272" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Hits"></line><line x1="732.294034090909" y1="91.80000000000001" x2="732.304034090909" y2="91.80000000000001" class="ct-point" ct:value="3300000" ct:meta="Hits"></line><line x1="868.7528409090909" y1="243" x2="868.7628409090909" y2="243" class="ct-point" ct:value="500000" ct:meta="Hits"></line><line x1="1005.2116477272727" y1="243" x2="1005.2216477272727" y2="243" class="ct-point" ct:value="500000" ct:meta="Hits"></line><line x1="1141.6704545454545" y1="226.8" x2="1141.6804545454545" y2="226.8" class="ct-point" ct:value="800000" ct:meta="Hits"></line><line x1="1278.1292613636363" y1="210.6" x2="1278.1392613636363" y2="210.6" class="ct-point" ct:value="1100000" ct:meta="Hits"></line><line x1="1414.588068181818" y1="189" x2="1414.598068181818" y2="189" class="ct-point" ct:value="1500000" ct:meta="Hits"></line><line x1="1551.046875" y1="253.8" x2="1551.056875" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Hits"></line></g><g class="ct-series ct-series-c"><path d="M50,270L50,253.8C95.486,253.8,140.973,253.8,186.459,253.8C231.945,253.8,277.431,253.8,322.918,253.8C368.404,253.8,413.89,253.8,459.376,253.8C504.863,253.8,550.349,145.8,595.835,145.8C641.321,145.8,686.808,203,732.294,216C777.78,229,823.267,243,868.753,243C914.239,243,959.725,243,1005.212,243C1050.698,243,1096.184,243,1141.67,243C1187.157,243,1232.643,216,1278.129,216C1323.616,216,1369.102,253.8,1414.588,253.8C1460.074,253.8,1505.561,253.8,1551.047,253.8L1551.047,270Z" class="ct-area"></path><line x1="50" y1="253.8" x2="50.01" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Visits"></line><line x1="186.4588068181818" y1="253.8" x2="186.4688068181818" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Visits"></line><line x1="322.9176136363636" y1="253.8" x2="322.9276136363636" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Visits"></line><line x1="459.37642045454544" y1="253.8" x2="459.38642045454543" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Visits"></line><line x1="595.8352272727273" y1="145.8" x2="595.8452272727272" y2="145.8" class="ct-point" ct:value="2300000" ct:meta="Visits"></line><line x1="732.294034090909" y1="216" x2="732.304034090909" y2="216" class="ct-point" ct:value="1000000" ct:meta="Visits"></line><line x1="868.7528409090909" y1="243" x2="868.7628409090909" y2="243" class="ct-point" ct:value="500000" ct:meta="Visits"></line><line x1="1005.2116477272727" y1="243" x2="1005.2216477272727" y2="243" class="ct-point" ct:value="500000" ct:meta="Visits"></line><line x1="1141.6704545454545" y1="243" x2="1141.6804545454545" y2="243" class="ct-point" ct:value="500000" ct:meta="Visits"></line><line x1="1278.1292613636363" y1="216" x2="1278.1392613636363" y2="216" class="ct-point" ct:value="1000000" ct:meta="Visits"></line><line x1="1414.588068181818" y1="253.8" x2="1414.598068181818" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Visits"></line><line x1="1551.046875" y1="253.8" x2="1551.056875" y2="253.8" class="ct-point" ct:value="300000" ct:meta="Visits"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="285" width="136.4588068181818" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Jan</span></foreignObject><foreignObject style="overflow: visible;" x="186.4588068181818" y="285" width="136.4588068181818" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Feb</span></foreignObject><foreignObject style="overflow: visible;" x="322.9176136363636" y="285" width="136.4588068181818" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Apr</span></foreignObject><foreignObject style="overflow: visible;" x="459.37642045454544" y="285" width="136.4588068181818" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">May</span></foreignObject><foreignObject style="overflow: visible;" x="595.8352272727273" y="285" width="136.45880681818176" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Jun</span></foreignObject><foreignObject style="overflow: visible;" x="732.294034090909" y="285" width="136.45880681818187" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Jul</span></foreignObject><foreignObject style="overflow: visible;" x="868.7528409090909" y="285" width="136.45880681818187" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Aug</span></foreignObject><foreignObject style="overflow: visible;" x="1005.2116477272727" y="285" width="136.45880681818176" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Sep</span></foreignObject><foreignObject style="overflow: visible;" x="1141.6704545454545" y="285" width="136.45880681818176" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Oct</span></foreignObject><foreignObject style="overflow: visible;" x="1278.1292613636363" y="285" width="136.45880681818176" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Nov</span></foreignObject><foreignObject style="overflow: visible;" x="1414.588068181818" y="285" width="136.45880681818198" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 136px; height: 20px;">Dec</span></foreignObject><foreignObject style="overflow: visible;" x="1551.046875" y="285" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;"></span></foreignObject><foreignObject style="overflow: visible;" y="243" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">0 m</span></foreignObject><foreignObject style="overflow: visible;" y="216" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">0.5 m</span></foreignObject><foreignObject style="overflow: visible;" y="189" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">1 m</span></foreignObject><foreignObject style="overflow: visible;" y="162" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">1.5 m</span></foreignObject><foreignObject style="overflow: visible;" y="135" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">2 m</span></foreignObject><foreignObject style="overflow: visible;" y="108" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">2.5 m</span></foreignObject><foreignObject style="overflow: visible;" y="81" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">3 m</span></foreignObject><foreignObject style="overflow: visible;" y="54" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">3.5 m</span></foreignObject><foreignObject style="overflow: visible;" y="27" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">4 m</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="27" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 27px; width: 40px;">4.5 m</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="40"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 40px;">5 m</span></foreignObject></g></svg></div><style id="areaChartsStyle0">#areaCharts0 .ct-grid {stroke: #e1eaea; stroke-dasharray: 0}#areaCharts0 .ct-line {stroke: #e1eaea; stroke-width: undefined}#areaCharts0 .ct-area {fill-opacity: .7}#areaCharts0 .ct-horizontal {font-size: 14px; color: #000000; justify-content: center}#areaCharts0 .ct-vertical {font-size: 14px; color: #53585e}#areaCharts0 .ct-series:nth-child(1) .ct-area {fill: #e62154}#areaCharts0 .ct-series:nth-child(1) .ct-point {stroke: #e62154}#areaCharts0 .ct-series:nth-child(2) .ct-area {fill: #3dd1e8}#areaCharts0 .ct-series:nth-child(2) .ct-point {stroke: #3dd1e8}#areaCharts0 .ct-series:nth-child(3) .ct-area {fill: #1d75e5}#areaCharts0 .ct-series:nth-child(3) .ct-point {stroke: #1d75e5}</style>
                                </section>
                            </div>
                            <!-- End Statistic Card -->
                        </div>
                        <!-- End Statistic Card -->

                        <!-- Income Card -->
                        <div class="col-xl-8">

                            <!-- Income Cards -->
                            <div class="card g-brd-gray-light-v7 g-mb-30">
                                <header class="media g-pa-15 g-pa-25-30-0--md g-mb-20">
                                    <div class="media-body align-self-center">
                                        <h3 class="text-uppercase g-font-size-default g-color-black g-mb-8">Total Income</h3>

                                        <div id="rangePickerWrapper3" class="u-datepicker-left u-datepicker--v3">
                                            <input id="rangeDatepicker3" class="g-font-size-12 g-font-size-default--md flatpickr-input" type="text" data-rp-wrapper="#rangePickerWrapper3" data-rp-type="range" data-rp-date-format="d M Y" data-rp-default-date="[&quot;01 Jan 2016&quot;, &quot;31 Dec 2017&quot;]" readonly="readonly" style="width: 187.5px;">
                                            <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v3"></i>
                                            <div class="flatpickr-calendar rangeMode animate showTimeInput arrowTop" tabindex="-1" style="top: 498.906px; left: 300.969px; right: auto;"><div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-current-month"><span class="cur-month" title="Scroll to increment">January </span><div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div></div><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays">
    <span class="flatpickr-weekday">
      Mo</span><span class="flatpickr-weekday">Tu</span><span class="flatpickr-weekday">We</span><span class="flatpickr-weekday">Th</span><span class="flatpickr-weekday">Fr</span><span class="flatpickr-weekday">Sa</span><span class="flatpickr-weekday">Su
    </span>
                                                        </div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="December 28, 2015" tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="December 29, 2015" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="December 30, 2015" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="December 31, 2015" tabindex="-1">31</span><span class="flatpickr-day selected startRange" aria-label="January 1, 2016" tabindex="-1">1</span><span class="flatpickr-day inRange" aria-label="January 2, 2016" tabindex="-1">2</span><span class="flatpickr-day inRange" aria-label="January 3, 2016" tabindex="-1">3</span><span class="flatpickr-day inRange" aria-label="January 4, 2016" tabindex="-1">4</span><span class="flatpickr-day inRange" aria-label="January 5, 2016" tabindex="-1">5</span><span class="flatpickr-day inRange" aria-label="January 6, 2016" tabindex="-1">6</span><span class="flatpickr-day inRange" aria-label="January 7, 2016" tabindex="-1">7</span><span class="flatpickr-day inRange" aria-label="January 8, 2016" tabindex="-1">8</span><span class="flatpickr-day inRange" aria-label="January 9, 2016" tabindex="-1">9</span><span class="flatpickr-day inRange" aria-label="January 10, 2016" tabindex="-1">10</span><span class="flatpickr-day inRange" aria-label="January 11, 2016" tabindex="-1">11</span><span class="flatpickr-day inRange" aria-label="January 12, 2016" tabindex="-1">12</span><span class="flatpickr-day inRange" aria-label="January 13, 2016" tabindex="-1">13</span><span class="flatpickr-day inRange" aria-label="January 14, 2016" tabindex="-1">14</span><span class="flatpickr-day inRange" aria-label="January 15, 2016" tabindex="-1">15</span><span class="flatpickr-day inRange" aria-label="January 16, 2016" tabindex="-1">16</span><span class="flatpickr-day inRange" aria-label="January 17, 2016" tabindex="-1">17</span><span class="flatpickr-day inRange" aria-label="January 18, 2016" tabindex="-1">18</span><span class="flatpickr-day inRange" aria-label="January 19, 2016" tabindex="-1">19</span><span class="flatpickr-day inRange" aria-label="January 20, 2016" tabindex="-1">20</span><span class="flatpickr-day inRange" aria-label="January 21, 2016" tabindex="-1">21</span><span class="flatpickr-day inRange" aria-label="January 22, 2016" tabindex="-1">22</span><span class="flatpickr-day inRange" aria-label="January 23, 2016" tabindex="-1">23</span><span class="flatpickr-day inRange" aria-label="January 24, 2016" tabindex="-1">24</span><span class="flatpickr-day inRange" aria-label="January 25, 2016" tabindex="-1">25</span><span class="flatpickr-day inRange" aria-label="January 26, 2016" tabindex="-1">26</span><span class="flatpickr-day inRange" aria-label="January 27, 2016" tabindex="-1">27</span><span class="flatpickr-day inRange" aria-label="January 28, 2016" tabindex="-1">28</span><span class="flatpickr-day inRange" aria-label="January 29, 2016" tabindex="-1">29</span><span class="flatpickr-day inRange" aria-label="January 30, 2016" tabindex="-1">30</span><span class="flatpickr-day inRange" aria-label="January 31, 2016" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 1, 2016" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 2, 2016" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 3, 2016" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 4, 2016" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 5, 2016" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 6, 2016" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 7, 2016" tabindex="-1">7</span></div></div></div></div></div></div>
                                    </div>

                                    <div class="d-flex align-self-end align-items-center">
                                        <span class="g-line-height-1 g-font-weight-300 g-font-size-28 g-color-secondary">$48,200</span>
                                        <span class="d-flex align-self-center g-font-size-0 g-ml-10">
        <i class="g-fill-gray-dark-v9">
          <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g transform="translate(-21.000000, -751.000000)">
              <g transform="translate(0.000000, 64.000000)">
                <g transform="translate(20.000000, 619.000000)">
                  <g transform="translate(1.000000, 68.000000)">
                    <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </i>
        <i class="g-fill-lightblue-v3">
          <svg width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g transform="translate(-33.000000, -751.000000)">
              <g transform="translate(0.000000, 64.000000)">
                <g transform="translate(20.000000, 619.000000)">
                  <g transform="translate(1.000000, 68.000000)">
                    <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </i>
      </span>
                                    </div>
                                </header>

                                <div class="js-custom-scroll g-height-500 g-pa-15 g-pa-0-30-25--md mCustomScrollbar _mCS_3 mCS-autoHide" style="position: relative; overflow: visible;"><div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: 475px;"><div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                            <table class="table table-responsive-sm w-100">
                                                <thead>
                                                <tr>
                                                    <th class="g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none g-pl-20">#</th>
                                                    <th class="g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none">Name</th>
                                                    <th class="g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none">Status</th>
                                                    <th class="g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none">Date</th>
                                                    <th class="text-right g-font-weight-300 g-color-gray-dark-v6 g-brd-top-none">Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">1</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Business Cards</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-lightblue-v3 g-bg-lightblue-v3 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">approved</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Aug 12, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">$2045</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">2</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Advertising Outdoors</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-lightred-v2 g-bg-lightred-v2 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">pending</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Jun 6, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">$995</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">3</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Freelance Design</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">done</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Sep 8, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">$1025</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">4</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Music Improvement</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-lightblue-v3 g-bg-lightblue-v3 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">approved</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Dec 20, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">$9562</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">5</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10">Truck Advertising</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">done</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10">Dec 24, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10">$5470</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">6</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Business Cards</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-lightblue-v3 g-bg-lightblue-v3 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">approved</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Aug 12, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">$2045</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">7</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Advertising Outdoors</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-lightred-v2 g-bg-lightred-v2 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">pending</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Jun 6, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">$995</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">8</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Freelance Design</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">done</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Sep 8, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">$1025</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">9</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Music Improvement</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-lightblue-v3 g-bg-lightblue-v3 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">approved</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">Dec 20, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom g-brd-2 g-brd-gray-light-v4 g-py-10">$9562</td>
                                                </tr>

                                                <tr>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10 g-pl-20">10</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10">Truck Advertising</td>
                                                    <td class="g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10">
                                                        <span class="u-tags-v1 text-center g-width-100 g-brd-around g-brd-teal-v2 g-bg-teal-v2 g-font-size-default g-color-white g-rounded-50 g-py-4 g-px-15">done</span>
                                                    </td>
                                                    <td class="g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10">Dec 24, 2016</td>
                                                    <td class="text-right g-font-size-default g-color-black g-valign-middle g-brd-top-none g-brd-bottom--md g-brd-2 g-brd-gray-light-v4 g-py-10">$5470</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div></div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 378px; max-height: 466px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>

                                <div class="js-area-chart u-area-chart--v1 g-pos-rel g-line-height-0" data-height="65px" data-high="2420" data-low="0" data-offset-x="0" data-offset-y="0" data-postfix=" m" data-is-show-area="true" data-is-show-line="false" data-is-show-point="true" data-is-full-width="true" data-is-stack-bars="true" data-is-show-axis-x="false" data-is-show-axis-y="false" data-is-show-tooltips="true" data-tooltip-description-position="left" data-tooltip-custom-class="u-tooltip--v2 g-font-weight-300 g-font-size-default g-color-gray-dark-v6" data-align-text-axis-x="center" data-fill-opacity="1" data-fill-colors="[&quot;#67c8d8&quot;]" data-stroke-color="#e1eaea" data-stroke-dash-array="0" data-text-size-x="14px" data-text-color-x="#000000" data-text-offset-top-x="0" data-text-size-y="14px" data-text-color-y="#53585e" data-points-colors="[&quot;#1cc9e4&quot;]" data-series="[
            [
              {&quot;meta&quot;: &quot;$&quot;, &quot;value&quot;: 100},
              {&quot;meta&quot;: &quot;$&quot;, &quot;value&quot;: 2100},
              {&quot;meta&quot;: &quot;$&quot;, &quot;value&quot;: 350},
              {&quot;meta&quot;: &quot;$&quot;, &quot;value&quot;: 2920},
              {&quot;meta&quot;: &quot;$&quot;, &quot;value&quot;: 840},
              {&quot;meta&quot;: &quot;$&quot;, &quot;value&quot;: 2770}
            ]
          ]" data-labels="[&quot;2013&quot;, &quot;2014&quot;, &quot;2015&quot;, &quot;2016&quot;, &quot;2017&quot;]" id="areaCharts1"><div class="chartist-tooltip u-tooltip--v2 g-font-weight-300 g-font-size-default g-color-gray-dark-v6"></div><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="65px" class="ct-chart-line" style="width: 100%; height: 65px;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M0,65L0,62.833C70.891,48.389,141.781,19.5,212.672,19.5C283.563,19.5,354.453,57.417,425.344,57.417C496.234,57.417,567.125,1.733,638.016,1.733C708.906,1.733,779.797,46.8,850.688,46.8C921.578,46.8,992.469,18.922,1063.359,4.983L1063.359,65Z" class="ct-area"></path><line x1="0" y1="62.833333333333336" x2="0.01" y2="62.833333333333336" class="ct-point" ct:value="100" ct:meta="$"></line><line x1="212.671875" y1="19.5" x2="212.681875" y2="19.5" class="ct-point" ct:value="2100" ct:meta="$"></line><line x1="425.34375" y1="57.416666666666664" x2="425.35375" y2="57.416666666666664" class="ct-point" ct:value="350" ct:meta="$"></line><line x1="638.015625" y1="1.7333333333333343" x2="638.025625" y2="1.7333333333333343" class="ct-point" ct:value="2920" ct:meta="$"></line><line x1="850.6875" y1="46.8" x2="850.6975" y2="46.8" class="ct-point" ct:value="840" ct:meta="$"></line><line x1="1063.359375" y1="4.983333333333334" x2="1063.369375" y2="4.983333333333334" class="ct-point" ct:value="2770" ct:meta="$"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="0" y="70" width="212.671875" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 213px; height: 0px;">2013</span></foreignObject><foreignObject style="overflow: visible;" x="212.671875" y="70" width="212.671875" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 213px; height: 0px;">2014</span></foreignObject><foreignObject style="overflow: visible;" x="425.34375" y="70" width="212.671875" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 213px; height: 0px;">2015</span></foreignObject><foreignObject style="overflow: visible;" x="638.015625" y="70" width="212.671875" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 213px; height: 0px;">2016</span></foreignObject><foreignObject style="overflow: visible;" x="850.6875" y="70" width="212.671875" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 213px; height: 0px;">2017</span></foreignObject><foreignObject style="overflow: visible;" x="1063.359375" y="70" width="30" height="0"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 0px;"></span></foreignObject><foreignObject style="overflow: visible;" y="43.33333333333333" x="0" height="21.666666666666668" width="0"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 22px; width: 0px;">0 m</span></foreignObject><foreignObject style="overflow: visible;" y="21.66666666666666" x="0" height="21.666666666666668" width="0"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 22px; width: 0px;">0.001 m</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="21.666666666666664" width="0"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 22px; width: 0px;">0.002 m</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="0"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 0px;">0.003 m</span></foreignObject></g></svg></div><style id="areaChartsStyle1">#areaCharts1 .ct-grid {stroke: #e1eaea; stroke-dasharray: 0}#areaCharts1 .ct-line {stroke: #e1eaea; stroke-width: undefined}#areaCharts1 .ct-area {fill-opacity: 1}#areaCharts1 .ct-horizontal {font-size: 14px; color: #000000; justify-content: center}#areaCharts1 .ct-vertical {font-size: 14px; color: #53585e}#areaCharts1 .ct-series:nth-child(1) .ct-area {fill: #67c8d8}#areaCharts1 .ct-series:nth-child(1) .ct-point {stroke: #1cc9e4}</style>
                            </div>
                            <!-- End Income Cards -->
                        </div>
                        <!-- End Income Card -->

                        <!-- Calendar Card -->
                        <div class="col-xl-4">

                            <!-- Calendar Card -->
                            <div class="g-mb-30">
                                <header class="u-bg-overlay g-bg-img-hero g-bg-black-opacity-0_5--after g-rounded-4 g-rounded-0--bottom-left g-rounded-0--bottom-right g-overflow-hidden" style="background-image: url(../../assets/img-temp/400x270/img3.jpg);">
                                    <div class="u-bg-overlay__inner g-color-white g-pa-30">
                                        <h3 class="g-font-weight-300 g-font-size-28 g-color-white g-mb-35">
                                            Friday 3rd
                                            <span class="d-block g-font-size-16">January 2017</span>
                                        </h3>
                                        <a class="btn btn-md text-uppercase u-btn-outline-white" href="#">Add event</a>
                                    </div>
                                </header>

                                <section class="g-brd-around g-brd-top-none g-brd-gray-light-v7 g-rounded-4 g-rounded-0--top-left g-rounded-0--top-right">
                                    <div class="g-pa-10 g-pa-20--md">
                                        <div id="datepicker" class="u-datepicker--v2 hasDatepicker"><div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="<i class=&quot;fa fa-angle-left&quot;></i>"><span class="ui-icon ui-icon-circle-triangle-w"><i class="fa fa-angle-left"></i></span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="<i class=&quot;fa fa-angle-right&quot;></i>"><span class="ui-icon ui-icon-circle-triangle-e"><i class="fa fa-angle-right"></i></span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">January</span>&nbsp;<span class="ui-datepicker-year">2019</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th scope="col" class="ui-datepicker-week-end"><span title="Sunday">SU</span></th><th scope="col"><span title="Monday">MO</span></th><th scope="col"><span title="Tuesday">TU</span></th><th scope="col"><span title="Wednesday">WE</span></th><th scope="col"><span title="Thursday">TH</span></th><th scope="col"><span title="Friday">FR</span></th><th scope="col" class="ui-datepicker-week-end"><span title="Saturday">SA</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">30</span></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">31</span></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">1</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">4</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">5</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">6</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">7</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">8</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">9</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">11</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">12</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">13</a></td><td class=" ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default ui-state-highlight ui-state-active ui-state-hover" href="#">14</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">15</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">16</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">18</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">19</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">20</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">21</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">22</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">23</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">24</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">25</a></td><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">26</a></td></tr><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">27</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">28</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">29</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">30</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default" href="#">31</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">1</span></td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">2</span></td></tr></tbody></table></div></div>
                                    </div>

                                    <ul class="list-unstyled">
                                        <li class="media g-bg-gray-light-v8 g-brd-left g-brd-2 g-brd-darkblue-v2 g-px-30 g-py-15 g-mb-2 g-ml-minus-1">
                                            <strong class="d-flex align-self-center g-width-80 g-color-black">8:00am</strong>

                                            <div class="media-body g-font-weight-300 g-color-black">Build My Own Website</div>
                                        </li>
                                        <li class="media g-bg-gray-light-v8 g-brd-left g-brd-2 g-brd-secondary g-px-30 g-py-15 g-mb-2 g-ml-minus-1">
                                            <strong class="d-flex align-self-center g-width-80 g-color-black">9:00am</strong>

                                            <div class="media-body g-font-weight-300 g-color-black">Create New Content</div>
                                        </li>
                                        <li class="media g-bg-gray-light-v8 g-brd-left g-brd-2 g-brd-darkblue-v2 g-px-30 g-py-15 g-mb-2 g-ml-minus-1">
                                            <strong class="d-flex align-self-center g-width-80 g-color-black">10:00am</strong>

                                            <div class="media-body g-font-weight-300 g-color-black">Check Unify Profile Updates</div>
                                        </li>
                                    </ul>
                                </section>
                            </div>
                            <!-- End Calendar Card -->
                        </div>
                        <!-- End Calendar Card -->

                        <!-- Activity Card -->
                        <div class="col-xl-4">

                            <!-- Activity Card -->
                            <div class="card g-brd-gray-light-v7 g-mb-30">
                                <header class="media g-pa-15 g-pa-25-30-0--md g-mb-16">
                                    <h3 class="d-flex align-self-center text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mr-20 mb-0">Activity</h3>

                                    <div class="media-body d-flex justify-content-end">
                                        <div id="rangePickerWrapper" class="u-datepicker-right u-datepicker--v3 g-pr-10">
                                            <input id="rangeDatepicker" class="g-font-size-12 g-font-size-default--md flatpickr-input" type="text" data-rp-wrapper="#rangePickerWrapper" data-rp-type="range" data-rp-date-format="d M Y" data-rp-default-date="[&quot;01 Jan 2016&quot;, &quot;31 Dec 2017&quot;]" readonly="readonly" style="width: 187.5px;">
                                            <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v3"></i>
                                            <div class="flatpickr-calendar rangeMode animate showTimeInput arrowBottom" tabindex="-1" style="top: 1031.88px; left: 582.969px; right: auto;"><div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-current-month"><span class="cur-month" title="Scroll to increment">January </span><div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div></div><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays">
    <span class="flatpickr-weekday">
      Mo</span><span class="flatpickr-weekday">Tu</span><span class="flatpickr-weekday">We</span><span class="flatpickr-weekday">Th</span><span class="flatpickr-weekday">Fr</span><span class="flatpickr-weekday">Sa</span><span class="flatpickr-weekday">Su
    </span>
                                                        </div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="December 28, 2015" tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="December 29, 2015" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="December 30, 2015" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="December 31, 2015" tabindex="-1">31</span><span class="flatpickr-day selected startRange" aria-label="January 1, 2016" tabindex="-1">1</span><span class="flatpickr-day inRange" aria-label="January 2, 2016" tabindex="-1">2</span><span class="flatpickr-day inRange" aria-label="January 3, 2016" tabindex="-1">3</span><span class="flatpickr-day inRange" aria-label="January 4, 2016" tabindex="-1">4</span><span class="flatpickr-day inRange" aria-label="January 5, 2016" tabindex="-1">5</span><span class="flatpickr-day inRange" aria-label="January 6, 2016" tabindex="-1">6</span><span class="flatpickr-day inRange" aria-label="January 7, 2016" tabindex="-1">7</span><span class="flatpickr-day inRange" aria-label="January 8, 2016" tabindex="-1">8</span><span class="flatpickr-day inRange" aria-label="January 9, 2016" tabindex="-1">9</span><span class="flatpickr-day inRange" aria-label="January 10, 2016" tabindex="-1">10</span><span class="flatpickr-day inRange" aria-label="January 11, 2016" tabindex="-1">11</span><span class="flatpickr-day inRange" aria-label="January 12, 2016" tabindex="-1">12</span><span class="flatpickr-day inRange" aria-label="January 13, 2016" tabindex="-1">13</span><span class="flatpickr-day inRange" aria-label="January 14, 2016" tabindex="-1">14</span><span class="flatpickr-day inRange" aria-label="January 15, 2016" tabindex="-1">15</span><span class="flatpickr-day inRange" aria-label="January 16, 2016" tabindex="-1">16</span><span class="flatpickr-day inRange" aria-label="January 17, 2016" tabindex="-1">17</span><span class="flatpickr-day inRange" aria-label="January 18, 2016" tabindex="-1">18</span><span class="flatpickr-day inRange" aria-label="January 19, 2016" tabindex="-1">19</span><span class="flatpickr-day inRange" aria-label="January 20, 2016" tabindex="-1">20</span><span class="flatpickr-day inRange" aria-label="January 21, 2016" tabindex="-1">21</span><span class="flatpickr-day inRange" aria-label="January 22, 2016" tabindex="-1">22</span><span class="flatpickr-day inRange" aria-label="January 23, 2016" tabindex="-1">23</span><span class="flatpickr-day inRange" aria-label="January 24, 2016" tabindex="-1">24</span><span class="flatpickr-day inRange" aria-label="January 25, 2016" tabindex="-1">25</span><span class="flatpickr-day inRange" aria-label="January 26, 2016" tabindex="-1">26</span><span class="flatpickr-day inRange" aria-label="January 27, 2016" tabindex="-1">27</span><span class="flatpickr-day inRange" aria-label="January 28, 2016" tabindex="-1">28</span><span class="flatpickr-day inRange" aria-label="January 29, 2016" tabindex="-1">29</span><span class="flatpickr-day inRange" aria-label="January 30, 2016" tabindex="-1">30</span><span class="flatpickr-day inRange" aria-label="January 31, 2016" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 1, 2016" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 2, 2016" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 3, 2016" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 4, 2016" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 5, 2016" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 6, 2016" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay inRange" aria-label="February 7, 2016" tabindex="-1">7</span></div></div></div></div></div></div>
                                    </div>
                                </header>

                                <div class="js-custom-scroll g-height-400 g-pa-15 g-pl-5--md g-pr-30--md g-py-25--md mCustomScrollbar _mCS_4 mCS-autoHide" style="position: relative; overflow: visible;"><div id="mCSB_4" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: 350px;"><div id="mCSB_4_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                            <section class="u-timeline-v2-wrap g-pos-rel g-left-25--before g-mb-20">
                                                <div class="g-orientation-left g-pos-rel g-ml-25--md g-pl-20">
                                                    <div class="g-hidden-sm-down u-timeline-v2__icon g-top-35">
                                                        <i class="d-block g-width-16 g-height-16 g-bg-white g-brd-around g-brd-2 g-brd-secondary rounded-circle"></i>
                                                    </div>

                                                    <div class="media g-mb-16">
                                                        <div class="d-flex align-self-center g-mr-15">
                                                            <img class="g-width-55 g-height-55 rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img1.jpg" alt="Image Description">
                                                        </div>

                                                        <div class="media-body align-self-center">
                                                            <h3 class="g-font-weight-300 g-font-size-16 g-mb-3">Htmlstream</h3>
                                                            <em class="g-font-style-normal g-color-secondary">Commented on Project</em>
                                                        </div>
                                                    </div>

                                                    <p class="g-font-weight-300 g-font-size-default g-mb-16">When you browse through videos at YouTube, which do you usually click first: one with around 10 views or one with around 75,000 views</p>
                                                    <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-gray-dark-v6">
                                                        <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                        <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-ml-4 g-ml-8--md">45 Min <span class="g-hidden-md-down">ago</span></span>
                                                    </em>
                                                </div>

                                                <hr class="d-flex g-brd-gray-light-v4 g-ml-35--md g-my-20 g-my-30--md">

                                                <div class="g-orientation-left g-pos-rel g-ml-25--md g-pl-20">
                                                    <div class="g-hidden-sm-down u-timeline-v2__icon g-top-35">
                                                        <i class="d-block g-width-16 g-height-16 g-bg-white g-brd-around g-brd-2 g-brd-secondary rounded-circle"></i>
                                                    </div>

                                                    <div class="media g-mb-25">
                                                        <div class="d-flex align-self-center g-mr-15">
                                                            <img class="g-width-55 g-height-55 rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img4.jpg" alt="Image Description">
                                                        </div>

                                                        <div class="media-body align-self-center">
                                                            <h3 class="g-font-weight-300 g-font-size-16 g-mb-3">E<span class="g-hidden-md-down">mma&nbsp;</span><span class="g-hidden-md-up">.</span>Watson</h3>
                                                            <em class="g-font-style-normal g-color-secondary">Added New Files</em>
                                                        </div>
                                                    </div>

                                                    <em class="d-flex align-self-center align-items-center g-font-style-normal g-mb-30">
                                                        <i class="hs-admin-zip g-font-size-24 g-color-secondary"></i>
                                                        <span class="g-font-weight-300 g-font-size-default g-color-gray-dark-v6 g-ml-12">Project Updates.zip</span>
                                                    </em>

                                                    <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-gray-dark-v6">
                                                        <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                        <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-ml-4 g-ml-8--md">10 Min <span class="g-hidden-md-down">ago</span></span>
                                                    </em>
                                                </div>

                                                <hr class="d-flex g-brd-gray-light-v4 g-ml-35--md g-my-20 g-my-30--md">

                                                <div class="g-orientation-left g-pos-rel g-ml-25--md g-pl-20">
                                                    <div class="g-hidden-sm-down u-timeline-v2__icon g-top-35">
                                                        <i class="d-block g-width-16 g-height-16 g-bg-white g-brd-around g-brd-2 g-brd-secondary rounded-circle"></i>
                                                    </div>

                                                    <div class="media g-mb-16">
                                                        <div class="d-flex align-self-center g-mr-15">
                                                            <img class="g-width-55 g-height-55 rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img5.jpg" alt="Image Description">
                                                        </div>

                                                        <div class="media-body align-self-center">
                                                            <h3 class="g-font-weight-300 g-font-size-16 g-mb-3">V<span class="g-hidden-md-down">erna&nbsp;</span><span class="g-hidden-md-up">.</span>Swanson</h3>
                                                            <em class="g-font-style-normal g-color-secondary">Commented on Project</em>
                                                        </div>
                                                    </div>

                                                    <p class="g-font-weight-300 g-font-size-default g-mb-16">The collapse of the online-advertising market in 2001 made marketing on the Internet seem even less compelling. Website usability, press releases, online media buys, podcasts, mobile marketing and more – there’s an entire world</p>
                                                    <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-gray-dark-v6">
                                                        <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                        <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-ml-4 g-ml-8--md">10 Min <span class="g-hidden-md-down">ago</span></span>
                                                    </em>
                                                </div>

                                                <hr class="d-flex g-brd-gray-light-v4 g-ml-35--md g-my-20 g-my-30--md">

                                                <div class="g-orientation-left g-pos-rel g-ml-25--md g-pl-20">
                                                    <div class="g-hidden-sm-down u-timeline-v2__icon g-top-35">
                                                        <i class="d-block g-width-16 g-height-16 g-bg-white g-brd-around g-brd-2 g-brd-secondary rounded-circle"></i>
                                                    </div>

                                                    <div class="media g-mb-16">
                                                        <div class="d-flex align-self-center g-mr-15">
                                                            <img class="g-width-55 g-height-55 rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img7.jpg" alt="Image Description">
                                                        </div>

                                                        <div class="media-body align-self-center">
                                                            <h3 class="g-font-weight-300 g-font-size-16 g-mb-3">J<span class="g-hidden-md-down">ohn&nbsp;</span><span class="g-hidden-md-up">.</span>Doe</h3>
                                                            <em class="g-font-style-normal g-color-secondary">Shared Project with Users</em>
                                                        </div>
                                                    </div>

                                                    <ul class="list-inline d-flex g-mb-20">
                                                        <li class="list-inline-item g-mb-10 g-mb-0--sm mr-0">
                                                            <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img4.jpg" alt="Image Description">
                                                        </li>
                                                        <li class="list-inline-item g-mb-10 g-mb-0--sm g-ml-7 mr-0">
                                                            <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img7.jpg" alt="Image Description">
                                                        </li>
                                                        <li class="list-inline-item g-mb-10 g-mb-0--sm g-ml-7 mr-0">
                                                            <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img14.jpg" alt="Image Description">
                                                        </li>
                                                        <li class="list-inline-item g-mb-10 g-mb-0--sm g-ml-7 mr-0">
                                                            <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img15.jpg" alt="Image Description">
                                                        </li>
                                                        <li class="list-inline-item g-mb-10 g-mb-0--sm g-ml-7 mr-0">
                                                            <div class="d-flex align-items-center justify-content-center g-width-30 g-width-40--md g-height-30 g-height-40--md g-bg-gray-light-v8 g-font-size-14 g-font-size-16--md g-color-secondary rounded-circle">+5</div>
                                                        </li>
                                                    </ul>
                                                    <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-gray-dark-v6">
                                                        <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                        <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-ml-4 g-ml-8--md">10 Min <span class="g-hidden-md-down">ago</span></span>
                                                    </em>
                                                </div>

                                                <hr class="d-flex g-brd-gray-light-v4 g-ml-35--md g-my-20 g-my-30--md">
                                            </section>

                                            <a class="d-flex align-items-center text-uppercase u-link-v5 g-font-style-normal g-color-secondary g-ml-25--md" href="#!">
                                                <i class="hs-admin-reload g-font-size-20"></i>
                                                <span class="g-font-size-12 g-font-size-default--md g-ml-10 g-ml-25--md">Load more</span>
                                            </a>
                                        </div></div><div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 142px; max-height: 366px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                            </div>
                            <!-- End Activity Card -->

                        </div>
                        <!-- End Activity Card -->

                        <!-- Tickets Card -->
                        <div class="col-xl-4">
                            <!-- Tickets Cards -->
                            <div class="card g-brd-gray-light-v7 g-mb-30">
                                <header class="media g-pa-15 g-pa-25-30-0--md g-mb-20">
                                    <h3 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">Tickets</h3>
                                </header>

                                <div class="js-custom-scroll g-height-400 g-pa-15 g-pa-0-30-25--md mCustomScrollbar _mCS_5 mCS-autoHide" style="position: relative; overflow: visible;"><div id="mCSB_5" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: 375px;"><div id="mCSB_5_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                            <section>
                                                <div class="media">
                                                    <div class="media-body g-mb-15">
                                                        <h3 class="g-font-weight-300 g-font-size-16 g-color-black g-mb-5">Freelance Design</h3>
                                                        <p class="g-font-weight-300 g-color-gray-dark-v6 mb-0">15 Tips To Increase Your Adwords</p>
                                                    </div>

                                                    <div class="d-flex">
                                                        <a class="u-link-v5 g-font-size-16 g-color-secondary" href="#!">#001-3456</a>
                                                    </div>
                                                </div>

                                                <div class="media">
                                                    <div class="media-body align-self-center" href="#!">
                                                        <span class="u-tags-v1 text-center g-width-140 g-bg-lightblue-v3 g-color-white g-brd-around g-brd-lightblue-v3 g-rounded-50 g-py-4 g-px-15">In Progress</span>
                                                    </div>

                                                    <em class="d-flex align-self-center align-items-center g-font-style-normal">
                                                        <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                        <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-ml-4 g-ml-8--md">45 Min <span class="g-hidden-md-down">ago</span></span>
                                                    </em>
                                                </div>
                                            </section>

                                            <hr class="d-flex g-brd-gray-light-v4 g-my-25">

                                            <section>
                                                <div class="media">
                                                    <div class="media-body g-mb-15">
                                                        <h3 class="g-font-weight-300 g-font-size-16 g-color-black g-mb-5">The Flash Tutorial</h3>
                                                        <p class="g-font-weight-300 g-color-gray-dark-v6 mb-0">Las Vegas How To Have Non Gambling</p>
                                                    </div>

                                                    <div class="d-flex">
                                                        <a class="u-link-v5 g-font-size-16 g-color-secondary" href="#!">#001-3458</a>
                                                    </div>
                                                </div>

                                                <div class="media">
                                                    <div class="media-body align-self-center" href="#!">
                                                        <span class="u-tags-v1 text-center g-width-140 g-bg-teal-v2 g-color-white g-brd-around g-brd-teal-v2 g-rounded-50 g-py-4 g-px-15">Done</span>
                                                    </div>

                                                    <em class="d-flex align-self-center align-items-center g-font-style-normal">
                                                        <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                        <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-ml-4 g-ml-8--md">15 Min <span class="g-hidden-md-down">ago</span></span>
                                                    </em>
                                                </div>
                                            </section>

                                            <hr class="d-flex g-brd-gray-light-v4 g-my-25">

                                            <section>
                                                <div class="media">
                                                    <div class="media-body g-mb-15">
                                                        <h3 class="g-font-weight-300 g-font-size-16 g-color-black g-mb-5">Free Advertising</h3>
                                                        <p class="g-font-weight-300 g-color-gray-dark-v6 mb-0">How Does An Lcd Screen Work</p>
                                                    </div>

                                                    <div class="d-flex">
                                                        <a class="u-link-v5 g-font-size-16 g-color-secondary" href="#!">#001-3454</a>
                                                    </div>
                                                </div>

                                                <div class="media">
                                                    <div class="media-body align-self-center" href="#!">
                                                        <span class="u-tags-v1 text-center g-width-140 g-bg-primary g-color-white g-brd-around g-brd-primary g-rounded-50 g-py-4 g-px-15">To Do</span>
                                                    </div>

                                                    <em class="d-flex align-self-center align-items-center g-font-style-normal">
                                                        <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                        <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-ml-4 g-ml-8--md">10 Min <span class="g-hidden-md-down">ago</span></span>
                                                    </em>
                                                </div>
                                            </section>
                                        </div></div><div id="mCSB_5_scrollbar_vertical" class="mCSB_scrollTools mCSB_5_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_5_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 362px; max-height: 366px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                            </div>
                            <!-- End Tickets Cards -->
                        </div>
                        <!-- End Tickets Card -->

                        <!-- Comments Card -->
                        <div class="col-xl-4">
                            <!-- Comments Card-->
                            <div class="card g-brd-gray-light-v7 g-mb-30">
                                <header class="media g-pa-15 g-pa-25-30-0--md g-mb-20">
                                    <h3 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">Recent comments</h3>
                                </header>

                                <div class="js-custom-scroll g-height-400 g-pa-15 g-pa-0-30-25--md mCustomScrollbar _mCS_6 mCS-autoHide" style="position: relative; overflow: visible;"><div id="mCSB_6" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: 375px;"><div id="mCSB_6_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                            <section class="media">
                                                <div class="d-flex g-mr-12">
                                                    <img class="g-width-40 g-width-48--md g-height-40 g-height-48--md rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img5.jpg" alt="Image Description">
                                                </div>

                                                <div class="media-body">
                                                    <h3 class="g-font-weight-300 g-font-size-16 g-color-black g-mb-5">V<span class="g-hidden-md-down">erna&nbsp;</span><span class="g-hidden-md-up">.</span>Swanson</h3>
                                                    <p class="g-font-weight-300 g-color-gray-dark-v6 g-mb-15">15 Tips To Increase Your Adwords</p>

                                                    <div class="media">
                                                        <div class="media-body align-self-center mr-3" href="#!">
                          <span class="u-tags-v1 text-center g-width-140--md g-bg-gray-light-v8 g-font-size-12 g-font-size-default--md g-color-darkblue-v2 g-brd-around g-brd-gray-light-v8 g-rounded-50 g-py-4 g-px-15">Dropbox
              <span class="g-hidden-sm-down">Project</span>
                          </span>
                                                        </div>

                                                        <em class="d-flex align-self-center align-items-center g-font-style-normal">
                                                            <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                            <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-ml-4 g-ml-8--md">45 Min <span class="g-hidden-md-down">ago</span></span>
                                                        </em>
                                                    </div>
                                                </div>
                                            </section>

                                            <hr class="d-flex g-brd-gray-light-v4 g-my-25">

                                            <section class="media">
                                                <div class="d-flex g-mr-12">
                                                    <img class="g-width-40 g-width-48--md g-height-40 g-height-48--md rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img14.jpg" alt="Image Description">
                                                </div>

                                                <div class="media-body">
                                                    <h3 class="g-font-weight-300 g-font-size-16 g-color-black g-mb-5">E<span class="g-hidden-md-down">ddie&nbsp;</span><span class="g-hidden-md-up">.</span>Hayes</h3>
                                                    <p class="g-font-weight-300 g-color-gray-dark-v6 g-mb-15">Las Vegas How To Have Non Gambling</p>

                                                    <div class="media">
                                                        <div class="media-body align-self-center mr-3" href="#!">
                          <span class="u-tags-v1 text-center g-width-140--md g-bg-gray-light-v8 g-font-size-12 g-font-size-default--md g-color-darkblue-v2 g-brd-around g-brd-gray-light-v8 g-rounded-50 g-py-4 g-px-15">Sketch
              <span class="g-hidden-sm-down">Project</span>
                          </span>
                                                        </div>

                                                        <em class="d-flex align-self-center align-items-center g-font-style-normal">
                                                            <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                            <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-ml-4 g-ml-8--md">15 Min <span class="g-hidden-md-down">ago</span></span>
                                                        </em>
                                                    </div>
                                                </div>
                                            </section>

                                            <hr class="d-flex g-brd-gray-light-v4 g-my-25">

                                            <section class="media">
                                                <div class="d-flex g-mr-12">
                                                    <img class="g-width-40 g-width-48--md g-height-40 g-height-48--md rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img7.jpg" alt="Image Description">
                                                </div>

                                                <div class="media-body">
                                                    <h3 class="g-font-weight-300 g-font-size-16 g-color-black g-mb-5">H<span class="g-hidden-md-down">erbert&nbsp;</span><span class="g-hidden-md-up">.</span>Castro</h3>
                                                    <p class="g-font-weight-300 g-color-gray-dark-v6 g-mb-15">But today, the use and influence of is growing right along illustration</p>

                                                    <div class="media">
                                                        <div class="media-body align-self-center mr-3" href="#!">
                          <span class="u-tags-v1 text-center g-width-140--md g-bg-gray-light-v8 g-font-size-12 g-font-size-default--md g-color-darkblue-v2 g-brd-around g-brd-gray-light-v8 g-rounded-50 g-py-4 g-px-15">Unify
              <span class="g-hidden-sm-down">Project</span>
                          </span>
                                                        </div>

                                                        <em class="d-flex align-self-center align-items-center g-font-style-normal">
                                                            <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                            <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-ml-4 g-ml-8--md">10 Min <span class="g-hidden-md-down">ago</span></span>
                                                        </em>
                                                    </div>
                                                </div>
                                            </section>

                                            <hr class="d-flex g-brd-gray-light-v4 g-my-25">

                                            <section class="media">
                                                <div class="d-flex g-mr-12">
                                                    <img class="g-width-40 g-width-48--md g-height-40 g-height-48--md rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img7.jpg" alt="Image Description">
                                                </div>

                                                <div class="media-body">
                                                    <h3 class="g-font-weight-300 g-font-size-16 g-color-black g-mb-5">H<span class="g-hidden-md-down">erbert&nbsp;</span><span class="g-hidden-md-up">.</span>Castro</h3>
                                                    <p class="g-font-weight-300 g-color-gray-dark-v6 g-mb-15">How Does An Lcd Screen Work</p>

                                                    <div class="media">
                                                        <div class="media-body align-self-center mr-3" href="#!">
                          <span class="u-tags-v1 text-center g-width-140--md g-bg-gray-light-v8 g-font-size-12 g-font-size-default--md g-color-darkblue-v2 g-brd-around g-brd-gray-light-v8 g-rounded-50 g-py-4 g-px-15">Unify
              <span class="g-hidden-sm-down">Project</span>
                          </span>
                                                        </div>

                                                        <em class="d-flex align-self-center align-items-center g-font-style-normal">
                                                            <i class="hs-admin-time g-font-size-default g-font-size-18--md g-color-gray-light-v3"></i>
                                                            <span class="g-font-weight-300 g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-ml-4 g-ml-8--md">12 Min <span class="g-hidden-md-down">ago</span></span>
                                                        </em>
                                                    </div>
                                                </div>
                                            </section>
                                        </div></div><div id="mCSB_6_scrollbar_vertical" class="mCSB_scrollTools mCSB_6_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_6_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 252px; max-height: 366px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                            </div>
                            <!-- Comments Card-->
                        </div>
                        <!-- End Comments Card -->
                    </div>
                </div>

                <!-- Footer -->
                <footer id="footer" class="u-footer--bottom-sticky g-bg-white g-color-gray-dark-v6 g-brd-top g-brd-gray-light-v7 g-pa-20">
                    <div class="row align-items-center">
                        <!-- Footer Nav -->
                        <div class="col-md-4 g-mb-10 g-mb-0--md">
                            <ul class="list-inline text-center text-md-left mb-0">
                                <li class="list-inline-item">
                                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="#!">FAQ</a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="g-color-gray-dark-v6">|</span>
                                </li>
                                <li class="list-inline-item">
                                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="#!">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="g-color-gray-dark-v6">|</span>
                                </li>
                                <li class="list-inline-item">
                                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="#!">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Footer Nav -->

                        <!-- Footer Socials -->
                        <div class="col-md-4 g-mb-10 g-mb-0--md">
                            <ul class="list-inline g-font-size-16 text-center mb-0">
                                <li class="list-inline-item g-mx-10">
                                    <a href="#!" class="g-color-facebook g-color-secondary--hover">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="#!" class="g-color-google-plus g-color-secondary--hover">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="#!" class="g-color-black g-color-secondary--hover">
                                        <i class="fa fa-github"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="#!" class="g-color-twitter g-color-secondary--hover">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Footer Socials -->

                        <!-- Footer Copyrights -->
                        <div class="col-md-4 text-center text-md-right">
                            <small class="d-block g-font-size-default">© 2018 Htmlstream. All Rights Reserved.</small>
                        </div>
                        <!-- End Footer Copyrights -->
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
        </div>
    </main>
    {{--@include('admin.topSquarePanel')
    <!--  Chart  -->
    <div id="chart"></div>
    <!--  End Chart  -->--}}
@endsection