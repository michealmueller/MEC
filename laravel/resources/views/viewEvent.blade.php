<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/7/2018
 * Time: 1:36 PM
 */
?>
@extends('layouts.master')

@section('content')
    <div class="row g-pt-15--md">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card g-brd-gray-light-v7 g-rounded-3 g-mb-30">
                <header class="card-header g-bg-transparent g-pa-15">
                    <div class="media">
                        <div class="d-flex align-self-center">
                            <div class="media">
                                <!--<a class="d-flex align-self-center g-mr-20" href="#!">
                                    <img class="rounded-circle g-width-45 g-width-55--lg g-height-45 g-height-55--lg" src="../../assets/img-temp/100x100/img5.jpg" alt="Image Description">
                                </a>-->

                                <div class="media-body align-self-center">
                                    <h3 class="g-font-weight-300 g-font-size-16 g-color-orange g-mb-5">{{ $eventData->title }}</h3>
                                    <em class="d-block g-font-style-normal g-font-weight-300 g-color-white">Event Date: <label>{{ \Carbon\Carbon::parse($eventData->start_date)->setTimezone($data['timezonedata']['timezone'])->format('m-d-Y g:ia') }} - {{ \Carbon\Carbon::parse($eventData->end_date)->setTimezone($data['timezonedata']['timezone'])->format('m-d-Y g:ia') }}</label></em>
                                </div>
                            </div>
                        </div>
                        @if($eventData->creator == \Auth::id() && \Auth::check())
                        <div class="media-body d-flex align-self-center justify-content-end">
                            <div class="g-pos-rel g-z-index-2">
                                <a id="profileMenuInvoker" class="u-link-v5 g-line-height-0 g-font-size-24 g-color-white g-color-lightblue-v3--hover g-ml-10 g-ml-20--md"
                                   href="#!" aria-controls="dropDown7" aria-haspopup="true" aria-expanded="false"
                                   data-dropdown-event="hover" data-dropdown-target="#dropDown7" data-dropdown-type="css-animation"
                                   data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                                    <i class="fa fa-chevron-down"></i>
                                </a>

                                <div id="dropDown7" class="g-pos-abs g-left-20 g-width-100x--md g-nowrap g-font-size-12 g-py-20
                                    g-mt-17 rounded u-dropdown--css-animation u-dropdown--hidden" aria-labelledby="profileMenuInvoker"
                                     style="animation-duration: 300ms; left: 0px;background-color: #000000;border: 3px solid #FFFFFF;color:#FFFFFF">
                                    <ul class="list-unstyled g-nowrap mb-0">
                                        <li>
                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="/edit/event/{{$eventData->id}}">
                                                <i class="hs-admin-pencil fa fa-edit g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <!--<li>
                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                <i class="hs-admin-archive g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                                Archive
                                            </a>
                                        </li>
                                        <li>
                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                <i class="hs-admin-check g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                                Mark as Done
                                            </a>
                                        </li>
                                        <li>
                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                                <i class="hs-admin-plus g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                                New Task
                                            </a>
                                        </li>-->
                                        <li>
                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="/remove/event/{{$eventData->id}}">
                                                <i class="hs-admin-trash fa fa-remove g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </header>

                <div class="card-block g-pa-15 g-pa-5--md">
                    <p class="g-font-weight-300 g-color-white mb-0">{!! nl2br($eventData->comments) !!}</p>
                </div>

                <!--<footer class="card-footer d-flex g-bg-transparent g-brd-top-none g-pa-15 g-pa-30--sm pt-0">
                    <a class="d-flex align-items-center u-link-v5 g-parent g-color-gray-dark-v6 g-color-lightblue-v3--hover" href="#!">
                        <i class="hs-admin-heart g-font-size-16 g-color-gray-light-v6 g-color-lightblue-v4--parent-hover"></i>
                        <span class="g-hidden-md-down g-ml-5">Like</span>
                    </a>
                    <a class="d-flex align-items-center u-link-v5 g-parent g-color-gray-dark-v6 g-color-lightblue-v3--hover g-ml-10 g-ml-30--sm" href="#!">
                        <i class="hs-admin-share g-font-size-16 g-color-gray-light-v6 g-color-lightblue-v4--parent-hover"></i>
                        <span class="g-hidden-md-down g-ml-5">Share</span>
                    </a>
                    <a class="d-flex align-items-center u-link-v5 g-parent g-color-gray-dark-v6 g-color-lightblue-v3--hover g-ml-10 g-ml-30--sm" href="#!">
                        <i class="hs-admin-comments g-font-size-16 g-color-gray-light-v6 g-color-lightblue-v4--parent-hover"></i>
                        <span class="g-hidden-md-down g-ml-5">Comment</span>
                    </a>
                </footer>-->
            </div>
        </div>
    <div class="col-md-3"></div>
    </div>

@endsection
