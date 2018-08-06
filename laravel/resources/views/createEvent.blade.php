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
    <section class="container g-py-50 g-px-75--sm g-pb-170--md">
        <div class="row justify-content-center">

            <form class="g-py-15" method="post">
                {{ csrf_field() }}
                <div class="mb-2">
                    <div class="form-group input-group">
                        <input class="form-control text-center " name="title" type="text" placeholder="Event Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group input-group">
                        <div class="mb-2">
                            <label for="start_date">Start Date:</label>
                            <input class="form-control text-center " name="start_date" type="datetime-local" placeholder="Start Date">
                        </div>
                        <div class="mb-2">
                            <label for="start_date ">End Date:</label>
                            <input class="form-control text-center " name="end_date" type="datetime-local" placeholder="End Date">
                        </div>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="form-group input-group">
                        <div class="mb-2">
                            <label for="start_date">Start Time:</label>
                            <input class="form-control text-center " name="start_time" type="time" placeholder="Start Time">
                        </div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="form-group input-group">
                        <div class="mb-2">
                            <label for="comments ">Comments: <small>try to keep this limited.</small></label><br>
                            <textarea class="form-control text-center" cols="40" name="comments" ></textarea>
                        </div>
                    </div>
                </div>

                <button class="btn btn-md btn-block u-btn-primary rounded-0 g-py-15 mb-5" type="submit">Create Event!</button>
            </form>
        </div>
    </section>
@endsection
