<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/7/2018
 * Time: 9:48 AM
 */
?>

@extends('layouts.master')

@section('content')
    <section class="container g-py-50 g-px-75--sm g-pb-170--md">
        <div class="row justify-content-center">

            <form class="g-py-15" method="post">
                {{ csrf_field() }}
                <div class="mb-12">
                    <div class="row mb-6">
                        <input class="form-control text-center " name="title" type="text" placeholder="Event Name" value="{{ $eventData->title }}">
                    </div>
                    <div class="row mb-6">
                        <div class="mb-3 pull-left">
                            <label for="start_date">Start Date:</label>
                            <input class="form-control text-center " name="start_date" type="datetime-local" value="{{ \Carbon\Carbon::parse($eventData->start_date)->setTimezone($data['timezonedata']['timezone'])->format('Y-m-d\TH:i:s') }}">
                        </div>
                        <div class="mb-3 pull-right">
                            <label for="start_date ">End Date:</label>
                            <input class="form-control text-center " name="end_date" type="datetime-local" value="{{ \Carbon\Carbon::parse($eventData->start_date)->setTimezone($data['timezonedata']['timezone'])->format('Y-m-d\TH:i:s') }}">
                        </div>
                    </div>
                </div>
                <div class="mb-12 row">
                    <label for="start_date ">Mission Brief:</label>
                    <input class="form-control text-center" type="url" name="brief" placeholder="GCloud Document URL">
                </div>
                <div class="row mb-12">
                    <label for="comments ">Description:</label><br>
                    <textarea class="form-control text-center"  name="comments" rows="15" >{{ $eventData->comments }}</textarea>
                </div>
                <div class="g-pa-25--md">
                    <button class="btn btn-md btn-block u-btn-primary rounded-0 g-py-15 mb-5" type="submit">Update Event!</button>
                </div>
            </form>
        </div>
    </section>
@endsection
