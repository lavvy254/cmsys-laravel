<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Extra details for Live View on GitHub Pages -->
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/black-dashboard-laravel" />
        <!--  Social tags      -->
        <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, Black dashboard Laravel bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, free dashboard, free admin dashboard, free bootstrap 4 admin dashboard">
        <meta name="description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Black Dashboard Laravel by Creative Tim">
        <meta itemprop="description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
        <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/164/original/opt_blk_laravel_thumbnail.jpg?1561102244">
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@creativetim">
        <meta name="twitter:title" content="Black Dashboard Laravel by Creative Tim">
        <meta name="twitter:description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/164/original/opt_blk_laravel_thumbnail.jpg?1561102244">
        <!-- Open Graph data -->
        <meta property="fb:app_id" content="655968634437471">
        <meta property="og:title" content="Black Dashboard Laravel by Creative Tim" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://black-dashboard-laravel.creative-tim.com/" />
        <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/164/original/opt_blk_laravel_thumbnail.jpg?1561102244" />
        <meta property="og:description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you." />
        <meta property="og:site_name" content="Creative Tim" />
        <title>{{ config('app.name', 'Black Dashboard Laravel - Free Laravel Preset') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
        <!-- End Google Tag Manager -->
    </head>
<body class="">
            <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
                <div class="wrapper">
                        <div class="sidebar">
                                <div class="sidebar-wrapper">
                                    <div class="logo">
                                        <a href="#" class="simple-text logo-mini">{{ _('BD') }}</a>
                                        <a href="#" class="simple-text logo-normal">{{ _('Black Dashboard') }}</a>
                                    </div>
                                    <ul class="nav">
                                        <li>
                                            <a href="{{ route('home') }}">
                                                <i class="tim-icons icon-chart-pie-36"></i>
                                                <p>{{ _('Dashboard') }}</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                                                <i class="fab fa-laravel" ></i>
                                                <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                                                <b class="caret mt-1"></b>
                                            </a>
                            
                                            <div class="collapse show" id="laravel-examples">
                                                <ul class="nav pl-4">
                                                    <li >
                                                        <a href="{{ route('profile.edit')  }}">
                                                            <i class="tim-icons icon-single-02"></i>
                                                            <p>{{ _('User Profile') }}</p>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="{{ route('user.index')  }}">
                                                            <i class="tim-icons icon-bullet-list-67"></i>
                                                            <p>{{ _('User Management') }}</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li >
                                            <a href="{{ route('pages.icons') }}">
                                                <i class="tim-icons icon-atom"></i>
                                                <p>{{ _('Icons') }}</p>
                                            </a>
                                        </li>
                                        <li >
                                            <a href="{{ route('pages.maps') }}">
                                                <i class="tim-icons icon-pin"></i>
                                                <p>{{ _('Maps') }}</p>
                                            </a>
                                        </li>
                                        <li >
                                            <a href="{{ route('pages.notifications') }}">
                                                <i class="tim-icons icon-bell-55"></i>
                                                <p>{{ _('Notifications') }}</p>
                                            </a>
                                        </li>
                                        <li >
                                            <a href="{{ route('pages.tables') }}">
                                                <i class="tim-icons icon-puzzle-10"></i>
                                                <p>{{ _('Table List') }}</p>
                                            </a>
                                        </li>
                                        <li >
                                            <a href="{{ route('pages.typography') }}">
                                                <i class="tim-icons icon-align-center"></i>
                                                <p>{{ _('Typography') }}</p>
                                            </a>
                                        </li>
                                        <li >
                                            <a href="{{ route('pages.rtl') }}">
                                                <i class="tim-icons icon-world"></i>
                                                <p>{{ _('RTL Support') }}</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
            <div class="main-panel">
                    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                            <div class="container-fluid">
                                <div class="navbar-wrapper">
                                    <div class="navbar-toggle d-inline">
                                        <button type="button" class="navbar-toggler">
                                            <span class="navbar-toggler-bar bar1"></span>
                                            <span class="navbar-toggler-bar bar2"></span>
                                            <span class="navbar-toggler-bar bar3"></span>
                                        </button>
                                    </div>
                                    <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navigation">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="search-bar input-group">
                                            <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                                <span class="d-lg-none d-md-block">{{ __('Search') }}</span>
                                            </button>
                                        </li>
                                        <li class="dropdown nav-item">
                                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                                <div class="notification d-none d-lg-block d-xl-block"></div>
                                                <i class="tim-icons icon-sound-wave"></i>
                                                <p class="d-lg-none"> {{ __('Notifications') }} </p>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Mike John responded to your email') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('You have 5 more tasks') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Your friend Michael is in town') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Another notification') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Another one') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown nav-item">
                                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                                <div class="photo">
                                                    <img src="{{ asset('black') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                                                </div>
                                                <b class="caret d-none d-lg-block d-xl-block"></b>
                                                <p class="d-lg-none">{{ __('Log out') }}</p>
                                            </a>
                                            <ul class="dropdown-menu dropdown-navbar">
                                                <li class="nav-link">
                                                    <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a href="#" class="nav-item dropdown-item">{{ __('Settings') }}</a>
                                                </li>
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-link">
                                                    <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="separator d-lg-none"></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                                            <i class="tim-icons icon-simple-remove"></i>
                                      </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
          </button>
        </div>
    </div>
</div>
</div>

    <div class="content">
        <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Users</h4>
                    </div>
                </div>
            </div>
            <div class="card my-4">
                <div class="card-body">
                <div class="card-body px-0 pb-2">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="{{ $user->fname }}">
                                @error('fname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="{{ $user->lname }}">
                                @error('lname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="{{ $user->age }}">
                                @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" value="{{ $user->gender }}">
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" readonly value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                    
                </div>
            </div>