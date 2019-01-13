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
                                        <ul class="list-unstyled">
                                            @foreach($sorted['thisMonth'] as $item)
                                                @if($item->user_id)
                                                    <li><b class="g-color-primary">{{ \App\User::findorfail($item->user_id)->username }}</b> - <a href="/view/event/{{ $item->id }}"> {{ $item->title }} </a></li>
                                                @else
                                                    <li><b class="g-color-primary">{{ $item->organization->org_name }}</b> - {{ $item->title }} </li>
                                                @endif
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
                                    <ul class="list-unstyled">
                                        @foreach($sorted['thisMonth'] as $item)
                                            @if($item->user_id)
                                                <li><b class="g-color-primary">{{ \App\User::findorfail($item->user_id)->username }}</b> - <a href="/view/event/{{ $item->id }}"> {{ $item->title }} </a></li>
                                            @else
                                                <li><b class="g-color-primary">{{ $item->organization->org_name }}</b> - {{ $item->title }} </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    Nothing on the books for this week
                                @endif
                            @endif

                        </p>
                        <!--<a class="g-color-main g-color-primary--hover g-font-weight-600 g-font-size-12 g-text-underline--none--hover text-uppercase" href="#!">Learn More</a>-->
                    </div>.
                </div>
                <!-- End Icon Blocks -->
                <div class="col-md-4 media g-mb-15">
                    <div class="media-body">
                        <h3 class="h5 g-color-white g-font-weight-600 mb-20">Events This Month</h3>
                        <p class="g-color-gray-dark-v4">
                        @if(isset($sorted['thisMonth']))
                            @if(count($sorted['thisMonth']) > 0)
                                <ul class="list-unstyled">
                                    @foreach($sorted['thisMonth'] as $item)
                                        @if($item->user_id)
                                            <li><b class="g-color-primary">{{ \App\User::findorfail($item->user_id)->username }}</b> - <a href="/view/event/{{ $item->id }}">{{ $item->title }}</a> </li>
                                        @else
                                            <li><b class="g-color-primary">{{ $item->organization->org_name }}</b> - {{ $item->title }} </li>
                                        @endif
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
                <h1 class="h2 g-color-white g-font-weight-600 mb-2">CitizenWarfare Discord Bot</h1>
                <div class="d-inline-block g-width-30 g-height-2 g-bg-primary mb-2"></div>
                <p class="lead mb-0">The Premier Star Citizen Event Notification Discord Bot</p>
            </div>
        </div>

        <div class="shortcode-html">
            <div class="row align-items-center">
                <div class="col-lg-5 text-center g-mb-40 g-mb-0--lg g-pr-60--lg">
                    <img class="g-mb-30" width="320" src="/assets/images/Bot_Preview.png" alt="Image Description">
                    <blockquote class="u-blockquote-v3 g-font-size-16 g-mb-20">Custom built Discord bot to make your life easier, no more cross posting in multiple discords to get your event traction.</blockquote>
                </div>

                <div class="col-lg-7">
                    <div class="row no-gutters align-items-center justify-content-center">
                        {{--<div class="col-md-6 g-mb-30 g-z-index-2">
                            <!-- Article -->
                            <article class="text-center g-brd-around g-color-gray g-brd-gray-light-v5 g-pa-10">
                                <div class="g-bg-gray-light-v5 g-px-15 g-py-50">
                                    <!-- Article Title -->
                                    <h4 class="text-uppercase g-color-gray-dark-v3 g-font-weight-500 g-mb-10">Yearly</h4>
                                    <!-- End Article Title -->
                                    <!--<em class="g-font-style-normal">Yearly</em>-->

                                    <hr class="g-brd-gray-light-v4 g-my-20">

                                    <div class="g-color-primary g-my-30">
                                        <strong class="d-block g-font-size-30 g-line-height-1_2">$21.00</strong> per Year <small>@ $1.75/Month</small>
                                    </div>

                                    <hr class="g-brd-gray-light-v4 g-mt-20 g-mb-10">

                                    <ul class="list-unstyled g-mb-25">
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">CitizenWarfare Bot Presence in Discord.</li>
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">
                                            Receive public and private event notifications in one or two channels
                                        </li>
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">
                                            Development takes time, Adopt early for benifits down the road!, There is always More to <b>Come</b>
                                        </li>
                                    </ul>
                                    <a href="/subscription/new" class="btn btn-primary">Learn More</a>
                                </div>
                            </article>
                            <!-- End Article -->
                        </div>--}}

                        <div class="col-md-6 g-mb-30">
                            <!-- Article -->
                            <article class="text-center g-brd-around g-color-gray g-brd-gray-light-v5 g-pa-10">
                                <div class="g-bg-gray-light-v5 g-pa-30">
                                    <!-- Article Title -->
                                    <h4 class="text-uppercase g-color-gray-dark-v3 g-font-weight-500 g-mb-10">Monthly</h4>
                                    <!-- End Article Title -->
                                    <!--<em class="g-font-style-normal">Ed feugiat porttitor nunc, non</em>-->

                                    <hr class="g-brd-gray-light-v4 g-my-10">

                                    <div class="g-color-primary g-my-20">
                                        <strong class="d-block g-font-size-30 g-line-height-1_2">$0.00</strong> per month
                                    </div>

                                    <hr class="g-brd-gray-light-v4 g-mt-10 mb-0">

                                    <ul class="list-unstyled g-mb-25">
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">CitizenWarfare Bot Presence in Discord.</li>
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">
                                            Receive public and private event notifications in one or two channels
                                        </li>
                                        <li class="g-brd-bottom g-brd-gray-light-v4 g-py-12">
                                            Development takes time, Adopt early for benifits down the road!, There is always More to <b>Come</b>
                                        </li>
                                    </ul>
                                    <a href="/subscription/new" class="btn btn-primary">Learn More</a>
                                </div>
                            </article>
                            <!-- End Article -->
                        </div>
                    </div>
                </div>
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
            @if(isset($data['feeddata']) && $data['feeddata'] != null)
            @foreach($data['feeddata'] as $post)
                <div class="col-sm-6 col-lg-4 g-mb-30">
                    <!-- Blog Grid Overlap Blocks -->
                    <article>
                        <img class="img-fluid
                         @if($post->rss_feed == 'RSI Comm-Link')
                         w-100 g-pb-10--md
                         @endif " src="{{ $post->rss_feedImage }}" alt="{{ $post->rss_feed }}">
                        <div class="g-width-80x g-bg-grey-dark-v1 g-pos-rel g-z-index-1 g-pa-30 g-mt-minus-5 mx-auto">
                            <span class="d-block g-color-white g-font-weight-600 g-font-size-12 text-uppercase mb-2">{{ \Carbon\Carbon::parse($post->rss_pubDate)->setTimezone(session()->get('timezone'))->format('D M d, Y H:i:s') }}</span>
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
            @endif
        </div>
    </section>


@endsection
