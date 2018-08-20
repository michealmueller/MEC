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
<section class="container g-pt-100 g-pb-10">
    <div class="row g-pt-15--md">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card g-brd-gray-light-v7 g-rounded-3 g-mb-30">
                <header class="card-header g-bg-black-opacity-0_5 g-pa-15">
                    <div class="media">
                        <div class="d-flex align-self-center">
                            <div class="media">
                                <div class="media-body align-self-center">
                                    <h3 class="g-font-weight-300 g-font-size-16 g-color-orange g-mb-5">{{ $eventData->title }}</h3>
                                    <em class="d-block g-font-style-normal g-font-weight-300 g-color-white">Event Date: <label>{{ \Carbon\Carbon::parse($eventData->start_date)->setTimezone($data['timezonedata']->time_zone->name)->format('m-d-Y g:ia') }} - {{ \Carbon\Carbon::parse($eventData->end_date)->setTimezone($data['timezonedata']->time_zone->name)->format('m-d-Y g:ia') }}</label></em>
                                    @if($eventData->brief_url != null)
                                        <em class="d-block g-font-style-normal g-font-weight-300 g-color-white"><a target="_blank" href="{{$eventData->brief_url}}">View Mission Brief</a></em>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($eventData->creator == \Auth::id() && \Auth::check())
                        <div class="media-body d-flex align-self-center justify-content-end">
                            <div class="g-pos-rel g-z-index-2">
                                <a id="profileMenuInvoker" class="u-link-v5 g-line-height-0 g-font-size-12 g-color-white g-color-lightblue-v3--hover g-ml-10 g-ml-20--md"
                                   href="#!" aria-controls="dropDown7" aria-haspopup="true" aria-expanded="false"
                                   data-dropdown-event="click" data-dropdown-target="#dropDown7" data-dropdown-type="css-animation"
                                   data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                                    Edit This Event <i class="fa fa-chevron-down"></i>
                                </a>

                                <div id="dropDown7" class="g-pos-abs g-left-20 g-width-100x--md g-nowrap g-font-size-12 g-py-20
                                    g-mt-17 rounded u-dropdown--css-animation u-dropdown--hidden" aria-labelledby="profileMenuInvoker"
                                     style="animation-duration: 300ms; left: 0px;background-color: #000000;border: 3px solid #FFFFFF;color:#FFFFFF">
                                    <ul class="list-unstyled g-nowrap mb-0">
                                        <li>
                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="/edit/event/{{$eventData->id}}">
                                                <i class="fas fa-edit g-font-size-12 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14" href="/remove/event/{{$eventData->id}}">
                                                <i class="fas fa-remove g-font-size-12 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
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

                <div class="card-block g-pa-15 g-pa-5--md g-bg-black-opacity-0_5">
                    <p class="g-font-weight-300 g-color-white mb-0">{!! nl2br($eventData->comments) !!}</p>
                </div>
            </div>
        </div>
    <div class="col-md-2"></div>
    </div>
</section>
@endsection
