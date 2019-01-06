<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 1/5/2019
 * Time: 4:18 PM
 */
?>

@extends('layouts.master')

@section('content')
    @if($user->organization && $user->organization_id == $orgid)
    <div class="container g-color-white g-pa-25--md">
        <div class="row my-2">
            <div class="col-lg-4 order-lg-1 text-center">
                <div class="row">
                    @if(isset($user->organization->org_logo))
                        <div class="col-md-4">
                            <img class="mx-auto g-mb-10--md img-fluid img-circle d-block" width="50px" src="/storage/app/org_logos/{{$organization->org_logo}}">
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $organization->org_name}}'s Profile</h4>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-8 order-lg-2 ">
                <ul class="nav nav-tabs " id="tabMenu">
                    <li class="nav-item">
                        <a href="" data-target="#members" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5">Members</a>
                    </li>
                    @if($user->lead == 1)
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#sharing" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5">Sharing</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#requests" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#refcode" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5">Generate Ref. Code</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content py-4 g-pa-10">
                    <div class="tab-pane active" id="profile">
                        @if(isset($user->organization->org_name))
                            <h6 class="g-pa-15--md">Calendar Link: <a href="https://events.citizenwarfare.com/{{ $user->organization->org_name }}/calendar">/{{ $user->organization->org_name }}/calendar</a></h6>
                            @if(isset($user->organization->refHash) && $user->organization->refHash != '')
                                <h6 class="g-pa-15--md">Reference Code Link: <span id="refHash2"><a href="https://events.citizenwarfare.com/join/ref/{{ $user->organization->refHash}}">/join/ref/{{ $user->organization->refHash }}</a></span></h6>
                            @endif
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="mt-2">Recent Activity</h5>
                                <table class="table table-sm table-hover table-striped">
                                    <tbody>
                                    @if(isset($organization->recent))

                                    @else
                                        Nothing New Here.
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="edit">
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
            </div>
        </div>
    </div>
    @else
        <section class="g-py-200--md g-py-80 g-color-white">
            <div class="container text-center">
                <div style="background: url('/storage/app/org_logos/{{ $organization->org_logo }}') no-repeat center;background-size: contain ">
                </div>
                <div class="row">
                    <div class="col-md-10 ml-md-auto mr-md-auto">
                        <h3 class="h5 text-uppercase g-font-weight-700 g-mb-20">Request to Join</h3>
                        <h2 class="display-4 text-uppercase g-font-weight-600 g-mb-20">
                            <span><img height="100px" src="/storage/app/org_logos/{{ $organization->org_logo }}"> </span><span class="g-color-primary" >{{ $organization->org_name }}</span>
                        </h2>

                        <p class="lead g-mb-40">You are currently viewing this organizations public profile page.</p>
                        <p >To join this organization click the send request button bellow!</p>

                        <button onclick="ajaxRequest()" class="btn btn-primary">Request to Join</button>

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