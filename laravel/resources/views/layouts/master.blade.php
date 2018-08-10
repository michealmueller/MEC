<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mec - Multi Organization Event Calendar">
    <meta name="author" content="Micheal Mueller - MuellerTek">

    <title>Multi Organization Event Calendar</title>

    <link rel="shortcut icon" href="assets/favicon.ico">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="/vendor/icon-etlinefont/style.css">
    <link rel="stylesheet" href="/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="/vendor/icon-hs/style.css">
    <link rel="stylesheet" href="/vendor/animate.css">
    <link rel="stylesheet" href="/vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="/vendor/dzsparallaxer/dzsscroller/scroller.css">
    <link rel="stylesheet" href="/vendor/dzsparallaxer/advancedscroller/plugin.css">
    <link rel="stylesheet" href="/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/vendor/cubeportfolio-full/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="/vendor/hs-bg-video/hs-bg-video.css">
    <link rel="stylesheet" href="/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/vendor/plyr/dist/plyr.css">
    <link rel="stylesheet" href="/assets/css/calendar/fullcalendar.min.css"/>
    <link rel="stylesheet" href="/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap-notify/css/bootstrap-notify.min.css">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="/assets/css/unify-admin.css">
    <link rel="stylesheet" href="/assets/css/unify-core.css">
    <link rel="stylesheet" href="/assets/css/unify-components.css">
    <link rel="stylesheet" href="/assets/css/unify-globals.css">

    <!-- Custom CSS -->
    <link href="/assets/css/modern-business.min.css" rel="stylesheet">
    <link href="/assets/css/custom.min.css" rel="stylesheet">


    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="/assets/js/fullcalendar.js"></script>

    <script src="/vendor/bootstrap-notify/js/bootstrap-notify.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init(
        {
            selector:'textarea',
            inline: true,
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
    <script src="/vendor/plyr/dist/plyr.js"></script>
    <script src="/vendor/masonry/dist/masonry.pkgd.min.js"></script>
    <script src="/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- JS Customization -->
    <script src="/assets/js/custom.js"></script>

    <!-- JS Plugins Init. -->
    <script>

        $(document).on('ready', function () {
            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});

            // initialization of custom select
            $('.js-select').select2();

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
                console.log(this);
                console.log(input.files);
                console.log(input.files[0]);


            }
        }
        $("#avatarUp").change(function() {
            readURL(this);
        });
    </script>

    <script>
        //redirect to specific tab
        $(document).ready(function () {
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
        });
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