<header id="js-header" class="u-header u-header--show-hide u-header--change-appearance u-header--untransitioned" data-header-fix-moment="100" data-header-fix-effect="slide">
    <div class="u-header__section u-header__section--dark g-transition-0_3 g-py-5 g-bg-black-opacity-0_7" data-header-fix-moment-exclude="g-bg-black-opacity-0_7" data-header-fix-moment-classes="g-bg-black">
        <nav class="navbar navbar-expand-lg no-gutters g-pa-0">
            <div class="container">
                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-10 g-right-0"
                        type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </span>
                </button>
                <!-- End Responsive Toggle Button -->
                <!-- Logo -->
                @if(Route::current()->getName() != 'home')
                    <a class="navbar-brand text-uppercase" href="/"><img height="50" src="/storage/app/logos/Citizen_Warfare_Profile_Pic_White.png"></a>
                @endif
                <!-- End Logo -->

                @if(Auth::check())
                    <div class="collapse navbar-collapse two" id="navBar">

                        <div class="navbar-nav text-uppercase g-font-weight-600 ml-auto">
                            <div class="g-pos-rel g-px-10--lg">
                                <a id="profileMenuInvoker" class="d-block" href="" data-dropdown-event="click" data-dropdown-target="#profileMenu"
                                   data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn"
                                   data-dropdown-animation-out="fadeOut">

                                    @if(Auth::check())
                                        <span class="g-pos-rel" >
                                    <span class="g-bg-lightblue-v5 g-mr-5"></span>
                                    <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle g-mr-10--sm"
                                         @if($user->organization_id != null)
                                         src="/storage/app/org_logos/{{ $user->organization->org_logo}}"
                                         @else
                                         src="/storage/app/avatars/{{ $user->avatar}}"
                                         @endif
                                    >
                                </span>

                                        <span class="g-pos-rel g-top-2">
                                    <span class="">@if(isset($user->username)){{ $user->username }}@else{{ $user->organization->org_name }}@endif</span>
                                    <i class="hs-admin-angle-down g-pos-rel g-top-2 g-ml-10"></i>
                                </span>
                                    @endif
                                </a>

                                <!-- Top User Menu -->
                                <ul id="profileMenu" class="g-pos-abs g-left-20 g-width-100x--md g-nowrap g-font-size-12 g-py-20
                            g-mt-17 rounded u-dropdown--css-animation u-dropdown--hidden" aria-labelledby="profileMenuInvoker"
                                    style="animation-duration: 300ms; left: 0px;background-color: #000000">
                                    @if($user->organization)
                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/{{$user->organization->org_name}}/calendar">
                                        <span class="d-flex align-self-center g-mr-12">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                            <span class="media-body align-self-center">View Calendar</span>
                                        </a>
                                    </li>
                                        <li class="g-mb-10">
                                            <a class="media g-color-orange--hover g-py-5 g-px-20" href="/profile/organization/{{$user->organization->id}}">
                                        <span class="d-flex align-self-center g-mr-12">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                                <span class="media-body align-self-center">Organization Profile</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="g-mb-10">
                                            <a class="media g-color-orange--hover g-py-5 g-px-20" href="/{{$user->id}}/calendar">
                                        <span class="d-flex align-self-center g-mr-12">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                                <span class="media-body align-self-center">My Calendar</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/profile">
                                        <span class="d-flex align-self-center g-mr-12">
                                            <i class="fa fa-user"></i>
                                        </span>
                                            <span class="media-body align-self-center">My Profile</span>
                                        </a>
                                    </li>
                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/create-event">
                                            <span class="d-flex align-self-center g-mr-12">
                                                <i class="fa fa-users"></i>
                                            </span>
                                            <span class="media-body align-self-center">Create an Event</span>
                                        </a>
                                    </li>
                                    @if(!$user->organization)
                                        <li class="g-mb-10">
                                            <a class="media g-color-orange--hover g-py-5 g-px-20" href="/profile/create/organization">
                                            <span class="d-flex align-self-center g-mr-12">
                                                <i class="fa fa-building"></i>
                                            </span>
                                                <span class="media-body align-self-center">Create an Organization</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="/faq">
                                            <span class="d-flex align-self-center g-mr-12">
                                                <i class="fa fa-user-secret"></i>
                                            </span>
                                            <span class="media-body align-self-center">F.A.Q</span>
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
                                    <!--
                                    <li class="g-mb-10">
                                        <a class="media g-color-orange--hover g-py-5 g-px-20" href="javascript:void(0);" onclick="startTour()">
                                                    <span class="d-flex align-self-center g-mr-12">
                                                        <i class="fa fa-plane"></i>
                                                    </span>
                                            <span class="media-body align-self-center" >Take the Tour</span>
                                        </a>
                                    </li>-->
                                </ul>
                                <!-- End Top User Menu -->
                            </div>
                        </div>
                    </div>
                @else
                    <div class="collapse navbar-collapse" id="navBar" >
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

