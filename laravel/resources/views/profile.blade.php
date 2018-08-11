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
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">{{$user->org_name}}'s Profile</h5>
                        <div class="row">
                            <div class="col-md-6">
                                @if($user->founder)
                                    <span class="badge badge-danger"><i class="fa fa-user"></i> Founder</span>
                                @endif
                                @if($user->subscriber)
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
                        <!--/row-->
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
                                        <img id="avatar"
                                             @if($user->avatar)
                                             src="/storage/app/avatars/{{ $user->avatar }}"
                                             @else
                                             src="//placehold.it/100"
                                             @endif
                                             class="mx-auto g-mb-10--md img-fluid img-circle d-block" alt="avatar">
                                        <label  class="btn-bs-file btn btn-block btn-primary ">
                                            Browse
                                            <input id="avatarUp" type="file" name="avatar" style="display: none;">
                                        </label>
                                        <small><p>Image should be 100x100 or smaller</p></small>
                                    </div>
                                </div>
                                <div class="col-lg-4 order-lg-1 text-center"></div>
                            </div>
                            <!-- End Avatar -->
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Organization</label>
                                <div class="col-lg-9">
                                    <input name="org_name" class="form-control" type="text" value="{{$user->org_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input name="email" class="form-control" type="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <!--<br>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                <div class="col-lg-9">
                                    <input name="password" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                <div class="col-lg-9">
                                    <input name="password_confirmation" class="form-control" type="password">

                                </div>
                            </div>-->
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                    <input type="submit" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 order-lg-1 text-center">
                <div class="col-sm-12" style="margin-bottom:20px;">
                    <img
                            @if($user->avatar)
                            src="/storage/app/avatars/{{ $user->avatar }}"
                            @else
                            src="//placehold.it/100"
                            @endif
                            class="mx-auto g-mb-10--md img-fluid img-circle d-block" width="100px" height="100px" alt="avatar">
                </div>
                <h3>{{ $user['org_name'] }}</h3>
                <table>
                    <tr>
                        <th>IP TZ:</th>
                        <td>&nbsp;</td>
                        <td>{{ $data['timezonedata']['timezone'] }}</td>
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