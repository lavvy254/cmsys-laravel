<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- TODO: create an img variable to be passed to the css --}}
    @php
        $bgImage = asset('images/img1.jpeg');
    @endphp
    <link rel="stylesheet" href="{{ asset('css/cms.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Black Dashboard') }}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS -->
    <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
</head>

<body class="{{ $class ?? '' }}" style="{{ $style ?? '' }}">
    {{-- {{$bgImage}} --}}
    @auth()
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
                        <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
                    </div>
                    <ul class="nav">
                        <li @if ($pageSlug == 'dashboard') z class="active " @endif>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <p>{{ __('Home') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'userprofile') z class="active " @endif>
                            <a href="{{ route('memberprofile') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'events') z class="active " @endif>
                            <a href="{{ route('events.index') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <p>{{ __('Events') }}</p>
                            </a>
                        </li>
                        
                        <li @if ($pageSlug == 'prayers') z class="active " @endif>
                            <a href="{{ route('prayers.index') }}">
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                <p>{{ __('Prayers') }}</p>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                                <i class="fab fa-laravel"></i>
                                <span class="nav-link-text">{{ __('Sermon Viewing') }}</span>
                                <b class="caret mt-1"></b>
                            </a>
            
                            <div class="collapse show" id="laravel-examples">
                                <ul class="nav pl-4">
                                    <li @if ($pageSlug == 'sermons') class="active " @endif>
                                        <a href="{{ route('sermon.view') }}">
                                            <i class="tim-icons icon-single-02"></i>
                                            <p>{{ __('Sermon') }}</p>
                                        </a>
                                    </li>
                                    <li @if ($pageSlug == 'snotes') class="active " @endif>
                                        <a href="{{route('snote.view')}}">
                                            <i class="tim-icons icon-bullet-list-67"></i>
                                            <p>{{ __('Sermon Notes') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li @if ($pageSlug == 'giving') z class="active " @endif>
                            <a href="{{ route('giving.index') }}">
                                <i class="fa fa-database" aria-hidden="true"></i>
                                <p>{{ __('Giving') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'groups') z class="active " @endif>
                            <a href="{{ route('groups.view') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <p>{{ __('Groups') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                @include('layouts.navbars.navbar')

                <div class="content">
                    @yield('content')
                </div>

                @include('layouts.footer')
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        @include('layouts.navbars.navbar')
        <div class="wrapper wrapper-full-page">
            <div class="full-page {{ $contentClass ?? '' }}">
                <div class="content">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    @endauth
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors text-center">
                            <span class="badge filter badge-primary active" data-color="primary"></span>
                            <span class="badge filter badge-info" data-color="blue"></span>
                            <span class="badge filter badge-success active" data-color="green"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('black') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> 
    <!-- Chart JS -->
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> 
    <!--  Notifications Plugin    -->
    <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

    <script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
    <script src="{{ asset('black') }}/js/theme.js"></script>

    @stack('js')

    <script>
        $(document).ready(function() {
            
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .background-color span').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data', new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr('data', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data', new_color);
                    }
                });

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                    } else {
                        $('body').addClass('sidebar-mini');
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage('Sidebar mini activated...');
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').removeClass('white-content');
                        }, 900);
                        white_color = false;
                    } else {
                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').addClass('white-content');
                        }, 900);

                        white_color = true;
                    }
                });
            });
        });
    </script>
    <script>
    // Function to hide success and error alerts after 5 seconds
          setTimeout(function() {
              $('#success-alert').fadeOut('slow');
              $('#error-alert').fadeOut('slow');
             }, 5000); // 5000 milliseconds = 5 seconds
        </script>
    @stack('js')
</body>

</html>
