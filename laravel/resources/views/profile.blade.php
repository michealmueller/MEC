@extends('layouts.master')

@section('content')
    <div class="container g-color-white g-pa-25--md">
        <div class="row my-2">
            <div class="col-lg-4 order-lg-1 text-center">
                <div class="col-sm-12" style="margin-bottom:20px;">
                    <img src="/storage/app/avatars/{{$user->avatar}}" class="mx-auto g-mb-10--md img-fluid img-circle d-block" width="100px" height="100px" alt="avatar">
                </div>
                <div class="row">
                    @if(isset($user->organization->org_logo))
                    <div class="col-md-4">
                            <img class="mx-auto g-mb-10--md img-fluid img-circle d-block" width="50px" src="/storage/app/org_logos/{{$user->organization->org_logo}}">
                    </div>
                    <div class="col-md-4">
                        <h5>{{ $user->organization->org_name}}</h5>
                    </div>
                    @endif
                </div>

                <table>
                    <tr>
                        <th>IP TZ:</th>
                        <td>&nbsp;</td>
                        <td>{{ $data['timezonedata']->time_zone->name }}</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th>System TZ:</th>
                        <td>&nbsp;</td>
                        <td id="systemtz">
                        </td>
                    </tr>
                </table>
                @if(!isset($user->organization))
                <div class="col-md-12 g-pt-30">
                    <p>To create or join an organization go to the organization tab.</p>
                </div>
                @endif
            </div>
            <div class="col-lg-8 order-lg-2 ">
                <ul class="nav nav-tabs " id="tabMenu">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5 active">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#organization" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5">Organization</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#discord" data-toggle="tab" class="nav-link g-brd-gray-light-v4 g-mx-5">Discord Bot</a>
                    </li>
                </ul>
                <div class="tab-content py-4 g-pa-10">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">{{$user->username}}'s Profile</h5>
                        @if(isset($user->organization->org_name))
                            <h6 class="g-pa-15--md">Calendar Link: <a href="https://events.citizenwarfare.com/{{ $user->organization->org_name }}/calendar">/{{ $user->organization->org_name }}/calendar</a></h6>
                            @if(isset($user->organization->refHash) && $user->organization->refHash != '')
                                <h6 class="g-pa-15--md">Reference Code Link: <span id="refHash2"><a href="https://events.citizenwarfare.com/join/ref/{{ $user->organization->refHash}}">/join/ref/{{ $user->organization->refHash }}</a></span></h6>
                            @endif
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                @if($status['founder'])
                                    <span class="badge badge-danger"><i class="fa fa-user"></i> Founder</span>
                                @endif
                                @if($user->subscribed('prod_EBezTZOsApxwwb') || $user->subscribed('prod_EBaPJtFVdyzYel'))
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
                                <div class="col-lg-4 order-lg-1 text-center"></div>
                                <div class="col-lg-4 order-lg-1 text-center">
                                    <div class="col-sm-12" style="margin-bottom:20px;">
                                        <img id="avatar"src="/storage/app/avatars/{{$user->avatar}}"class="mx-auto g-mb-10--md img-fluid img-circle d-block" alt="avatar">
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
                    <div class="tab-pane" id="organization">
                        <div class="row justify-content-center text-center">
                            <div class="col-md-6 g-brd-right--md ">
                                <h5>Create your very own Organization.</h5>
                                <a href="/profile/create/organization" class="btn btn-primary">Create Now</a>
                            </div>
                            <div class="col-md-6">
                                <h5>Join an Organization</h5>
                                <ul style="list-style: none ">
                                @foreach($org_list as $org)
                                        <li><a href="/profile/organization/{{ $org->id }}"><img src="/storage/app/org_logos/{{ $org->org_logo }}" width="25px">{{ $org->org_name }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="discord">
                        <ul>
                            <li>#1: Click on Add Bot, to add the bot to your discord.</li>
                            <li>#2: once the bot is in your Discord, follow these steps
                                <ul>
                                    <li>#2a. When the bot is added it creates a Role that only it can have, you need to set that role's permissions in the channel(s) you want the bot to announce in.</li>
                                    <ul>
                                        <li><b>At a minimum the bot needs these permissions</b></li>
                                        <li>Send Messages</li>
                                        <li>Read Messages</li>
                                        <li>Manage Webhooks</li>
                                        <li>Embed Links</li>
                                    </ul>
                                        <li>#2b. Type cw_setup and follow the instructions.</li>
                                    <ul>
                                        <li>Example: cw_setup publicChan privateChan organization_name</li>
                                    </ul>
                                </ul>
                            </li>
                            <li>#3: When the bot sends a message to the channel(s) you specified you are good to go!</li>
                            <li>#4: if you need further help, join the <a href="https://discord.gg/z6xBKJd">Discord!</a></li>
                        </ul>

                        <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-50">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <a class="btn btn-primary btn-block" href="https://discordapp.com/oauth2/authorize?client_id=522885672248279041&permissions=536954896&scope=bot" target="_blank">Add Bot</a>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection