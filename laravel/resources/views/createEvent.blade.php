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
    <section class="container g-py-50 g-px-110--sm g-pb-170--md">
        <div class="container g-color-white g-pa-25--md">
            <div class="row my-2">
                <!--Profile section-->
                <div class="col-lg-4 order-lg-1 text-center">
                    <div class="col-sm-12" style="margin-bottom:20px;">
                        <img
                                @if($user->organization->org_logo)
                                src="/storage/app/org_logos/{{ $user->organization->org_logo }}"
                                @else
                                src="//placehold.it/100"
                                @endif
                                class="mx-auto g-mb-10--md img-fluid img-circle d-block" width="100px" height="100px" alt="org_logo">
                    </div>
                    <h3>{{ $user->organization->org_name }}</h3>
                    <table>
                        <tr>
                            <th>IP TZ:</th>
                            <td>&nbsp;</td>
                            <td>
                                @if($data['timezonedata']!= null)
                                    {{ $data['timezonedata']->time_zone->name }}
                                @endif
                            </td>
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
                <!--END-->
                <div class="col-lg-8 order-lg-2">
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
                            <label for="example-text-input" class="col-2 col-form-label">Description</label>
                            <div class="col-10">
                                <textarea class="form-control" id="content" name="comments"></textarea>
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
                        <div class="g-pa-25--md">
                            <button class="btn btn-md btn-block btn-primary rounded-0 g-py-15 mb-5" type="submit">Create Event!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
