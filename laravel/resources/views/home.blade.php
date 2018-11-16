@extends('layouts.master')

@section('content')
    @if(count($pubEvents) > 0)
        <div class="fixed-bottom g-bg-black-opacity-0_8 ">
            <marquee >
                @foreach($pubEvents as $events)
                    <span class=" g-color-orange">

                        @if($data['timezonedata']== null)
                            @if(\Carbon\Carbon::parse($events->start_date) < \Carbon\Carbon::now())
                                @continue
                            @endif
                            {{ $events->organization->org_name }}: </span>Event Date-{{  \Carbon\Carbon::parse($events->start_date)->setTimezone($_GET['timezone'])->format('m-d-Y g:ia') }} --
                        @else
                            @if(\Carbon\Carbon::parse($events->start_date) < \Carbon\Carbon::now())
                                @continue
                            @endif
                            {{ $events->organization->org_name }}: </span>Event Date-{{  \Carbon\Carbon::parse($events->start_date)->setTimezone($data['timezonedata']->time_zone->name)->format('m-d-Y g:ia') }} --
                        @endif
                    @if($events->brief_url != null)
                        <small ><a target="_blank" href="{{$events->brief_url}}">View Mission Brief</a> -- </small>
                    @endif
                    <small>{!! nl2br($events->comments) !!}</small>

                @endforeach
            </marquee>
        </div>
        @endif
    <section class="container g-pt-100 g-pb-10">
        <!-- Heading -->
        <div class="row justify-content-center text-center g-mb-50">
            <div class="col-lg-9">
                <h1 class="h2 g-color-white g-font-weight-600 mb-2">M.E.C - Multi-Organization Events Calendar</h1>
                <div class="d-inline-block g-width-30 g-height-2 g-bg-primary mb-2"></div>
                <p class="lead mb-0">The Premier Event System for Star Citizen.</p>
            </div>
        </div>
        <!-- End Heading -->

        <div class="col-lg-12 g-mb-30 justify-content-center text-center">
            <div class="row">
                <!-- Icon Blocks -->
                <div class="col-md-4 media g-mb-15">
                    <div class="media-body">
                        <h3 class="h5 g-color-white g-font-weight-600 mb-20">
                            <span class="g-color-primary"><span class="fas fa-share"></span></span>
                                Share your events!</h3>
                        <p class="g-color-gray-dark-v4">you can choose to keep all events private by not sharing the
                            calendar with anyone, Or you can share it with everyone.</p>
                        <!--<a class="g-color-main g-color-primary--hover g-font-weight-600 g-font-size-12 g-text-underline--none--hover text-uppercase" href="#!">Learn More</a>-->
                    </div>
                </div>

                <div class="col-md-4 media g-mb-15">
                    <div class="media-body">
                        <h3 class="h5 g-color-white g-font-weight-600 mb-20">
                            <span class="g-color-primary"><span class="fas fa-user-secret"></span></span>
                            Private Events</h3>
                        <p class="g-color-gray-dark-v4">Want to keep things under wraps? make the event private then
                            only your people can see it!</p>
                        <!--<a class="g-color-main g-color-primary--hover g-font-weight-600 g-font-size-12 g-text-underline--none--hover text-uppercase" href="#!">Learn More</a>-->
                    </div>
                </div>
                <!-- End Icon Blocks -->
                <div class="col-md-4 media g-mb-15">
                    <div class="media-body">
                        <h3 class="h5 g-color-white g-font-weight-600 mb-20">
                            <span class="g-color-primary"><span class="fas fa-user-friends"></span></span>
                            Public Events</h3>
                        <p class="g-color-gray-dark-v4">If you want co-operation, make the event public so that your
                            affiliate organizations can join in on the debauchery </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class=" g-bg-black-opacity-0_5 g-color-white g-py-100">
        <div class="text-center g-mb-60">
            <h1 class="h4"><u>CountDown To CitizenCon 20<span class="g-color-primary">49</span></u></h1>
        </div>
        <div class="js-countdown u-countdown-v1 text-center text-uppercase g-color-white g-line-height-1" data-end-date="2019/10/10 10:00" data-month-format="%m" data-days-format="%d" data-hours-format="%H" data-minutes-format="%M" data-seconds-format="%S">
            <div class="d-inline-block g-bg-black g-brd-around g-brd-black g-pa-20 g-mx-15 g-mb-30">
                <div class="js-cd-month g-font-weight-700 g-font-size-40"></div>
                <hr class="g-brd-white-opacity-0_5 my-2">
                <span class="g-font-size-12">Month</span>
            </div>

            <div class="d-inline-block g-bg-black g-brd-around g-brd-black g-pa-20 g-mx-15 g-mb-30">
                <div class="js-cd-days g-font-weight-700 g-font-size-40"></div>
                <hr class="g-brd-white-opacity-0_5 my-2">
                <span class="g-font-size-12">Days</span>
            </div>

            <div class="d-inline-block g-bg-black g-brd-around g-brd-black g-pa-20 g-mx-15 g-mb-30">
                <div class="js-cd-hours g-font-weight-700 g-font-size-40"></div>
                <hr class="g-brd-white-opacity-0_5 my-2">
                <span class="g-font-size-12">Hours</span>
            </div>

            <div class="d-inline-block g-bg-black g-brd-around g-brd-black g-pa-20 g-mx-15 g-mb-30">
                <div class="js-cd-minutes g-font-weight-700 g-font-size-40"></div>
                <hr class="g-brd-white-opacity-0_5 my-2">
                <span class="g-font-size-12">Minutes</span>
            </div>

            <div class="d-inline-block g-bg-black g-brd-around g-brd-black g-pa-20 g-mx-15 g-mb-30">
                <div class="js-cd-seconds g-font-weight-700 g-font-size-40"></div>
                <hr class="g-brd-white-opacity-0_5 my-2">
                <span class="g-color-white g-font-size-12">Seconds</span>
            </div>
        </div>
    </section>


    <section class="container g-pt-50 g-pb-60 g-bg-g">
        <!-- Heading -->
        <div class="row justify-content-center text-center g-mb-50">
            <div class="col-lg-9">
                <h2 class="h2 g-color-white g-font-weight-600 mb-2">Follow the Latest News</h2>
                <div class="d-inline-block g-width-30 g-height-2 g-bg-primary mb-2"></div>
                <p class="lead mb-0">This is the lates about Star Citizen.</p>
            </div>
        </div>
        <!-- End Heading -->
        <div class="row">
            @foreach($data['feeddata'] as $post)
                <div class="col-sm-6 col-lg-4 g-mb-30">
                    <!-- Blog Grid Overlap Blocks -->
                    <article>
                        <img class="img-fluid w-100 g-pb-15 g-pb-10--md" src="{{ $post->rss_feedImage }}" alt="Image Description">
                        <div class="g-width-80x g-bg-white g-pos-rel g-z-index-1 g-pa-30 g-mt-minus-5 mx-auto">
                            <span class="d-block g-color-gray-dark-v4 g-font-weight-600 g-font-size-12 text-uppercase mb-2">{{ \Carbon\Carbon::parse($post->rss_pubDate,'D d, m Y') }}</span>
                            <h2 class="h5 g-color-black g-font-weight-600 mb-3">
                                <a class="u-link-v5 g-color-black g-color-primary--hover g-cursor-pointer" href="#!">{{ $post->rss_title }}</a>
                            </h2>
                            <p class="g-color-gray-dark-v4 g-line-height-1_8">{{ $post->rss_contentExerpt }}</p>
                            <a class="g-font-size-13" href="{{ $post->rss_link }}" target="_blank">Read more...</a>
                        </div>
                    </article>
                    <!-- End Blog Grid Overlap Blocks -->
                </div>
            @endforeach
        </div>
    </section>


@endsection
