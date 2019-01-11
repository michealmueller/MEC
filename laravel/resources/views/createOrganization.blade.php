<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 1/5/2019
 * Time: 11:18 AM
 */
?>

@extends('layouts.master')

@section('content')
    <section class="g-py-80--md g-py-80 ">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-10 ml-md-auto mr-md-auto g-bg-gray-dark-v1">
                    <h3 class="h5 text-uppercase g-font-weight-700 g-mb-20">Create Organization</h3>
                    <p class="lead g-mb-40">Create your organization by filling out the form below.</p>
                    <!-- Form -->
                    <form class="g-py-15" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('shared.errors')
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <h4>Organization Logo</h4>
                                <div class="col-sm-12 g-pb-30">
                                    <img id="avatar" src="//placehold.it/100" class="mx-auto g-mb-10--md img-fluid img-circle d-block g-pb-20" alt="avatar">
                                    <label class="btn-bs-file btn btn-block btn-primary">
                                        Browse
                                        <input id="avatarUp" type="file" name="org_logo" style="display: none;">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group">
                                <input class="form-control search-input text-center" type="text" name="org_name" placeholder="Organization Name" autocomplete="off" value="{{ old('org_name') }}" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <div class="input-group">
                                    <input class="form-control text-center " name="org_rsi_site" type="url" placeholder="RSI Organization URL" value="{{ old('org_rsi_site') }}" >
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 mb-4">
                                <div class="input-group">
                                    <input class="form-control text-center" name="org_discord" type="text" placeholder="Organization Discord(Optional)" value="{{ old('org_discord') }}">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary rounded-0 g-py-15 mb-5" type="submit">Create Organization</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection