@extends('layouts.master')

@section('content')
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
    <section class="container g-pt-100 g-pb-10 g-bg-black-opacity-0_5 g-color-white" id="one">
        <div class="row justify-content-center text-center g-mb-50">
            <div class="col-lg-9">
                <h1 class="h2 g-color-primary g-font-weight-600 mb-2" >Public Events</h1>
                <div class="d-inline-block g-width-30 g-height-2 g-bg-primary mb-2"></div>
                <p class="lead mb-0">Make you're events public, guaranteed to get more attention!</p>
                <!--<a class="g-color-main g-color-primary--hover g-font-weight-600 g-font-size-12 g-text-underline--none--hover text-uppercase" href="#!">Learn More</a>-->
            </div>
        </div>
        <div class="col-lg-12 g-mb-30 justify-content-center text-center">

            <div class="row">
                <!-- Icon Blocks -->
                <div class="col-md-4 media g-mb-15">
                    <div class="media-body">
                        <h3 class="h5 g-color-white g-font-weight-600 mb-20">Today's Events</h3>
                        <p class="g-color-gray-dark-v4">

                                @if(isset($sorted['today']))
                                    @if(count($sorted['today']) > 0)
                                        <ul>
                                        @foreach($sorted['today'] as $item)
                                                <li><b class="g-color-primary">{{ $item->organization->org_name }}</b> - {{ $item->title }} </li>
                                        @endforeach
                                        </ul>
                                    @else
                                        Nothing on the books for today
                                    @endif
                                @endif

                        </p>
                        <!--<a class="g-color-main g-color-primary--hover g-font-weight-600 g-font-size-12 g-text-underline--none--hover text-uppercase" href="#!">Learn More</a>-->
                    </div>
                </div>

                <div class="col-md-4 media g-mb-15">
                    <div class="media-body">
                        <h3 class="h5 g-color-white g-font-weight-600 mb-20">Events This Week</h3>
                        <p class="g-color-gray-dark-v4">

                            @if(isset($sorted['thisWeek']))
                                @if(count($sorted['thisWeek']) > 0)
                                    <ul>
                                    @foreach($sorted['thisWeek'] as $item)
                                        <li><b class="g-color-primary">{{ $item->organization->org_name }}</b> - {{ $item->title }} </li>
                                    @endforeach
                                    </ul>
                                @else
                                    Nothing on the books for this week
                                @endif
                            @endif

                        </p>
                        <!--<a class="g-color-main g-color-primary--hover g-font-weight-600 g-font-size-12 g-text-underline--none--hover text-uppercase" href="#!">Learn More</a>-->
                    </div>
                </div>
                <!-- End Icon Blocks -->
                <div class="col-md-4 media g-mb-15">
                    <div class="media-body">
                        <h3 class="h5 g-color-white g-font-weight-600 mb-20">Events This Month</h3>
                        <p class="g-color-gray-dark-v4">
                        @if(isset($sorted['thisMonth']))
                            @if(count($sorted['thisMonth']) > 0)
                                <ul>
                                    @foreach($sorted['thisMonth'] as $item)
                                        <li><b class="g-color-primary">{{ $item->organization->org_name }}</b> - {{ $item->title }} </li>
                                    @endforeach
                                </ul>
                            @else
                                    Nothing on the books for this month
                            @endif
                        @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="container g-pt-100 g-pb-10 ">

        <div class="row justify-content-center text-center g-mb-50">
            <div class="col-lg-9">
                <h1 class="h2 g-color-white g-font-weight-600 mb-2">CountDown To CitizenCon 20<span class="g-color-primary">49</span></h1>
                <div class="d-inline-block g-width-30 g-height-2 g-bg-primary mb-2"></div>
            </div>
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


    <section class="container g-pt-50 g-pb-60 g-bg-g g-bg-black-opacity-0_5 g-color-white" >
        <!-- Heading -->
        <div class="row justify-content-center text-center g-mb-50" id="two">
            <div class="col-lg-9">
                <h2 class="h2 g-color-primary g-font-weight-600 mb-2">Follow the Latest News</h2>
                <div class="d-inline-block g-width-30 g-height-2 g-bg-primary mb-2"></div>
                <p class="lead mb-0">This is the latest about Star Citizen.</p>
            </div>
        </div>
        <!-- End Heading -->
        <div class="row">
            @foreach($data['feeddata'] as $post)
                <div class="col-sm-6 col-lg-4 g-mb-30">
                    <!-- Blog Grid Overlap Blocks -->
                    <article>
                        <img class="img-fluid
                         @if($post->rss_feed == 'RSI Comm-Link')
                         w-100 g-pb-10--md
                         @endif " src="{{ $post->rss_feedImage }}" alt="{{ $post->rss_feed }}">
                        <div class="g-width-80x g-bg-grey-dark-v1 g-pos-rel g-z-index-1 g-pa-30 g-mt-minus-5 mx-auto">
                            <span class="d-block g-color-white g-font-weight-600 g-font-size-12 text-uppercase mb-2">{{ \Carbon\Carbon::parse($post->rss_pubDate)->setTimezone($data['timezonedata']->time_zone->name)->format('D M d, Y H:i:s') }}</span>
                            <h2 class="h5 g-color-white g-font-weight-600 mb-3">
                                <a class="u-link-v5 g-color-grey-dark-v4 g-color-primary--hover g-cursor-pointer" href="#!">{{ $post->rss_title }}</a>
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
