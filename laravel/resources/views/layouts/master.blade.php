<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Hotjar Tracking Code for https://events.citizenwarfare.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:983821,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-98254273-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-98254273-3');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mec - Multi Organization Event Calendar">
    <meta name="author" content="Micheal Mueller - MuellerTek">

    <title>Multi Organization Event Calendar</title>

    <link rel="shortcut icon" href="assets/favicon.ico">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="/vendor/animate.css">
    <link rel="stylesheet" href="/assets/css/tutorialOverlay.min.css">
    <link rel="stylesheet" href="/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="/vendor/hs-bg-video/hs-bg-video.css">
    <link rel="stylesheet" href="/vendor/slick-carousel/slick/slick.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/regular.css" integrity="sha384-zkhEzh7td0PG30vxQk1D9liRKeizzot4eqkJ8gB3/I+mZ1rjgQk+BSt2F6rT2c+I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/brands.css" integrity="sha384-nT8r1Kzllf71iZl81CdFzObMsaLOhqBU1JD2+XoAALbdtWaXDOlWOZTR4v1ktjPE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">

    <link rel="stylesheet" href="/vendor/plyr/dist/plyr.css">
    <link rel="stylesheet" href="/assets/css/calendar/fullcalendar.min.css"/>
    <link rel="stylesheet" href="/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap-notify/css/bootstrap-notify.min.css">

    <!-- CSS Unify -->
    <!--<link rel="stylesheet" href="/assets/css/unify-admin.css">-->
    <link rel="stylesheet" href="/assets/css/unify-core.css">
    <link rel="stylesheet" href="/assets/css/unify-components.css">
    <link rel="stylesheet" href="/assets/css/unify-globals.css">
    <link rel="stylesheet" href="/assets/css/select2.min.css"/>

    <!-- Custom CSS -->
    <link href="/assets/css/modern-business.min.css" rel="stylesheet">
    <link href="/assets/css/custom.min.css" rel="stylesheet">
    <link href="/assets/css/horizontalSly.min.css" rel="stylesheet">

    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/moment.js"></script>
    <script src="/assets/js/fullcalendar.js"></script>

    <script src="/vendor/bootstrap-notify/js/bootstrap-notify.min.js"></script>
    <script src="/assets/js/select2.min.js"></script>
    <script src="/assets/js/jstz.min.js"></script>
    <script src="/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
    <script language="javascript">
        $(document).on('ready', function(){
            var timezone = jstz.determine();
            var name=timezone.name();
            $('#systemtz').html(name);
        });

    </script>
