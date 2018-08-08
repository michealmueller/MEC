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
                <div class="mb-12">
                    <div class="row mb-6">
                        <input class="form-control text-center " name="title" type="text" placeholder="Event Name">
                    </div>
                    <div class="row mb-6">
                        <div class="mb-3 pull-left">
                            <label for="start_date">Start Date:</label>
                            <input class="form-control text-center " name="start_date" type="datetime-local">
                        </div>
                        <div class="mb-3 pull-right">
                            <label for="start_date ">End Date:</label>
                            <input class="form-control text-center " name="end_date" type="datetime-local" >
                        </div>
                    </div>
                </div>
                <div class="mb-12 row">
                    <label for="start_date ">Mission Brief:</label>
                    <input class="form-control text-center" type="url" name="brief" placeholder="GCloud Document URL">
                </div>
                <div class="row mb-12">
                    <label for="comments ">Description:</label><br>
                    <textarea class="form-control text-center"  name="comments" rows="15" ></textarea>
                </div>
                <div class="g-pa-25--md">
                    <button class="btn btn-md btn-block u-btn-primary rounded-0 g-py-15 mb-5" type="submit">Create Event!</button>
                </div>
            </form>
        </div>
    </section>
@endsection
