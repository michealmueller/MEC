<?php
/**
 * Created by PhpStorm.
 * User: arthm
 * Date: 8/17/2018
 * Time: 2:14 PM
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Dashboard v.1 | Unify - Responsive Website Template</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/regular.css" integrity="sha384-zkhEzh7td0PG30vxQk1D9liRKeizzot4eqkJ8gB3/I+mZ1rjgQk+BSt2F6rT2c+I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/brands.css" integrity="sha384-nT8r1Kzllf71iZl81CdFzObMsaLOhqBU1JD2+XoAALbdtWaXDOlWOZTR4v1ktjPE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/vendor/hs-admin-icons/hs-admin-icons.css">

    <link rel="stylesheet" href="/assets/vendor/animate.css">
    <link rel="stylesheet" href="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="/assets/vendor/flatpickr/dist/css/flatpickr.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="/assets/vendor/chartist-js/chartist.min.css">
    <link rel="stylesheet" href="/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/assets/vendor/fancybox/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/assets/vendor/hamburgers/hamburgers.min.css">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="/assets/css/unify-admin.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>

<body>
<main>
    <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
        <div class="g-pa-20">
            <div class="row">
                <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</main>

<!-- JS Global Compulsory -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>

<script src="/assets/vendor/popper.min.js"></script>
<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

<script src="/assets/vendor/cookiejs/jquery.cookie.js"></script>


<!-- jQuery UI Core -->
<script src="/assets/vendor/jquery-ui/ui/widget.js"></script>
<script src="/assets/vendor/jquery-ui/ui/version.js"></script>
<script src="/assets/vendor/jquery-ui/ui/keycode.js"></script>
<script src="/assets/vendor/jquery-ui/ui/position.js"></script>
<script src="/assets/vendor/jquery-ui/ui/unique-id.js"></script>
<script src="/assets/vendor/jquery-ui/ui/safe-active-element.js"></script>

<!-- jQuery UI Helpers -->
<script src="/assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
<script src="/assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>

<!-- jQuery UI Widgets -->
<script src="/assets/vendor/jquery-ui/ui/widgets/datepicker.js"></script>

<!-- JS Plugins Init. -->
<script src="/assets/vendor/appear.js"></script>
<script src="/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="/assets/vendor/flatpickr/dist/js/flatpickr.min.js"></script>
<script src="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/assets/vendor/chartist-js/chartist.min.js"></script>
<script src="/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.js"></script>
<script src="/assets/vendor/fancybox/jquery.fancybox.min.js"></script>

<!-- JS Unify -->
<script src="/assets/js/hs.core.js"></script>
<script src="/assets/js/components/hs.side-nav.js"></script>
<script src="/assets/js/helpers/hs.hamburgers.js"></script>
<script src="/assets/js/components/hs.range-datepicker.js"></script>
<script src="/assets/js/components/hs.datepicker.js"></script>
<script src="/assets/js/components/hs.dropdown.js"></script>
<script src="/assets/js/components/hs.scrollbar.js"></script>
<script src="/assets/js/components/hs.area-chart.js"></script>
<script src="/assets/js/components/hs.donut-chart.js"></script>
<script src="/assets/js/components/hs.bar-chart.js"></script>
<script src="/assets/js/helpers/hs.focus-state.js"></script>
<script src="/assets/js/components/hs.popup.js"></script>

<!-- JS Custom -->
<script src="/assets/js/custom.js"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // initialization of custom select
        $('.js-select').selectpicker();

        // initialization of hamburger
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of charts
        $.HSCore.components.HSAreaChart.init('.js-area-chart');
        $.HSCore.components.HSDonutChart.init('.js-donut-chart');
        $.HSCore.components.HSBarChart.init('.js-bar-chart');

        // initialization of sidebar navigation component
        $.HSCore.components.HSSideNav.init('.js-side-nav', {
            afterOpen: function() {
                setTimeout(function() {
                    $.HSCore.components.HSAreaChart.init('.js-area-chart');
                    $.HSCore.components.HSDonutChart.init('.js-donut-chart');
                    $.HSCore.components.HSBarChart.init('.js-bar-chart');
                }, 400);
            },
            afterClose: function() {
                setTimeout(function() {
                    $.HSCore.components.HSAreaChart.init('.js-area-chart');
                    $.HSCore.components.HSDonutChart.init('.js-donut-chart');
                    $.HSCore.components.HSBarChart.init('.js-bar-chart');
                }, 400);
            }
        });

        // initialization of range datepicker
        $.HSCore.components.HSRangeDatepicker.init('#rangeDatepicker, #rangeDatepicker2, #rangeDatepicker3');

        // initialization of datepicker
        $.HSCore.components.HSDatepicker.init('#datepicker', {
            dayNamesMin: [
                'SU',
                'MO',
                'TU',
                'WE',
                'TH',
                'FR',
                'SA'
            ]
        });

        // initialization of HSDropdown component
        $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});

        // initialization of custom scrollbar
        $.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));

        // initialization of popups
        $.HSCore.components.HSPopup.init('.js-fancybox', {
            btnTpl: {
                smallBtn: '<button data-fancybox-close class="btn g-pos-abs g-top-25 g-right-30 g-line-height-1 g-bg-transparent g-font-size-16 g-color-gray-light-v3 g-brd-none p-0" title=""><i class="hs-admin-close"></i></button>'
            }
        });
    });
</script>
</body>

</html>