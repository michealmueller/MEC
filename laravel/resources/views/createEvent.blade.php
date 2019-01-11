<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/4/2018
 * Time: 1:13 PM
 */
?>
@extends('layouts.master')

@section('content')
    <section class="g-mb-100">
        <div class="container">
            <div class="row">
                <!-- Profile Sidebar -->
                <div class="col-lg-3 g-mb-50 g-mb-0--lg">
                    <!-- User Image -->
                    <div class="g-pos-rel g-mb-30">
                        <figure>
                            <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="/storage/app/avatars/{{$user->avatar}}" alt="Image Description">
                        </figure>

                        <!-- Figure Caption -->
                        <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
                            <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">
                                <!-- Figure Social Icons -->
                                <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">
                                    <li class="list-inline-item align-middle g-mx-7">
                                        <a class="u-icon-v1 u-icon-size--md g-color-white" href="#!">
                                            <i class="icon-note u-line-icon-pro"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item align-middle g-mx-7">
                                        <a class="u-icon-v1 u-icon-size--md g-color-white" href="#!">
                                            <i class="icon-notebook u-line-icon-pro"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item align-middle g-mx-7">
                                        <a class="u-icon-v1 u-icon-size--md g-color-white" href="#!">
                                            <i class="icon-settings u-line-icon-pro"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Figure Social Icons -->
                            </div>
                        </figcaption>
                        <!-- End Figure Caption -->

                        <!-- User Info -->
                        <span class="g-pos-abs g-top-20 g-left-0">

                  <a class="btn btn-sm u-btn-primary rounded-0" href="#!">{{ $user->username }}</a>
                            @if($user->organization)
                                <small class="d-block g-bg-black g-color-white g-pa-5">{{ $user->organization->org_name }}</small>
                            @endif
                </span>
                        <!-- End User Info -->
                    </div>
                    <!-- User Image -->

                    <!-- Project Progress -->
                    {{-- User this for personal stats ( e.g event counts, shipping information, account things --}}
                    <div class="card border-0 rounded-0 g-mb-50 g-bg-gray-dark-v1">
                        <!-- Panel Header -->
                        <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                            <h3 class="h6 mb-0">
                                <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Details
                            </h3>
                        </div>
                        <!-- End Panel Header -->
                        <!-- Panel Body -->
                        <div class="js-scrollbar card-block u-info-v1-1 g-height-150 g-pa-5 " style="overflow: visible;">
                            <!-- Member Since -->
                            <div class="g-mb-20">
                                <h6 class="g-mb-10">Member Since
                                    <span class="float-right g-ml-10">
                                    {{ \Carbon\Carbon::parse($user->created_at)->setTimezone(session()->get('timezone'))->format('m-d-Y') }}
                                </span>
                                </h6>
                            </div>
                            <!-- End Member Since-->

                            <!-- Calendar Link -->
                            @if($user->organization)
                                <div class="g-mb-20">
                                    <h6 class="g-mb-10">Calendar Link <span class="float-right g-ml-10">
                                    <small>
                                        <a href="https://events.citizenwarfare.com/{{ $user->organization->org_name }}/calendar">/{{ $user->organization->org_name }}/calendar</a>
                                    </small>
                                </span>
                                    </h6>
                                </div>
                            @else
                                <div class="g-mb-20">
                                    <h6 class="g-mb-10">Calendar Link <span class="float-right g-ml-10">
                                <small>
                                    <a href="https://events.citizenwarfare.com/{{ $user->id }}/calendar">View My Calendar</a>
                                </small>
                            </span>
                                    </h6>
                                </div>
                            @endif
                        <!-- End Calendar Link -->
                            <!-- Timezone -->
                            <div class="g-mb-20">
                                <h6 class="g-mb-10">IP Timezone<span class="float-right g-ml-10">
                                <small>
                                    {{ session()->get('timezone') }}
                                </small>
                            </span>
                                </h6>
                            </div>
                            <div class="g-mb-20">
                                <h6 class="g-mb-10">System Timezone<span class="float-right g-ml-10">
                                <small>
                                    <div id="systemtz"></div>
                                </small>
                            </span>
                                </h6>
                            </div>
                        <!-- End Timezone -->

                            <!-- Unify Project -->
                            @if($user->organization)
                                <div class="g-mb-20">
                                    <h6 class="g-mb-10">Reference Code

                                        <small>
                                    <span id="refHash2">
                                        <a href="https://events.citizenwarfare.com/join/ref/{{ $user->organization->refHash}}">{{ $user->organization->refHash }}</a>
                                    </span>
                                        </small>
                                    </h6>
                                </div>
                        @endif
                        <!-- End Unify Project -->


                        </div>
                        <!-- End Panel Body -->
                    </div>
                    <!-- End Project Progress -->
                </div>
                <!-- End Profile Sidebar -->
                <!--END-->

                <div class="col-lg-8 order-lg-2 g-bg-gray-dark-v1">
                    <form class="g-py-15" method="post">
                        {{ csrf_field() }}

                        <div class="form-group row g-mb-25">
                            <label for="example-text-input" class="col-2 col-form-label">Event Title:</label>
                            <div class="col-10">
                                <input class="form-control text-center " name="title" type="text" placeholder="Event Name">
                            </div>
                        </div>
                        <div class="form-group row g-mb-25">
                            <label for="example-text-input" class="col-2 col-form-label">Event Dates:</label>
                            <div class="col-5">
                                <input class="form-control text-center " name="start_date" type="datetime-local">
                            </div>
                            <div class="col-5">
                                <input class="form-control text-center " name="end_date" type="datetime-local" >
                            </div>
                        </div>
                        <div class="form-group row g-mb-25">
                            <label for="example-text-input" class="col-2 col-form-label">Time Zone:</label>
                            <div class="col-10">
                                <select class="form-control" id="zone" name="timezone">
                                    @if($data['timezonedata']!= null)
                                        <option selected value="{{$data['timezonedata']->time_zone->name}}">{{$data['timezonedata']->time_zone->name}}</option>
                                    @endif
                                    @foreach($data['timezones'] as $k=>$v)
                                        <option value="{{ $k }}">{{$v}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row g-mb-25">
                            <label for="example-text-input" class="col-2 col-form-label">Mission Breif(optional):</label>
                            <div class="col-10">
                                <input class="form-control text-center" type="url" name="brief" placeholder="GCloud Document URL (optional)">
                            </div>
                        </div>
                        <div class="form-group row g-mb-25">
                            <label for="example-text-input" class="col-2 col-form-label">Description<small><div class="g-color-green" id="textarea_feedback"></div></small></label>
                            <div class="col-10">
                                    <textarea maxlength="850" rows="10" class="form-control" id="content" name="comments" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row g-mb-25">
                            <label for="example-text-input" class="col-2 col-form-label">Customize</label>
                            <div class="col-10">
                                <div class="form-group row g-mb-25">
                                    <label for="example-text-input" class="col-2 col-form-label">Border Color</label>
                                    <input class="form-control rounded-0 g-height-25" type="color" value="#563d7c" name="borderColor" style="width: 50%;"><br>
                                </div>
                        <!--        <div class="form-group row g-mb-25">
                                    <label for="example-text-input" class="col-2 col-form-label">Text Color</label>
                                    <input class="form-control rounded-0" type="color" value="#563d7c" name="textColor" style="width: 50%;"><br>
                                </div>
                                <div class="form-group row g-mb-25">
                                    <label for="example-text-input" class="col-2 col-form-label">Background Color</label>
                                    <input class="form-control rounded-0" type="color" value="#563d7c" name="backgroundColor" style="width: 50%;"><br>
                                </div>-->
                            </div>
                        </div>
                        @if($user->organization)
                        <div class="form-group row g-mb-25">
                            <!-- Left Column -->

                            <label for="example-text-input" class="col-2 col-form-label">Make this event Public or Private?</label>
                            <div class="col-md-6">
                                <div class="form-group g-mb-10">
                                    <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
                                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup1_2" type="radio" value="1" checked="">
                                        <div class="u-check-icon-radio-v5 g-absolute-centered--y g-left-0">
                                            <i></i>
                                        </div>
                                        Private
                                    </label>
                                </div>

                                <div class="form-group g-mb-10">
                                    <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
                                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup1_2" value="0" type="radio" >
                                        <div class="u-check-icon-radio-v5 g-absolute-centered--y g-left-0">
                                            <i></i>
                                        </div>
                                        Public
                                    </label>
                                </div>
                            <!-- End Left Column -->
                            </div>
                        </div>
                        @endif
                        <div class="g-pa-25--md">
                            <button class="btn btn-md btn-block btn-primary rounded-0 g-py-15 mb-5" type="submit">Create Event!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
