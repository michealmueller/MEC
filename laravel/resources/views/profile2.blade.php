<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 1/9/2019
 * Time: 8:16 AM
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
                <div class="g-pos-rel">
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

                          <small class="btn btn-sm u-btn-primary rounded-0">{{ $user->username }}</small>
                          @if($user->organization)
                          <small class="d-block g-bg-black g-color-white g-pa-5">{{ $user->organization->org_name }}</small>
                          @endif
                </span>
                    @if($status['founder'])
                        <small class="d-block badge badge-danger g-pa-5"><i class="fa fa-user"></i> Founder</small>
                    @endif
                    @if($user->subscribed('prod_EBezTZOsApxwwb') || $user->subscribed('prod_EBaPJtFVdyzYel'))
                        <small class="d-block badge badge-primary g-pa-5"><i class="fa fa-money"></i> Subscriber</small>
                    @endif
                    <!-- End User Info -->
                </div>
                <!-- User Image -->

                <!-- Sidebar Navigation -->
                <div class="list-group list-group-border-0 g-mb-40 ">
                    <!-- Profile -->
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link list-group-item g-bg-gray-dark-v1 list-group-item-action justify-content-between active">
                        <span><i class="icon-cursor g-pos-rel g-top-1 g-mr-8"></i> Profile</span>
                    </a>
                    <!-- End Profile -->
                    <!-- Edit -->
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link list-group-item g-bg-gray-dark-v1 list-group-item-action justify-content-between">
                        <span><i class="fa fa-pencil g-pos-rel g-top-1 g-mr-8"></i> Edit </span>
                    </a>
                    <!-- End Edit -->
                    <!-- Organization -->
                    <a @if($user->organization) href="/profile/organization/{{ $user->organization->id }}"  @else href="" data-target="#organization" data-toggle="tab" @endif class="nav-link list-group-item g-bg-gray-dark-v1 list-group-item-action justify-content-between">
                        <span><i class="fa fa-building g-pos-rel g-top-1 g-mr-8"></i> Organization</span>
                        {{--TODO:: use this number for requests. --}}
                        @if(isset($requests) && $requests != null && $user->organization)
                            <span class="u-label g-font-size-11 g-bg-primary g-rounded-20 g-px-10">{{count($requests)}}</span>
                        @endif
                    </a>
                    <!-- End Organizaation -->
                </div>
                <!-- End Sidebar Navigation -->

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
                    </div>
                    <!-- End Panel Body -->
                </div>
                <!-- End Project Progress -->
            </div>
            <!-- End Profile Sidebar -->

            <!-- Profile Content -->
            <div class="col-lg-9 tab-content g-bg-gray-dark-v1">
                <!-- Projects & Activities Panels -->
                <div class="tab-pane g-mt-25 active" id="profile">
                    <div class="row g-mb-40" >
                        <div class="col-lg-6 g-mb-40 g-mb-0--lg">
                            <!-- Upcoming Events Panel -->
                            <div class="card border-0">
                                <!-- Panel Header -->
                                <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                                    <h3 class="h6 mb-0">
                                        <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Upcoming Public Events
                                    </h3>
                                </div>
                                <!-- End Panel Header -->

                                <!-- Panel Body -->
                                <div class="js-scrollbar card-block u-info-v1-1 g-bg-dark-gray-gradient-v1--after g-height-400 g-pa-0 mCustomScrollbar _mCS_1 mCS-autoHide" style="overflow: visible;">
                                    <div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;">
                                        <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                            <ul class="list-unstyled">
                                                @if(isset($sorted['thisMonth']))
                                                    @foreach($sorted['thisMonth'] as $item)
                                                        @php
                                                        //dd($sorted);
                                                        @endphp
                                                    <li class="media g-brd-around g-brd-gray-light-v4 g-brd-left-3 g-brd-blue-left rounded g-pa-20 g-mb-10">
                                                        <div class="media-body">
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="h6 g-font-weight-600 g-color-white"><a href="/view/event/{{ $item->id }}">{{ $item->title }}</a></h5>
                                                                @if($item->organization_id)
                                                                <a href="/profile/organization/{{ $item->organization->id }}"><span class="small text-nowrap g-color-blue">{{ $item->organization->org_name }}</span></a>
                                                                @else
                                                                <span class="small text-nowrap g-color-blue">{{ \App\User::findorfail($item->user_id)->username}}</span></a>
                                                                @endif
                                                            </div>
                                                            <p>{{ str_limit($item->comments, $limit=150, $end='...') }}<a href="/view/event/{{ $item->id}}">More</a></p>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                @else
                                                    <div class="text-center">
                                                        <p> There are no Upcoming Public Events.<br> Why don't you <a href="/create-event">Create</a> one now!</p>
                                                    </div>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;">
                                        <div class="mCSB_draggerContainer">
                                            <div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 253px; max-height: 366px; top: 0px;">
                                                <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                                            </div>
                                            <div class="mCSB_draggerRail"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- End Panel Body -->
                        </div>
                            <!-- End Upcoming Events Panel -->

                        <div class="col-lg-6 g-mb-40 g-mb-0--lg">
                            <!-- Activities Panel -->
                            <div class="card border-0">
                                <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                                    <h3 class="h6 mb-0">
                                        <i class="icon-directions g-pos-rel g-top-1 g-mr-5"></i>Recent Activity
                                    </h3>
                                </div>

                                <div class="js-scrollbar card-block u-info-v1-1 g-bg-dark-gray-gradient-v1--after g-height-400 g-pa-0 mCustomScrollbar _mCS_2 mCS-autoHide" style="overflow: visible;">
                                    <div id="mCSB_2" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;">
                                        <div id="mCSB_2_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                            <ul class="list-unstyled">
                                                @foreach($recent as $activity)
                                                <li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-10">
                                                    <div class="align-self-center g-px-10">
                                                        <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                                                            <span class="g-mr-5 g-color-white">{{ $activity->message }}</span>
                                                        </h5>
                                                    </div>
                                                    <div class="align-self-center ml-auto">
                                                        <span class="g-rounded-20 g-px-10">{{ \Carbon\CArbon::parse($activity->created_at)->setTimezone(session()->get('timezone'))->format('Y-m-d h:iA') }}</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;">
                                        <div class="mCSB_draggerContainer">
                                            <div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 253px; max-height: 366px; top: 0px;">
                                                <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                                            </div>
                                            <div class="mCSB_draggerRail"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Activities Panel -->
                        </div>
                    </div>
                </div>
                <!-- End Projects & Activities Panels -->

                <!-- Projects & News Feeds Panels -->
                <div class="tab-pane g-mt-125" id="edit">
                    @include('shared.errors')
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="form" value="0">
                    {{csrf_field()}}
                    <!-- Begin Avatar -->
                        <div class="row">
                            <div class="col-lg-4 order-lg-1 text-center"></div>
                            <div class="col-lg-4 order-lg-1 text-center">
                                <div class="col-sm-12" style="margin-bottom:20px;">
                                    <img id="avatar" src="/storage/app/avatars/{{$user->avatar}}" class="mx-auto g-mb-10--md img-fluid img-circle d-block" alt="avatar">
                                    <label  class="btn-bs-file btn btn-block btn-primary ">
                                        Browse
                                        <input id="avatarUp" type="file" name="avatar" style="display: none;">
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-1 text-center"></div>
                        </div>
                        <!-- End Avatar -->
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input name="username" class="form-control" type="text" value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input name="email" class="form-control" type="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>


                </div>
                <!-- End Projects & News Feeds Panels -->

                <!--Organization-->
                <div class="tab-pane g-mt-25" id="organization">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-6 g-brd-right--md ">
                            <div class="card border-0 rounded-0 g-mb-50 g-bg-gray-dark-v1">
                                <!-- Panel Header -->
                                <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                                    <h3 class="h6 mb-0">
                                        <i class=" g-pos-rel g-top-1 g-mr-5"></i>Create your very own Organization.
                                    </h3>
                                </div>
                                <a href="/profile/create/organization" class="btn btn-primary">Create Now</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 rounded-0 g-mb-50 g-bg-gray-dark-v1">
                                <!-- Panel Header -->
                                <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                                    <h3 class="h6 mb-0">
                                        <i class=" g-pos-rel g-top-1 g-mr-5"></i> Join an Organization
                                    </h3>
                                </div>
                                    <ul class="list-unstyled">
                                        @foreach($org_list as $org)
                                            <li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-10">
                                                <div class="g-mt-2">
                                                    <img class="g-width-50 g-height-50 rounded-circle mCS_img_loaded" src="/storage/app/org_logos/{{$org->org_logo}}" alt="Image Description">
                                                </div>
                                                <div class="align-self-center g-px-10">
                                                    <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                                                        <span class="g-mr-5"><a href="/profile/organization/{{ $org->id }}" >{{ $org->org_name }}</a></span>
                                                    </h5>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Organization-->
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
</section>
@endsection