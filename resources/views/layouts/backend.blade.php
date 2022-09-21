<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>virage</title>

    <meta name="description"
        content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">
    <link rel="stylesheet" href="{{ asset('ijaboCropTool/ijaboCropTool.min.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('css/themes/xwork.css') }}"> -->
    @yield('css_after')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>

<body>
    <!-- Page Container -->
    <!--
    Available classes for #page-container:

    GENERIC

      'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                  - Theme helper buttons [data-toggle="theme"],
                                                  - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                  - ..and/or Dashmix.layout('dark_mode_[on/off/toggle]')

    SIDEBAR & SIDE OVERLAY

      'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
      'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
      'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
      'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
      'sidebar-dark'                              Dark themed sidebar

      'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
      'side-overlay-o'                            Visible Side Overlay by default

      'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

      'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

      ''                                          Static Header if no class is added
      'page-header-fixed'                         Fixed Header


    FOOTER

      ''                                          Static Footer if no class is added
      'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

    HEADER STYLE

      ''                                          Classic Header style if no class is added
      'page-header-dark'                          Dark themed Header
      'page-header-glass'                         Light themed Header with transparency by default
                                                  (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
      'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                  (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

    MAIN CONTENT LAYOUT

      ''                                          Full width Main Content if no class is added
      'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
      'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

    DARK MODE

      'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
  -->

    <div id="page-container"
        class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
        <!-- Side Overlay-->
        <aside id="side-overlay">
            <!-- Side Header -->
            <div class="bg-image"
                style="background-image: url('{{ asset('media/various/bg_side_overlay_header.jpg') }}');">
                <div class="bg-primary-op">
                    <div class="content-header">
                        <!-- User Avatar -->

                        <!-- END User Avatar -->

                        <!--
            <div class="ms-2">
              <a class="text-white fw-semibold" href="javascript:void(0)">George Taylor</a>
              <div class="text-white-75 fs-sm">Full Stack Developer</div>
            </div>-->

           <!-- <a class="ms-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
              <i class="fa fa-times-circle"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="content-side">
        <div class="block pull-x mb-0">

          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Color Themes</span>
          </div>
          <div class="block-content block-content-full">
            <div class="row g-sm text-center">
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-default" data-toggle="theme" data-theme="default" href="#">
                  Default
                </a>
              </div>
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-xwork" data-toggle="theme" data-theme="{{ mix('/css/themes/xwork.css') }}" href="#">
                  xWork
                </a>
              </div>
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-xmodern" data-toggle="theme" data-theme="{{ mix('/css/themes/xmodern.css') }}" href="#">
                  xModern
                </a>
              </div>
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-xeco" data-toggle="theme" data-theme="{{ mix('/css/themes/xeco.css') }}" href="#">
                  xEco
                </a>
              </div>
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-xsmooth" data-toggle="theme" data-theme="{{ mix('/css/themes/xsmooth.css') }}" href="#">
                  xSmooth
                </a>
              </div>
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-xinspire" data-toggle="theme" data-theme="{{ mix('/css/themes/xinspire.css') }}" href="#">
                  xInspire
                </a>
              </div>
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-xdream" data-toggle="theme" data-theme="{{ mix('/css/themes/xdream.css') }}" href="#">
                  xDream
                </a>
              </div>
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-xpro" data-toggle="theme" data-theme="{{ mix('/css/themes/xpro.css') }}" href="#">
                  xPro
                </a>
              </div>
              <div class="col-4 mb-1">
                <a class="d-block py-3 text-white fs-sm fw-semibold bg-xplay" data-toggle="theme" data-theme="{{ mix('/css/themes/xplay.css') }}" href="#">
                  xPlay
                </a>
              </div>
            </div>
          </div>

          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Sidebar</span>
          </div>
          <div class="block-content block-content-full">
            <div class="row g-sm text-center">
              <div class="col-6 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">Dark</a>
              </div>
              <div class="col-6 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">Light</a>
              </div>
            </div>
          </div>

          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Header</span>
          </div>
          <div class="block-content block-content-full">
            <div class="row g-sm text-center mb-2">
              <div class="col-6 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">Dark</a>
              </div>
              <div class="col-6 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">Light</a>
              </div>
              <div class="col-6 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_mode_fixed" href="javascript:void(0)">Fixed</a>
              </div>
              <div class="col-6 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_mode_static" href="javascript:void(0)">Static</a>
              </div>
            </div>
          </div>

          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Content</span>
          </div>
          <div class="block-content block-content-full">
            <div class="row g-sm text-center">
              <div class="col-6 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_boxed" href="javascript:void(0)">Boxed</a>
              </div>
              <div class="col-6 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_narrow" href="javascript:void(0)">Narrow</a>
              </div>
              <div class="col-12 mb-1">
                <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_full_width" href="javascript:void(0)">Full Width</a>
              </div>
            </div>
          </div>
        </div>
        <div class="block pull-x mb-0">
          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Heading</span>
          </div>
          <div class="block-content">
            <p>
              Content..
            </p>
          </div> -->
                        <!-- END Content -->
                    </div>
                </div>
                <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="bg-header-dark">
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="fw-semibold text-white tracking-wide" href="/">
                        <span class="smini-visible">
                            D<span class="opacity-75">x</span>
                        </span>
                        <span class="smini-hidden">
                            <img class="profile-user-img img-fluid img " src="{{asset('images/logo9_10_143849.png')}}" alt="avatar"
                    style="width: 170px; height:110px">
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Toggle Sidebar Style -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                            data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on"
                            onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
                            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                        </button>
                        <!-- END Toggle Sidebar Style -->

                        <!-- Dark Mode -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                            data-target="#dark-mode-toggler" data-class="far fa"
                            onclick="Dashmix.layout('dark_mode_toggle');">
                            <i class="far fa-moon" id="dark-mode-toggler"></i>
                        </button>
                        <!-- END Dark Mode -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                            <i class="fa fa-times-circle"></i>
                        </button>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side content-side-full" style="width: 240px;padding: 5px;">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                                <i class="nav-main-link-icon fa fa-location-arrow"></i>
                                <span class="nav-main-link-name">Accueil</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                              @role('admin')
                              <a class="nav-main-link {{ request()->is('users/index') ? ' active' : '' }}"
                                  href="{{ route('users.index') }}">
                                  <span class="nav-main-link-name">
                                      <img class="profile-user-img img-fluid img " src="{{asset('images/group.png')}}" alt="avatar" style="width: 30px;">
                                      Les personnels</span>
                              </a>



                              @endrole
                        </li>
                        <li class="nav-main-item">
                              @role('accueillante')
                                <a class="nav-main-link{{ request()->is('sheet/index')  ? ' active' : '' }}"
                                    href="{{ route('sheet.index') }}">
                                    <span class="nav-main-link-name"><img class="profile-user-img img-fluid img " src="{{asset('images/id-card.png')}}" alt="avatar" style="width: 30px;">
                                        Les fiches d'accueil </span>
                                </a>
                                <a class="nav-main-link {{ request()->is('sheet/rdv') ? ' active' : '' }}"
                                    href="{{ route('sheet.rdv') }}">
                                    <span class="nav-main-link-name">
                                        <img class="profile-user-img img-fluid img " src="{{asset('images/appointment.png')}}" alt="avatar" style="width: 30px;">
                                        Les rendez_vous</span>
                                </a>
                              @endrole
                        </li>
                        <li class="nav-main-item">
                            @role('ecoutante')
                              <a class="nav-main-link {{ request()->is('ecoute/index') ? ' active' : '' }}"
                                  href="{{ route('ecoute.index') }}">
                                  <span class="nav-main-link-name">
                                      <img class="profile-user-img img-fluid img " src="{{asset('images/ficheEcoute.png')}}" alt="avatar" style="width: 30px;">
                                      Les fiches d'écoute</span>

                              </a>

                              <a class="nav-main-link {{ request()->is('rapport_ecoutante/index') ? ' active' : '' }}"
                                  href="{{ route('rapport_ecoutante.index') }}">
                                  <span class="nav-main-link-name">
                                      <img class="profile-user-img img-fluid img " src="{{asset('images/listen.png')}}" alt="avatar" style="width: 30px;">
                                      Les rapports écoutante</span>
                              </a>
                                    @endrole
                        </li>
                        <li class="nav-main-item">
                              @role('assistante')
                                <a class="nav-main-link {{ request()->is('rapport_assistante/index') ? ' active' : '' }}"
                                    href="{{ route('rapport_assistante.index') }}">
                                    <span class="nav-main-link-name">
                                        <img class="profile-user-img img-fluid img " src="{{asset('images/social-care.png')}}" alt="avatar" style="width: 30px;">
                                        Les rapports assistante sociale</span>
                                </a>
                              @endrole
                        </li>
                        <li class="nav-main-item">
                            @role('psychologue')
                              <a class="nav-main-link {{ request()->is('rapport_psychologue/index') ? ' active' : '' }}"
                                  href="{{ route('rapport_psychologue.index') }}">
                                  <span class="nav-main-link-name">
                                      <img class="profile-user-img img-fluid img " src="{{asset('images/psychologist.png')}}" alt="avatar" style="width: 30px;">
                                      Les rapports psychologue</span>
                              </a>

                              <a class="nav-main-link{{ request()->is('consultation/index') ? ' active' : '' }}"
                                  href="{{ route('consultation.index') }}">
                                  <span class="nav-main-link-name">
                                      <img class="profile-user-img img-fluid img " src="{{asset('images/consultation.png')}}" alt="avatar" style="width: 30px;">
                                      Les fiches de consultations</span>
                              </a>
                            @endrole
                        </li>
                        <li class="nav-main-item">
                            @role('accompagnatrice')
                              <a class="nav-main-link{{ request()->is('garde/index') ? ' active' : '' }}"
                                  href="garde/index">
                                  <span class="nav-main-link-name">Les fiches de garde</span>
                              </a>

                              <a class="nav-main-link{{ request()->is('orders') ? ' active' : '' }}"
                                href="/commandes">
                                <span class="nav-main-link-name">Les commandes</span>
                            </a>

                            <a class="nav-main-link{{ request()->is('index') ? ' active' : '' }}"
                                href="/list-medicaments">
                                <span class="nav-main-link-name">Les médicaments</span>
                            </a>
                            @endrole
                        </li>
                        <li class="nav-main-item">
                            @role('pharmacien')
                              <a class="nav-main-link{{ request()->is('index') ? ' active' : '' }}"
                                  href="/list-medicaments">
                                  <span class="nav-main-link-name">Les médicaments</span>
                              </a>

                              <a class="nav-main-link{{ request()->is('orders') ? ' active' : '' }}"
                                  href="/commandes">
                                  <span class="nav-main-link-name">Les commandes</span>
                              </a>
                                  @endrole
                        </li>
                        <li class="nav-main-item">
                            @role('avocat')
                              <a class="nav-main-link {{ request()->is('pages/datatables') ? ' active' : '' }}"
                                  href="{{ route('rapport_avocat.index') }}">
                                  <span class="nav-main-link-name">Les rapports d'avocat</span>
                              </a>
                            @endrole
                        </li>
                        <li class="nav-main-item">
                            @role('econome')
                              <a class="nav-main-link {{ request()->is('pages/datatables') ? ' active' : '' }}"
                                  href="/pages/datatables">
                                  <span class="nav-main-link-name">Les tableaux d'entrées/sorties</span>
                              </a>
                            @endrole
                        </li>
                        <li class="nav-main-item">
                              <a class="nav-main-link {{ request()->is('type/index') ? ' active' : '' }}" href='/type/index'>
                                  <span class="nav-main-link-name">
                                      <img class="profile-user-img img-fluid img " src="{{asset('images/type.png')}}"
                                          alt="avatar" style="width: 30px;">
                                      Type</span>
                              </a>
                          </li>

                          <li class="nav-main-item">
                              <a class="nav-main-link {{ request()->is('entres/index') ? ' active' : '' }}" href='/entres/index'>
                                  <span class="nav-main-link-name">
                                      <img class="profile-user-img img-fluid img " src="{{asset('images/e.png')}}"
                                          alt="avatar" style="width: 30px;">
                                      Entrées</span>
                              </a>
                          </li>

                          <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->is('sorties/index') ? ' active' : '' }}" href='/sorties/index'>
                                <span class="nav-main-link-name">
                                    <img class="profile-user-img img-fluid img " src="{{asset('images/s.png')}}"
                                        alt="avatar" style="width: 30px;">
                                   Sorties</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('ecoute/stat') ? ' active' : '' }}"
                            href="{{ route('ecoute.stat') }}">
                            <span class="nav-main-link-name">
                                <img class="profile-user-img img-fluid img " src="{{asset('images/statistiques.png')}}" alt="avatar" style="width: 30px;">
                                Les statistique</span>
                        </a>
                        </li>
                </ul>

                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header" style="box-shadow: 0px 1px 3px #00000029;">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle" style="border-radius: 50% !important;background: #FFF;border-width: 2px;">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fa fa-fw opacity-50 fa-search"></i> <span
                            class="ms-1 d-none d-sm-inline-block">Rechercher</span>
                    </button>
                    <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <img class="avatar avatar-md" src="{{auth()->user()->image ?  Storage::url( auth()->user()->image)   : asset('images/default-img.png')}}"
               style="width: 28px;margin-top: -5px">
                            <span class="d-none d-sm-inline-block">{{Auth::user()->first_name}}</span>
                            <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown" style="width: 300px">
                            <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                                Les Options de l'utilisateur
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item" href="{{ route('profile',Auth::user()->id) }}">
                                    <i class="far fa-fw fa-user me-1"></i> Profile
                                </a>
                                <a class="dropdown-item
                                 {{ request()->is('messages/index') ? ' active' : '' }}" href='/messages/index'>
                                    <span><i class="far fa-fw fa-envelope me-1"></i>Messages </span>

                                </a>

                                <div role="separator" class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> {{ __('Déconnecter') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>

                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="profile-user-img img-fluid img "
                            src="{{asset('images/notifications.png')}}" alt="avatar" style="width: 25px;">
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                                Notifications
                            </div>
                            <ul class="nav-items my-2">
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-check-circle text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">App was updated to v5.6!</div>
                                            <div class="text-muted">3 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-user-plus text-info"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">New Subscriber was added! You now have 2580!
                                            </div>
                                            <div class="text-muted">10 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-times-circle text-danger"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">Server backup failed to complete!</div>
                                            <div class="text-muted">30 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">You are running out of space. Please consider
                                                upgrading your plan.</div>
                                            <div class="text-muted">1 hour ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">New Sale! + $30</div>
                                            <div class="text-muted">2 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 border-top">
                                <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="side_overlay_toggle">
                        <i class="far fa-fw fa-list-alt"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-header-dark">
                <div class="content-header">
                    <form class="w-100" action="/dashboard" method="POST">
                        @csrf
                        <div class="input-group">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-alt-primary" data-toggle="layout"
                                data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                            <input type="text" class="form-control border-0" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                        Développé avec <i class="fa fa-heart text-danger"></i> par <span class="text-primary">BOUZAIENE
                            Amal</span>
                    </div>
                    <div class="col-sm-6 order-sm-1 text-center text-sm-start">

                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Dashmix Core JS -->
    <script src="{{ mix('js/dashmix.app.js') }}"></script>

    <!-- Laravel Original JS -->
    <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->
    <script src="{{asset('js/function.js')}}"></script>
    <script src="{{asset('js/ijaboCropTool.min.js')}}"></script>


    <script>


        $('#file').ijaboCropTool({
          preview : '.new-img-preview',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("PictureUpdate" , auth() ->id()) }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });
   </script>

    @stack('script')
    @stack('js_after')


</body>

</html>
