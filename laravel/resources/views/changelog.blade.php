<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/10/2018
 * Time: 11:40 AM
 */
?>
@extends('layouts.master')

@section('content')

    <section class="container g-py-100">
        <div class="row justify-content-center">

            <ul class="list-unstyled">
                @foreach($data['commitLog'] as $msg)
                <li class="media g-brd-around g-brd-gray-light-v4 g-brd-left-3 g-brd-teal-left g-rounded-3 g-pa-20 g-mb-7">
                    <div class="media-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="h6 g-font-weight-600 g-color-black">Arthmael86</h5>
                            <span class="small text-nowrap g-color-teal">30 min ago</span>
                        </div>
                        <p>{{ $msg['message'] }}</p>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </section>

@endsection
