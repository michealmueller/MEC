@extends('layouts.master')

@section('content')
    <div class="container g-color-white g-pa-25--md">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs" id="tabMenu">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                    </li>
                    @if($user->lead == 1)
                    <li class="nav-item">
                        <a href="" data-target="#sharing" data-toggle="tab" class="nav-link">Sharing</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#requests" data-toggle="tab" class="nav-link">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#refcode" data-toggle="tab" class="nav-link">Generate Ref. Code</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">{{$user->username}}'s Profile</h5>
                        <h6 class="g-pa-15--md">Calendar Link: <a href="https://events.citizenwarfare.com/{{ $user->organization->org_name }}/calendar">/{{ $user->organization->org_name }}/calendar</a></h6>
                        <div class="row">
                            <div class="col-md-6">
                                @if($status['founder'])
                                    <span class="badge badge-danger"><i class="fa fa-user"></i> Founder</span>
                                @endif
                                @if($status['sub'])
                                    <span class="badge badge-primary"><i class="fa fa-money"></i> Subscriber</span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-2">Recent Activity</h5>
                                <table class="table table-sm table-hover table-striped">
                                    <tbody>
                                   @if(isset($user->recent))

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
                            <input type="hidden" name="form" value="0">
                            {{csrf_field()}}
                            <!-- Begin Avatar -->
                            <div class="row">
                                @if($user->lead == 1)
                                <div class="col-lg-4 order-lg-1 text-center"></div>
                                <div class="col-lg-4 order-lg-1 text-center">
                                    <div class="col-sm-12" style="margin-bottom:20px;">
                                        <img id="avatar"
                                             @if($user->organization->org_logo)
                                             src="/storage/app/org_logos/{{ $user->organization->org_logo}}"
                                             @else
                                             src="//placehold.it/100"
                                             @endif
                                             class="mx-auto g-mb-10--md img-fluid img-circle d-block" alt="avatar">
                                        <label  class="btn-bs-file btn btn-block btn-primary ">
                                            Browse
                                            <input id="avatarUp" type="file" name="avatar" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 order-lg-1 text-center"></div>
                                @endif
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
                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                    <input type="submit" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                    @if($user->lead == 1)
                    <div class="tab-pane" id="sharing">
                        <div class="row">
                            <div class="col-md-12 justify-content-center text-center row">

                                <div class="col-md-4">
                                    <select class="form-control" multiple id='lstBox1' style="height: 150px; width: 100%;">
                                        @foreach($org_list as $org)
                                            <option value="{{ $org->id }}">{{ $org->org_name }}</option>
                                        @endforeach
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
                                        <input id="sharing" type="submit" class="btn btn-primary btn-block" onclick="selectAll()" value="Save">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="requests">
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
                        <div class="row">
                            <div class="col-md-4 text-center center-v center-block">Reference Code:</div>
                            <div class="col-md-4">
                                @if(isset($user->organization->refHash))
                                    <p><h3><b><a href="https://events.citizenwarfare.com/join/ref/{{ $user->organization->refHash }}">{{ $user->organization->refHash }}</a></b></h3></p>
                                @else
                                    <p>Click Generate!</p>
                                @endif
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <form method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="form" value="1">
                            <div class="row">
                                <div class="col-lg-2 order-lg-1 text-center"></div>
                                <div class="col-lg-8 order-lg-1 text-center">
                                    <input class="btn btn-primary btn-block" type="submit" value="Generate">
                                </div>
                                <div class="col-lg-2 order-lg-1 text-center"></div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 order-lg-1 text-center">
                <div class="col-sm-12" style="margin-bottom:20px;">
                    <img
                            @if($user->organization->org_logo)
                            src="/storage/app/org_logos/{{ $user->organization->org_logo }}"
                            @else
                            src="//placehold.it/100"
                            @endif
                            class="mx-auto g-mb-10--md img-fluid img-circle d-block" width="100px" height="100px" alt="avatar">
                </div>
                <h3>{{ $user->organization->org_name}}</h3>
                <table>
                    <tr>
                        <th>IP TZ:</th>
                        <td>&nbsp;</td>
                        @if($data['timezonedata'] == null)
                            <td>{{ $_GET['timezone'] }}</td>
                        @else
                            <td>{{ $data['timezonedata']->time_zone->name }}</td>
                        @endif
                    </tr>
                    <tr></tr>
                    <tr>
                        <th>System TZ:</th>
                        <td>&nbsp;</td>
                        <td id="systemtz">

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection