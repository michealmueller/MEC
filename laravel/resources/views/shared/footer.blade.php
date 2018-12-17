<!-- Footer -->
<footer>
    <div id="contacts-section" class="g-color-white-opacity-0_8 g-mt-150--md">
        <div class="container g-mt-10--md">
            <div class="row">

                <!-- Footer Content -->
                <div class="col-lg-3 g-mt-15--md">
                    <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                        <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Latest From Star Citizen</h2>
                    </div>

                    @foreach($data['feeddata'] as $rssItem)
                    <article>
                        <h3 class="h6 g-mb-2">
                            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="{{ $rssItem->rss_link }}" target="_blank">{{ $rssItem->rss_title }}</a>
                        </h3>
                        <div class="small g-color-white-opacity-0_6">{{ $rssItem->rss_pubDate }}</div>
                    </article>
                    @endforeach
                </div>
                <!-- End Footer Content -->

                <!-- Footer Content -->
                <div class="col-lg-3 g-mt-15--md">
                    <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20 ">
                        <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Useful Links</h2>
                    </div>
                    <nav class="text-uppercase1">
                        <ul class="list-unstyled g-mt-minus-10 mb-0">
                            @foreach($data['org_list'] as $org)
                                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                    <h4 class="h6 g-pr-20 mb-0">
                                        @if($org->org_logo != null)
                                            <img src="/storage/app/org_logos/{{ $org->org_logo }}" height="25" width="25">
                                        @endif
                                        <a target="_blank" class="g-color-white-opacity-0_8 g-color-white--hover" href="{{ $org->org_rsi_site }}">{{ $org->org_name }}</a>
                                        <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                    </h4>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <!-- End Footer Content -->

                <!-- Footer Content -->
                <div class="col-lg-3 g-mt-15--md">
                    <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20 ">
                        <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Our Contacts</h2>
                    </div>

                    <address class="g-bg-no-repeat g-font-size-12 g-mb-50 " style="height: 100%; background-image: url('/assets/maps/map2.png');">
                        <!-- Location -->
                        <div class="d-flex g-mb-20">
                            <div class="g-mr-10">

                            </div>
                            <p class="mb-0"><br></p>
                        </div>
                        <!-- End Location -->

                        <!-- Phone -->
                        <div class="d-flex g-mb-20">
                            <div class="g-mr-10">
                            </div>
                            <p class="mb-0"></p>
                        </div>
                        <!-- End Phone -->

                        <!-- Email and Website -->
                        <div class="d-flex g-mb-20 g-ml-50--sm">
                            <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                                <i class="fa fa-globe"></i>
                              </span>
                            </div>
                            <p class="mb-0">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="mailto:support@citizenwarfare.com">support@citizenwarfare.com</a>
                            </p>
                        </div>
                        <!-- End Email and Website -->
                    </address>
                </div>

                <!-- End Footer Content -->
                <div class="col-lg-3 g-mt-15--md">
                    <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                        <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Donate</h2>
                    </div>
                    <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                        <p>Like the site, help keep it running by donating below! anything helps!<br> GLHF!</p>
                    </div>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="27HVBM6ZKHE56">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Footer -->
    <div class="container g-py-25--md">
        <div class="row">
            <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
                <div class="d-lg-flex">
                    <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">Citizen Warfare 2018 © All Rights Reserved.</small>
                    <ul class="u-list-inline">
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="/privacy">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <span>|</span>
                        </li>
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="/terms">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">
                            <span>|</span>
                        </li>
                        <!--<li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">License</a>
                        </li>
                        <li class="list-inline-item">
                            <span>|</span>
                        </li>-->
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="mailto:support@citizenwarfare.com">Support</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 align-self-center">
                <ul class="list-inline text-center text-md-right mb-0">
                    <!--<li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Facebook">
                        <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>-->
                    <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Skype">
                        <a href="skype:micheal.mueller?chat" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-skype"></i>
                        </a>
                    </li>
                    <!--<li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Twitter">
                        <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</footer>