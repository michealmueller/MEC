<?php
/*if ($_SERVER['HTTP_X_FORWARDED_FOR'])
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
else
    $ip   = $_SERVER['REMOTE_ADDR'];

$two_letter_country_code=iptocountry($ip);

function iptocountry($ip)
{
    $numbers = preg_split( "/./", $ip);

    include("/ip_files/".$numbers[0].".php");
    $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);

    foreach($ranges as $key => $value)
    {
        if($key<=$code)
        {
            if($ranges[$key][0]>=$code)
            {
                $country=$ranges[$key][1];break;
            }
        }
    }

    if ($country=="")
    {
        $country="unknown";
    }

    return $country;
}

if ($two_letter_country_code == "US")
    die();*/
?>
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
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-5239741921578341",
            enable_page_level_ads: true
        });
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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

    <title>CitizenWarfare - Multi Organization Event Calendar</title>

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
    <link rel="stylesheet" href="/assets/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap-notify/css/bootstrap-notify.min.css">
    <link rel="stylesheet" href="/assets/vendor/animate.css">
    <link rel="stylesheet" href="/assets/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="/assets/vendor/icon-etlinefont/style.css">
    <link rel="stylesheet" href="/assets/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="/assets/vendor/icon-hs/style.css">
    <!-- CSS Unify -->
    <!--<link rel="stylesheet" href="/assets/css/unify-admin.css">-->
    <link rel="stylesheet" href="/assets/css/unify-core.min.css">
    <link rel="stylesheet" href="/assets/css/unify-components.css">
    <link rel="stylesheet" href="/assets/css/unify-globals.css">
    <link rel="stylesheet" href="/assets/css/select2.min.css"/>
    <link rel="stylesheet" href="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">

    <!-- Custom CSS -->
    <link href="/assets/css/modern-business.min.css" rel="stylesheet">
    <link href="/assets/css/custom.min.css" rel="stylesheet">

    <script src="/assets/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <script src="/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/moment.js"></script>
    <script src="/assets/js/fullcalendar.js"></script>

    <script src="/assets/vendor/bootstrap-notify/js/bootstrap-notify.min.js"></script>

    <script src="/assets/js/jstz.min.js"></script>
    <script language="javascript">
        $(document).on('ready', function(){
            var timezone = jstz.determine();
            var name=timezone.name();
            /*console.log(name);
            console.log(timezone);*/
            $('#systemtz').html(name);
        });

    </script>
    <script>
        $(document).ready(function() {
            var text_max = 800;
            $('#textarea_feedback').html(text_max + ' characters remaining');

            $('#content').keyup(function() {
                var text_length = $('#content').val().length;
                var text_remaining = text_max - text_length;

                $('#textarea_feedback').html(text_remaining + ' characters remaining');
            });
        });
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
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
    <!-- JS Implementing Plugins -->
    <script src="/assets/vendor/appear.js"></script>
    <script src="/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="/assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
    <script src="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- JS Unify -->
    <script src="/assets/js/hs.core.min.js"></script>
    <script src="/assets/js/components/hs.header.min.js"></script>
    <script src="/assets/js/helpers/hs.hamburgers.min.js"></script>
    <script src="/assets/js/components/hs.tabs.min.js"></script>
    <script src="/assets/js/components/hs.dropdown.min.js"></script>
    <script src="/assets/js/components/hs.scrollbar.min.js"></script>

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

            // initialization of HSScrollBar component
            $.HSCore.components.HSScrollBar.init( $('.js-scrollbar') );
        });

        $(window).on('resize', function () {
            setTimeout(function () {
                $.HSCore.components.HSTabs.init('[role="tablist"]');
            }, 200);
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
            //console.log($('#org_logo_select option:checked').val());
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
                //console.log(selectedOpts);
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
        function ajaxRequest(url, element='', type, status='', inputData='')
        {
            /*console.log(status);
            console.log(inputData);*/
            let myData ='';
            switch(type){
                case 'ref':
                    $('#' + element).html('Generating!');
                    myData = {
                        _token:"{{ csrf_token() }}"
                    };
                    break;
                case 'save':
                     myData = {
                         _token:"{{ csrf_token() }}",
                         id: inputData};
                    break;
                case 'attendance':
                    $('#'+element).html('<small>Updating</small>');
                     myData = {
                         _token:"{{ csrf_token() }}",
                         user_id:inputData.user_id,
                         event_id:inputData.event_id,
                         status:status,
                         url:url,
                     };
                     break;
                case 'request':
                    $(`#answer`).val('Sending Notificiations');
                    myData = {
                        _token:"{{ csrf_token() }}",
                        user_id:inputData.user_id,
                        org_id:inputData.org_id,
                    };
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST', // Type of response and matches what we said in the route
                url: url, // This is the url we gave in the route
                data: myData, // a JSON object to send back

            success: function(response) { // What to do if we succeed
                console.log(response);
                    $(`#${response.selector}`).html(`${response.replaceText}`);
                    switch (type) {
                        case 'ref':
                            $(`#${response.selector}2`).html(`${response.replaceText2}`);
                            break;
                        case 'attendance':
                            console.log(response.selector2);
                            $(`#${response.selector2}`).html(response.replaceText2);
                            getAttendance(myData.event_id);
                            break;
                        case 'save':
                            $(`#${response.selector}`).html(response.replaceText);
                            break;
                        case 'request':
                            $(`#${response.selector}`).html(response.replaceText);
                    }
                    $.notify({
                        message: response.notificationMsg,
                        type:response.notificationType+'-solid-active'
                    },{
                        delay:'10000'
                    });
                },
                error: function (jqXHR, exception) {
                    console.log(response);
                    let msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    alert(`${msg}`);
                }
            });
        }
    </script>
<script>
    function getAttendance(event_id){
        $.get(`/event/get/attendance/${event_id}`, function(response){
            $('#divStatus').html('');
            $('#attend').html(`${response}`);
            });

    }
</script>

<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        $.notify({
            message: 'Link Copied to Clipboard!',
            type:'success-solid-active'
        },{
            delay:'1000'
        });
    }

</script>

    @if(\Route::current()->getName() == 'calendar' || \Route::current()->getName() == 'userCalendar')
    {!! $calendar->script() !!}
@endif
</body>
</html>