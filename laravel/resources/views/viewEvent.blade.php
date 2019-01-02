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
@if($eventData)
    <section class="container g-pt-100">
        <div class="row g-pt-15--md">
            <div class="col-md-8 g-pt-36 g-pt-30">
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
                                @if(\Auth::check())
                                <div class="media-body d-flex align-self-center justify-content-end">
                                    <div class="g-pos-rel g-z-index-2">
                                        <a id="attendanceMenu" class="u-link-v5 g-line-height-0 g-font-size-12 g-color-white g-color-lightblue-v3--hover g-ml-10 g-ml-20--md"
                                           href="#!" aria-controls="dropDown1" aria-haspopup="true" aria-expanded="false"
                                           data-dropdown-event="click" data-dropdown-target="#dropDown1" data-dropdown-type="css-animation"
                                           data-dropdown-duration="800" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                                            <b>Will you be Attending?</b> <i class="fa fa-chevron-down"></i>
                                        </a>

                                        <div id="dropDown1" class="g-pos-abs g-left-20 g-width-100x--md g-nowrap g-font-size-12 g-py-20
                                                    g-mt-17 rounded u-dropdown--css-animation u-dropdown--hidden" aria-labelledby="attendanceMenu"
                                             style="animation-duration: 300ms; left: 0px;background-color: #000000;border: 3px solid #FFFFFF;color:#FFFFFF">
                                            <ul class="list-unstyled g-nowrap mb-0 text-center">
                                                <li class="g-mb-5" >
                                                    <a href="#" onclick="ajaxRequest('{{route('updateAttendance')}}', 'divStatus', 'attendance', 'Yes', {{ $attenData }})" class="btn btn-sm btn-success">Yes</a>
                                                </li>
                                                <li class="g-mb-5">
                                                    <a href="#" onclick="ajaxRequest('{{route('updateAttendance')}}', 'divStatus', 'attendance', 'Maybe', {{ $attenData }})" class="btn btn-sm btn-info">Maybe</a>
                                                </li>
                                                <li class="g-mb-5">
                                                    <a href="#" onclick="ajaxRequest('{{route('updateAttendance')}}', 'divStatus', 'attendance', 'No', {{ $attenData }})" class="btn btn-sm btn-danger">No</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @if($user->lead == 1)
                                    <div class="col-md-5">
                                        <div class="g-pos-rel g-z-index-2">
                                            <a id="profileMenuInvoker" class="u-link-v5 g-line-height-0 g-font-size-12 g-color-white g-color-lightblue-v3--hover g-ml-10 g-ml-20--md"
                                               href="#!" aria-controls="dropDown7" aria-haspopup="true" aria-expanded="false"
                                               data-dropdown-event="click" data-dropdown-target="#dropDown7" data-dropdown-type="css-animation"
                                               data-dropdown-duration="800" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                                                Edit Event <i class="fa fa-chevron-down"></i>
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
                                </div>
                            @endif
                            @endif
                        </div>
                    </header>

                    <div class="card-block g-pa-15 g-pa-5--md g-bg-black-opacity-0_5">
                        <p class="g-font-weight-300 g-color-white mb-0">{!! nl2br($eventData->comments) !!}</p>
                    </div>
                </div>
            </div>

            <div id="attend" class="col-md-4">
                <div class="text-center">
                    <h5 class="g-color-white">Attendance:</h5><div id="divStatus"></div>
                </div>
                @if(isset($attendees) && $attendees != null)
                    @foreach($attendees as $status=>$attendee)
                        <ul class="list-unstyled g-pt-0">
                            <li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-5 g-mb-5">
                                <div class="g-pos-rel g-mr-5">
                                    <img class="g-width-50 g-height-50 rounded" src="/storage/app/org_logos/{{$attendee->organization->org_logo}}" alt="Image Description">
                                </div>

                                <div class="align-self-center g-px-10">
                                    <h5 class="h6 g-font-weight-600 g-color-white g-mb-3">
                                        <span class="g-mr-5">{{ $attendee->username}}</span>
                                    </h5>
                                </div>
                                <div class="align-self-center ml-auto">
                                    <span class="u-label u-label--sm g-rounded-20 g-px-10
                                        @switch($status)
                                            @case ('No')
                                                badge-danger">Not Coming
                                                @break
                                            @case ('Maybe')
                                                badge-info">Tentative
                                                @break
                                            @case ('Yes')
                                                badge-success">Attending
                                                @break
                                            @default
                                        @endswitch
                                    </span>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@else
    <section class="g-py-200--md g-py-80">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-10 ml-md-auto mr-md-auto">
                    <h2 class="h5 text-uppercase g-font-weight-700 g-mb-20">No Event on File!</h2>
                    <h2 class="display-4 text-uppercase g-font-weight-600 g-mb-20">
                        <span><img height="100px" src="/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png"> </span><span class="g-color-primary" ></span>
                    </h2>

                    <p class="lead g-mb-40">There is no event on file, Either this event never existed, or it was removed!</p>

                </div>
            </div>
        </div>
    </section>
@endif
@endsection
