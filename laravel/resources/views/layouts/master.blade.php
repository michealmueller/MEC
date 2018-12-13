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
    <meta name="description" content="The premier event site for Star Citizen, We are trting to bring players and
    organizations together to create Co-operation and fun!">
    <meta name="author" content="Micheal Mueller - MuellerTek">

    @if(\Route::current()->getName() == 'calendar')
        <meta name="robots" content="noindex, nofollow" />
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Multi Organization Event Calendar</title>

    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="manifest" href="/manifest.json">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="/vendor/animate.css">
    <link rel="stylesheet" href="/vendor/hamburgers/hamburgers.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/regular.css" integrity="sha384-zkhEzh7td0PG30vxQk1D9liRKeizzot4eqkJ8gB3/I+mZ1rjgQk+BSt2F6rT2c+I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/brands.css" integrity="sha384-nT8r1Kzllf71iZl81CdFzObMsaLOhqBU1JD2+XoAALbdtWaXDOlWOZTR4v1ktjPE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/calendar/fullcalendar.min.css"/>
    <link rel="stylesheet" href="/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap-notify/css/bootstrap-notify.min.css">

    <!-- CSS Unify -->
    <!--<link rel="stylesheet" href="/assets/css/unify-admin.css">-->
    <link rel="stylesheet" href="/assets/css/unify-core.min.css">
    <link rel="stylesheet" href="/assets/css/unify-components.css">
    <link rel="stylesheet" href="/assets/css/unify-globals.css">
    <link rel="stylesheet" href="/assets/css/select2.min.css"/>

    <!-- Custom CSS -->
    <link href="/assets/css/modern-business.min.css" rel="stylesheet">
    <link href="/assets/css/custom.min.css" rel="stylesheet">

    <script src="/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/moment.js"></script>
    <script src="/assets/js/fullcalendar.js"></script>

    <script src="/vendor/bootstrap-notify/js/bootstrap-notify.min.js"></script>
    <script src="/assets/js/select2.min.js"></script>
    <script src="/assets/js/jstz.min.js"></script>
    <script language="javascript">
        $(document).on('ready', function(){
            var timezone = jstz.determine();
            var name=timezone.name();
            console.log(name);
            console.log(timezone);
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
        <!--(count($data['pubEvents']) > 0)
            <div class="fixed-bottom g-bg-black-opacity-0_8 ">
                <marquee >
                    foreach($data['pubEvents'] as $events)
                        <span class=" g-color-orange">
                        { $events->organization->org_name }}:
                    </span>
                        Event Date-{  \Carbon\Carbon::parse($events->start_date)->setTimezone($data['timezonedata']->time_zone->name)->format('m-d-Y g:ia') }}
                        if($events->brief_url != null )

                            <small > -- <a target="_blank" href="{$events->brief_url}}">View Mission Brief</a></small>
                        endif
                        if($events->comments != null)
                            <small> -- !! nl2br($events->comments) !!}</small>
                        endif
                        if(count($data['pubEvents']) > 1)
                            <small>----</small>
                        endif
                    endforeach
                </marquee>
            </div>
        endif-->
    </main>

    <script>
        $('#select2').select2();
        $('.select2').select2();
    </script>
    <!-- JS Implementing Plugins -->
    <script src="/vendor/appear.js"></script>
    <script src="/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>

    <!-- JS Unify -->
    <script src="/assets/js/hs.core.js"></script>
    <script src="/assets/js/components/hs.header.js"></script>
    <script src="/assets/js/helpers/hs.hamburgers.js"></script>
    <script src="/assets/js/components/hs.tabs.js"></script>
    <script src="/assets/js/components/hs.counter.js"></script>
    <script src="/assets/js/components/hs.dropdown.min.js"></script>
    <script  src="/assets/vendor/jquery.countdown.min.js"></script>
    <script  src="assets/js/components/hs.countdown.js"></script>
    <script src="/vendor/plyr/dist/plyr.js"></script>
    <script src="/vendor/masonry/dist/masonry.pkgd.min.js"></script>
    <script src="/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <!-- JS Customization -->
    <script src="/assets/js/custom.js"></script>
    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});

            // initialization of hamburger
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of tabs
            $.HSCore.components.HSTabs.init('[role="tablist"]');

            // initialization of scroll animation
            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

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
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show');
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

            ajaxRequest('/update/share', 0, 'share', share)
        }

    </script>

    <script>
        function ajaxRequest(url, element=0, type, data=0)
        {
            if (element != 0) {
                $('#' + element).html('Generating!');
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST', // Type of response and matches what we said in the route
                url: url, // This is the url we gave in the route
                data: {'id' : data}, // a JSON object to send back
                success: function(response) { // What to do if we succeed
                    $('#' + response.selector).html(response.replaceText);
                    if (type == 'ref'){
                        $('#' + response.selector + '2').html(response.replaceText);
                    }
                    $.notify({
                        message: response.notificationMsg,
                        type:response.notificationType+'-solid-active'
                    },{
                        delay:'10000'
                    });

                },
                error: function(response) { // What to do if we fail
                    alert(response.errorMsg+' '+response);
                }
            });
        }
    </script>

    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('e71e490b8c32f047fecd', {
            cluster: 'us2',
            forceTLS: true
        });

        var channel = pusher.subscribe('subs');
        channel.bind('New Event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>

@if(\Route::current()->getName() == 'calendar')
    {!! $calendar->script() !!}
@endif
</body>
</html>