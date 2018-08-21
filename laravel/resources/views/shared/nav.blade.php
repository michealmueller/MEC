<header id="js-header" class="u-header u-header--abs-top u-header--show-hide u-header--change-appearance u-header--untransitioned" data-header-fix-moment="100" data-header-fix-effect="slide">
    <div class="u-header__section u-header__section--dark g-transition-0_3 g-py-5 g-bg-black-opacity-0_7" data-header-fix-moment-exclude="g-bg-black-opacity-0_7" data-header-fix-moment-classes="g-bg-black">
        <nav class="navbar navbar-expand-lg no-gutters g-pa-0">
            <div class="container">
                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0"
                        type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </span>
                </button>
                <!-- End Responsive Toggle Button -->
                <!-- Logo -->
                <a class="navbar-brand text-uppercase" href="/">M<span class="g-color-primary">EC</span></a>
                <!-- End Logo -->

                <!-- Navigation --
                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--sm" id="navBar">
                    <ul class="navbar-nav text-uppercase g-font-weight-600 mx-auto">
                        <li class="nav-item g-mx-25--lg">
                            <a href="#!" class="nav-link px-0">Home

                            </a>
                        </li>
                        <li class="nav-item g-mx-25--lg">
                            <a href="#!" class="nav-link px-0">Features

                            </a>
                        </li>
                        <li class="nav-item g-mx-25--lg active">
                            <a href="#!" class="nav-link px-0">Shortcodes
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item g-mx-25--lg">
                            <a href="#!" class="nav-link px-0">Pages

                            </a>
                        </li>
                        <li class="nav-item g-mx-25--lg">
                            <a href="#!" class="nav-link px-0">Demos

                            </a>
                        </li>
                        <li class="nav-item g-mx-25--lg g-mr-0--lg">
                            <a href="#!" class="nav-link px-0">What's New

                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Navigation -->

                @if(Auth::check())
                    <div class="collapse navbar-collapse" id="navBar">

                        <div class="navbar-nav text-uppercase g-font-weight-600 ml-auto">
                            <div class="g-pos-rel g-px-10--lg">
                                <a id="profileMenuInvoker" class="d-block" href="" data-dropdown-event="click" data-dropdown-target="#profileMenu"
                                   data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn"
                                   data-dropdown-animation-out="fadeOut">

                                    @if(Auth::check())
                                        <span class="g-pos-rel">
                                    <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-lightblue-v5 g-mr-5"></span>
                                    <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle g-mr-10--sm"
                                         @if($user->avatar)
                                         src="/storage/app/org_logos/{{ $user->organization->org_logo }}"
                                         @else
                                         src="/assets/img-temp/100x100/img3.jpg"
                                         @endif
                                    >
                                </span>

                                        <span class="g-pos-rel g-top-2">
                                    <span class="g-hidden-sm-down">@if(isset($user->username)){{ $user->username }}@else{{ $user->organization->org_name }}@endif</span>
                                    <i class="hs-admin-angle-down g-pos-rel g-top-2 g-ml-10"></i>
                                </span>
                                    @endif
                                </a>

                                <!-- Top User Menu -->
                                <ul id="profileMenu" class="g-pos-abs g-left-20 g-width-100x--md g-nowrap g-font-size-12 g-py-20
                            g-mt-17 rounded u-dropdown--css-animation u-dropdown--hidden" aria-labelledby="profileMenuInvoker"
                                    style="animation-duration: 300ms; left: 0px;background-color: #000000">

                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/{{$user->organization->org_name}}/calendar">
                                        <span class="d-flex align-self-center g-mr-12">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                            <span class="media-body align-self-center">View Calendar</span>
                                        </a>
                                    </li>

                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/profile">
                                        <span class="d-flex align-self-center g-mr-12">
                                            <i class="fa fa-user"></i>
                                        </span>
                                            <span class="media-body align-self-center">My Profile</span>
                                        </a>
                                    </li>
                                    <!--<li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/upgrade">
                                        <span class="d-flex align-self-center g-mr-12">
                                            <i class="hs-admin-rocket"></i>
                                        </span>
                                            <span class="media-body align-self-center">Upgrade Plan</span>
                                        </a>
                                    </li>-->
                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/create-event">
                                            <span class="d-flex align-self-center g-mr-12">
                                                <i class="fa fa-users"></i>
                                            </span>
                                            <span class="media-body align-self-center">Create an Event</span>
                                        </a>
                                    </li>

                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/about-dev">
                                            <span class="d-flex align-self-center g-mr-12">
                                                <i class="fa fa-user-secret"></i>
                                            </span>
                                            <span class="media-body align-self-center">About the Developer</span>
                                        </a>
                                    </li>

                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="{{ route('logout') }}">
                                                    <span class="d-flex align-self-center g-mr-12">
                                                        <i class="fa fa-sign-out"></i>
                                                    </span>
                                            <span class="media-body align-self-center">Sign Out</span>
                                        </a>
                                    </li>

                                </ul>
                                <!-- End Top User Menu -->
                            </div>
                        </div>
                    </div>
                @else
                    <div class="collapse navbar-collapse" id="navBar">
                        <ul class="navbar-nav text-uppercase g-font-weight-600 mx-auto g-width-100x--md">
                            <li class="nav-item g-mx-25--lg">

                                <a class="nav-link media g-color-orange--hover g-py-5 g-px-20" href="{{ route('login') }}">
                                                    <span class="d-flex align-self-center g-mr-12">
                                                        <i class="hs-admin-shift-right"></i>
                                                    </span>
                                    <span class="media-body align-self-center">Login <span class="g-font-color-blue-SC fa fa-chevron-right"></span></span>
                                </a>
                            </li>
                            <li class="nav-item g-mx-25--lg">
                                <a class="nav-link media g-color-orange--hover g-py-5 g-px-20" href="{{ route('register') }}">
                                                <span class="d-flex align-self-center g-mr-12">

                                                </span>
                                    <span class="media-body align-self-center">Register <span class="g-font-color-blue-SC fa fa-chevron-right"></span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
            @endif
            <!-- End Search -->
            </div>
        </nav>
    </div>
</header>