</head>
<body>
    <main>

        @include('shared.nav')
        @include('notification')
        @include('shared.header')
        @yield('content')

        @include('shared.footer')
    </main>
    <script>
        $('#select2').select2();
        $('.select2').select2();
    </script>
    <!-- JS Implementing Plugins -->
    <script src="/vendor/appear.js"></script>
    <script src="/vendor/slick-carousel/slick/slick.js"></script>
    <script src="/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="/vendor/dzsparallaxer/dzsparallaxer.js"></script>
    <script src="/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
    <script src="/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
    <script src="/vendor/hs-bg-video/hs-bg-video.js"></script>
    <script src="/vendor/hs-bg-video/vendor/player.min.js"></script>
    <script src="/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>

    <!-- JS Unify -->
    <script src="/assets/js/hs.core.js"></script>
    <script src="/assets/js/components/hs.carousel.js"></script>
    <script src="/assets/js/components/hs.header.js"></script>
    <script src="/assets/js/helpers/hs.hamburgers.js"></script>
    <script src="/assets/js/components/hs.tabs.js"></script>
    <script src="/assets/js/components/hs.popup.js"></script>
    <script src="/assets/js/components/hs.counter.js"></script>
    <script src="/assets/js/components/hs.cubeportfolio.js"></script>
    <script src="/assets/js/helpers/hs.bg-video.js"></script>
    <script src="/assets/js/components/hs.go-to.js"></script>
    <script src="/assets/js/components/hs.onscroll-animation.js"></script>
    <script src="/assets/js/components/hs.video-audio.js"></script>
    <script src="/assets/js/components/hs.dropdown.min.js"></script>
    <script  src="/assets/vendor/jquery.countdown.min.js"></script>
    <script  src="assets/js/components/hs.countdown.js"></script>
    <script src="/vendor/plyr/dist/plyr.js"></script>
    <script src="/vendor/masonry/dist/masonry.pkgd.min.js"></script>
    <script src="/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/js/sly.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src="/assets/js/typeahead_bundle.js"></script>

    <!-- JS Customization -->
    <script src="/assets/js/custom.js"></script>

    <script>
        var sly = new Sly(('.frame'), {
            horizontal: true,
            itemNav: 'forceCentered',
            cycleBy:'items',
            cycleInterval: 1000,

        });
        sly.init();
    </script>
    <!-- JS Plugins Init. -->
    <script>

        $(document).on('ready', function () {
            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});

            // initialization of hamburger
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of range datepicker
            //$.HSCore.components.HSRangeDatepicker.init('#rangeDatepicker, #rangeDatepicker2, #rangeDatepicker3');

            // initialization of datepicker
            /*$.HSCore.components.HSDatepicker.init('#datepicker', {
                dayNamesMin: [
                    'SU',
                    'MO',
                    'TU',
                    'WE',
                    'TH',
                    'FR',
                    'SA'
                ]
            });*/

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox', {
                btnTpl: {
                    smallBtn: '<button data-fancybox-close class="btn g-pos-abs g-top-25 g-right-30 g-line-height-1 g-bg-transparent g-font-size-16 g-color-gray-light-v3 g-brd-none p-0" title=""><i class="hs-admin-close"></i></button>'
                }
            });

            // initialization of popups with media
            $.HSCore.components.HSPopup.init('.js-fancybox-media', {
                helpers: {
                    media: {},
                    overlay: {
                        css: {
                            'background': 'rgba(0, 0, 0, .8)'
                        }
                    }
                }
            });
            // initialization of carousel
            $.HSCore.components.HSCarousel.init('.js-carousel');

            // initialization of tabs
            $.HSCore.components.HSTabs.init('[role="tablist"]');

            // initialization of scroll animation
            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

            // initialization of video on background
            $.HSCore.helpers.HSBgVideo.init('.js-bg-video');

            // initialization of popups with media
            $.HSCore.components.HSPopup.init('.js-fancybox-media', {
                helpers: {
                    media: {},
                    overlay: {
                        css: {
                            'background': 'rgba(0, 0, 0, .8)'
                        }
                    }
                }
            });

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });

        $(document).on('ready', function () {
            // initialization of countdowns
            var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                yearsElSelector: '.js-cd-years',
                monthElSelector: '.js-cd-month',
                daysElSelector: '.js-cd-days',
                hoursElSelector: '.js-cd-hours',
                minutesElSelector: '.js-cd-minutes',
                secondsElSelector: '.js-cd-seconds'
            });
        });


    </script>

    <script >
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#avatarUp").change(function() {
            readURL(this);
        });
    </script>
    <script >
        $("#org_logo_select").change(function() {
            console.log($('#org_logo_select option:checked').val());
            $('#org_logo')
                .attr('src', $('#org_logo_select option:checked').val())
                .css('display', 'block');
        });
    </script>

    <script>
        //redirect to specific tab
        $(document).ready(function () {
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
        });
    </script>

    <script>
        $(document).ready(function($) {
            var engine = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'find?q=%QUERY%',
                    wildcard: '%QUERY%'
                }
            });

            $('.search-input').typeahead({
                hint: true,
                highlight: true,
                minLength: 1,
            },{
                name: 'organization',
                source: engine.ttAdapter(),
                dynamic: true,
                display: function(data) {
                    return data.org_name //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        console.log(data);
                        return '<div class="g-bg-black"><image src="/storage/app/org_logos/' + data.org_logo + '" height="30" />'
                            + data.org_name + '<hr style="background-color:#ffffff;"></div>'
                    }
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btnRight').click(function(e) {
                var selectedOpts = $('#lstBox1 option:selected');
                console.log(selectedOpts);
                if (selectedOpts.length == 0) {
                    alert("Nothing to move.");
                    e.preventDefault();
                }

                $('#lstBox2').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                e.preventDefault();


            });

            $('#btnLeft').click(function(e) {
                var selectedOpts = $('#lstBox2 option:selected');
                if (selectedOpts.length == 0) {
                    alert("Nothing to move.");
                    e.preventDefault();
                }

                $('#lstBox1').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                e.preventDefault();
            });
        });
    </script>
    <script type="text/javascript">
        function selectAll()
        {
            $('#sharing option').prop('selected', true)
        }

    </script>


@if(\Route::current()->getName() == 'calendar')
    {!! $calendar->script() !!}
@endif
    <!-- Chatter JS -->
@yield('js')

    <!-- Demo modal window -->
    <div id="modal6" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <i class="hs-icon hs-icon-close"></i>
        </button>
        <h4 class="g-mb-20">Modal title</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
            specimen book.</p>
        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
            recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    <!-- End Demo modal window -->
</body>
</html>