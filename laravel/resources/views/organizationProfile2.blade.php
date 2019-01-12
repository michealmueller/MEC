<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 1/11/2019
 * Time: 3:19 PM
 */
?>

@extends('layouts.master')

@section('content')
    @if($user->organization && $user->organization_id == $orgid)
    <section class="g-mb-100">
        <div class="container">
            <div class="row">
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
                                    <div class="js-scrollbar card-block u-info-v1-1 g-height-400 g-pa-0 mCustomScrollbar _mCS_1 mCS-autoHide" style="overflow: visible;">
                                        <div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;">
                                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                                <ul class="list-unstyled">
                                                    @if(isset($sorted['thisMonth']))
                                                        @foreach($sorted['thisMonth'] as $item)
                                                            <li class="media g-brd-around g-brd-gray-light-v4 g-brd-left-3 rounded g-pa-20 g-mb-10" style="border-left:3px solid {{ $item->borderColor }} !important">
                                                                <div class="media-body">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h5 class="h6 g-font-weight-600 g-color-white"><a href="/view/event/{{ $item->id }}">{{ $item->title }}</a></h5>
                                                                        @if(isset($item->organization->id))
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
                                <!-- Activity Panel -->
                                <div class="card border-0">
                                    <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                                        <h3 class="h6 mb-0">
                                            <i class="icon-directions g-pos-rel g-top-1 g-mr-5"></i>Recent Activity
                                        </h3>
                                    </div>

                                    <div class=" card-block u-info-v1-1 g-height-400 g-pa-0 mCustomScrollbar _mCS_2 mCS-autoHide" style="overflow: visible;">
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
                                <!-- End Activity Panel -->
                            </div>
                        </div>
                    </div>
                    <!-- End Projects & Activities Panels -->

                    <!-- Projects & News Feeds Panels -->
                    <div class="tab-pane g-mt-125" id="edit">
                        @include('shared.errors')
                        <form method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <!-- Begin Avatar -->
                            <div class="row">
                                <div class="col-lg-4 order-lg-1 text-center"></div>
                                <div class="col-lg-4 order-lg-1 text-center">
                                    <div class="col-sm-12" style="margin-bottom:20px;">
                                        <img id="avatar" src="/storage/app/org_logos/{{ $organization->org_logo}}" class="mx-auto g-mb-10--md img-fluid img-circle d-block" alt="avatar">
                                        <label  class="btn-bs-file btn btn-block btn-primary ">
                                            Browse
                                            <input id="avatarUp" type="file" name="org_logo" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 order-lg-1 text-center"></div>
                            </div>
                            <!-- End Avatar -->
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Organization Name</label>
                                <div class="col-lg-9">
                                    <input name="org_name" class="form-control" type="text" value="{{$organization->org_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Organization RSI Url</label>
                                <div class="col-lg-9">
                                    <input name="org_rsi_site" class="form-control" type="url" value="{{$organization->org_rsi_site}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Organization Discord Url</label>
                                <div class="col-lg-9">
                                    <input name="org_discord" class="form-control" type="url" value="{{$organization->org_discord}}">
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

                    @if($user->lead == 1)
                        <div class="tab-pane" id="members">
                            <div class="shortcode-html">
                                <!-- Hover Rows -->
                                <div class="card g-brd-primary rounded-0 g-mb-30">
                                    <h3 class="card-header g-bg-primary g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                                        <i class="fa fa-gear g-mr-5"></i>
                                        Organization Members
                                    </h3>

                                    <div class="table-responsive">
                                        <table class="table table-hover u-table--v1 mb-0">
                                            <thead>
                                            <tr>
                                                <th class="hidden-md">Avatar</th>
                                                <th>Username</th>
                                                <th class="hidden-sm">Email</th>
                                                <th>Join Date</th>
                                                <th>Lead</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($members as $member)
                                                <tr>
                                                    <th scope="row"><img height="50" src="/storage/app/org_logos/{{ $member->avatar }}" /></th>
                                                    <td>{{ $member->username }}</td>
                                                    <td class="hidden-sm">{{ $member->email }}</td>
                                                    <td>{{ $member->created_at }}</td>
                                                    <td id="lead{{$member->id}}">
                                                        @if($member->lead == 1)
                                                            <span class="u-label u-label-warning g-color-white">Event Lead</span>
                                                            <br>
                                                            <button class="btn btn-xs btn-danger" onclick="ajaxRequest('/profile/remove/lead', '', 'save', '', {{ $member->id }})"><span class="fa fa-icon-remove  " ></span>Remove Event Lead</button>
                                                        @else
                                                            <button class="btn btn-xs btn-success" onclick="ajaxRequest('/profile/add/lead', '', 'save', '', {{$member->id}})"><span class="fa fa-check" ></span>Make Event Lead</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Hover Rows -->
                            </div>
                        </div>
                        <div class="tab-pane" id="sharing">
                            <div class="row">
                                <div class="col-md-12 justify-content-center text-center row">

                                    <div class="justify-content-center text-center g-pa-15">
                                        <p>By moving an organization from the left list to the right list, you are giving them the ability
                                            to view your public events on there organization calendar.</p>
                                    </div>

                                    <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-50">

                                    <div class="col-md-4">
                                        <select class="form-control" multiple id='lstBox1' style="height: 150px; width: 100%;">
                                            @if(isset($org_list))
                                                @foreach($org_list as $org)
                                                    <option value="{{ $org->id }}">{{ $org->org_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-2 justify-content-center text-center">
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-2">
                                            <input class="btn btn-primary " type='button' id='btnRight' value ='  >>  '/>
                                        </div>
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-2">
                                            <input class="btn btn-primary " type='button' id='btnLeft' value ='  <<  '/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <form method="post" action="/update/share" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <select class="form-control" multiple="multiple" id='lstBox2' name="share[]" style="height: 150px; width: 100%;">
                                                @if(isset($sharing))
                                                    @foreach($sharing as $shared)
                                                        <option value="{{ $shared->shared_id }}">{{ $shared->org_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <br>
                                            <input id="sharing" type="submit" class="btn btn-primary btn-block" onclick="selectAll()" value="Save">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="requests">
                            <p>These are the requests that come in from users that have not used the reference code to register to the organization. a.k.a "the randoms"</p>

                            <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-50">

                            <!-- Table Inverse -->
                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th class="hidden-sm">email</th>
                                        <th>Requested On</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($org_requests as $joinReq)
                                        <tr>
                                            <td>
                                                @if(isset($joinReq->username))
                                                    {{$joinReq->username}}
                                                @endif
                                            </td>
                                            <td>{{ $joinReq->email }}</td>
                                            <td>{{ $joinReq->created_at->format('Y-m-d H:m:s') }}</td>
                                            <td>
                                                <a href="/request/1/{{ $user->organization_id }}/{{ $joinReq->id }}"><button type="button" class="btn btn-primary btn-block">Approve</button></a>
                                                <a href="/request/0/{{ $user->organization_id }}/{{ $joinReq->id }}"><button type="button" class="btn btn-danger btn-block">Deny</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="refcode">
                            <p>You can use this code to allow organization members to join simply and quickly.</p>
                            <p>This code will change and be saved in the DB on each button click.</p>
                            <p>until i get a custom algorithm try to avoid periods and slashed in the code.</p>

                            <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-50">

                            <div class="row">
                                <div class="col-md-4 text-center center-v center-block">Reference Code:</div>
                                <div class="col-md-4">
                                    @if(isset($user->organization->refHash))
                                        <p><h3><b id="refHash"><a href="https://events.citizenwarfare.com/join/ref/{{ $user->organization->refHash }}">{{ $user->organization->refHash }}</a></b></h3></p>
                                    @else
                                        <p>Click Generate!</p>
                                    @endif
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-2 order-lg-1 text-center"></div>
                                <div class="col-lg-8 order-lg-1 text-center">
                                    <button class="btn btn-primary btn-block" name="generate" onclick="ajaxRequest('/profile/generate', 'refHash', 'ref')">Generate</button>
                                </div>
                                <div class="col-lg-2 order-lg-1 text-center"></div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- End Profile Content -->

                <!-- Profile Sidebar -->
                <div class="col-lg-3 g-mb-50 g-mb-0--lg">
                    <!-- User Image -->
                    <div class="g-pos-rel">
                        <figure>
                            <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="/storage/app/org_logos/{{$organization->org_logo}}" alt="Image Description">
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

                          <small class="btn btn-sm u-btn-primary rounded-0">{{ $organization->org_name}}</small>
                </span>
                    {{--@if($status['founder'])
                        <small class="d-block badge badge-danger g-pa-5"><i class="fa fa-user"></i> Founder</small>
                    @endif
                    @if($user->subscribed('prod_EBezTZOsApxwwb') || $user->subscribed('prod_EBaPJtFVdyzYel'))
                        <small class="d-block badge badge-primary g-pa-5"><i class="fa fa-money"></i> Subscriber</small>
                    @endif--}}
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
                        @if($user->lead == 1)
                        <a href="" data-target="#members" data-toggle="tab" class="nav-link list-group-item g-bg-gray-dark-v1 list-group-item-action justify-content-between">
                            <span><i class="icon-notebook g-pos-rel g-top-1 g-mr-8"></i> Members </span>
                        </a>
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link list-group-item g-bg-gray-dark-v1 list-group-item-action justify-content-between">
                            <span><i class="icon-notebook g-pos-rel g-top-1 g-mr-8"></i> Edit </span>
                        </a>
                        <a href="" data-target="#sharing" data-toggle="tab" class="nav-link list-group-item g-bg-gray-dark-v1 list-group-item-action justify-content-between">
                            <span><i class="icon-notebook g-pos-rel g-top-1 g-mr-8"></i> Sharing </span>
                        </a>
                        <a href="" data-target="#requests" data-toggle="tab" class="nav-link list-group-item g-bg-gray-dark-v1 list-group-item-action justify-content-between">
                            <span><i class="icon-notebook g-pos-rel g-top-1 g-mr-8"></i> Requests </span>
                            @if(isset($requests) && $requests != null)
                                <span class="u-label g-font-size-11 g-bg-primary g-rounded-20 g-px-10">{{count($requests)}}</span>
                            @endif
                        </a>
                        <a href="" data-target="#refcode" data-toggle="tab" class="nav-link list-group-item g-bg-gray-dark-v1 list-group-item-action justify-content-between">
                            <span><i class="icon-notebook g-pos-rel g-top-1 g-mr-8"></i> Generate Ref. Code </span>
                        </a>
                        @endif
                        <!-- End Edit -->
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
                                <h6 class="g-mb-10">Founded:
                                    <span class="float-right g-ml-10">
                                    {{ \Carbon\Carbon::parse($user->created_at)->setTimezone(session()->get('timezone'))->format('m-d-Y') }}
                                </span>
                                </h6>
                            </div>
                            <!-- End Member Since-->
                            <!-- Calendar Link -->
                            <div class="g-mb-20">
                                <h6 class="g-mb-10">Calendar Link <span class="float-right g-ml-10">
                                    <small>
                                        <a href="https://events.citizenwarfare.com/{{ $user->organization->org_name }}/calendar">/{{ $user->organization->org_name }}/calendar</a>
                                    </small>
                                </span>
                                </h6>
                            </div>
                            <!-- End Calendar Link -->
                            <!-- Unify Project -->
                            <div class="g-mb-20">
                                <h6 class="g-mb-10">Reference Code
                                    <small>
                                        <span id="refHash2">
                                            <a href="https://events.citizenwarfare.com/join/ref/{{ $organization->refHash}}">{{ $organization->refHash }}</a>
                                        </span>
                                    </small>
                                </h6>
                            </div>
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
            </div>
        </div>
    </section>
    @else
        <section class="g-py-40 g-color-white">
            <div class="container text-center g-bg-gray-dark-v1">
                <div class="row">
                    <div class="col-md-10 ml-md-auto mr-md-auto">
                        <h3 class="h5 text-uppercase g-font-weight-700 g-mb-20">Request to Join</h3>
                        <h2 class="display-4 text-uppercase g-font-weight-600 g-mb-20">
                            <span><img height="100px" src="/storage/app/org_logos/{{ $organization->org_logo }}"> </span><span class="g-color-primary" >{{ $organization->org_name }}</span>
                        </h2>

                        <p class="lead g-mb-40">You are currently viewing this organizations public profile page.</p>
                        @if(!$requested)
                            <div id="answer">
                                <p >To join this organization click the send request button bellow!</p>
                                <button id="requestButton" onclick="ajaxRequest('/join/organization/request', 'answer', 'request', '',{{$arrData}})" class="btn btn-primary">Request to Join</button>
                            </div>
                        @else
                            <div id="answer"><h4>Request Already Sent</h4></div>
                        @endif
                        <p>Current Members Include:</p>
                        <div class="table-responsive">
                            <table class="table table-striped u-table--v1 table-dark mb-0">
                                <thead>
                                <tr>
                                    <th class="hidden-md">Avatar</th>
                                    <th>Username</th>
                                    <th>Join Date</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <th scope="row"><img height="50" src="/storage/app/org_logos/{{ $member->avatar }}" /></th>
                                        <td>{{ $member->username }}</td>
                                        <td>{{ $member->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection