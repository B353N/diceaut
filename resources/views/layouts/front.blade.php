<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php $setting = App\Models\Setting::find($currentLang->id); @endphp

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="author" content="ProWebSite" />
    <meta name="description" content="@yield('meta')" />
    <meta name="keywords" content="{{ $setting->keywords }}" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <link rel="shortcut icon" href="{{ $setting->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ $setting->favicon }}" type="image/x-icon">
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Hind+Madurai:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    @if ($setting->OGgraph_switch == 1)
        <meta property="og:title" content="@yield('title')" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('home') }}" />
        <meta property="og:image"
            content="{{ route('home') }}{{ $setting->photo ? '/images/media/' . $setting->photo->file : '/public/img/200x200.png' }}" />
        <meta property="og:site_name" content="{{ $setting->author }}" />
        <meta property="og:description" content="@yield('meta')" />
    @endif

    @if ($setting->analytics_switch == 1)
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $setting->analytics }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $setting->analytics }}');
        </script>
    @endif

    @if ($setting->facebook_pixel_switch == 1)
        <!-- Facebook Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $setting->facebook_pixel }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ $setting->facebook_pixel }}&ev=PageView&noscript=1" /></noscript>
        <!-- End Facebook Pixel Code -->
    @endif
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v16.0&appId=559993132378690&autoLogAppEvents=1"
        nonce="xVBkoWbF"></script>
    @if ($currentLang->rtl == 1)
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap"
            rel="stylesheet">
    @else
        <link href="{{ $setting->font }}" rel="stylesheet">
    @endif
    <!-- Styles -->

    @yield('styles')

    @if ($currentLang->rtl == 1)
        <link href="{{ asset('css/front/rtl.css') }}" type="text/css" rel="stylesheet">
    @endif
</head>

<body>
    <div class="preloader">
        <button class="as-btn style3 preloaderCls">Откажи</button>
        <div class="preloader-inner"><span class="loader"></span></div>
    </div>
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for" />
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <div class="as-menu-wrapper">
        <div class="as-menu-area text-center">
            <button class="as-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="/"><img
                        src="{{ $setting->photo ? '/images/media/' . $setting->photo->file : '/img/200x200.png' }}"
                        alt="DiceAuto" /></a>
            </div>
            <div class="as-mobile-menu">
                <ul>
                    @foreach ($menus->sortBy('order') as $prod)
                        @if ($prod->on_off_submenu == 1)
                            <li class="menu-item-has-childrenn">
                                <a class="nav-link dropdown-toggle" href="{{ $prod->link }}" role="button"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ $prod->name }}</a>
                                <ul class="sub-menu">
                                    <li>
                                        {!! $prod->submenu !!}
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"> <a title="{{ $prod->name }}" class="nav-link"
                                    href="{{ $prod->link }}">{{ $prod->name }}</a> </li>
                        @endif
                    @endforeach
                    <li class="nav-item"> <a title="Резервация" class="nav-link" href="booking"
                            style="color:red;">Резервация</a> </li>
                </ul>
            </div>
        </div>
    </div>
    <header class="as-header header-layout3">
        <div class="header-top-area">
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-between align-items-center">
                        <div class="col-auto">
                            <p class="header-notice d-none d-lg-block">СПЕЦИАЛИЗИРАНИ В ДИАГНОСТИЦИРАНЕТО</p>
                        </div>
                        <div class="col-auto">
                            <div class="header-social">
                                <span class="social-title">Следвайте ни:</span>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="logo-style2">
                                <a href="/"><img
                                        src="{{ $setting->photo ? '/images/media/' . $setting->photo->file : '/public/img/200x200.png' }}"
                                        alt="DaisAuto" /></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div
                                        class="row align-items-center justify-content-center justify-content-md-end justify-content-lg-between">
                                        <div class="col-auto d-none d-lg-block">
                                            <div class="header-info">
                                                <div class="header-info_icon">
                                                    <i class="fal fa-envelope-open-text"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="header-info_label">Имейл</span>
                                                    <div class="header-info_link">
                                                        <a
                                                            href="mailto:@php echo $setting->contact; @endphp">@php echo $setting->contact; @endphp</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto d-none d-lg-block">
                                            <div class="header-info">
                                                <div class="header-info_icon">
                                                    <i class="fal fa-headset"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="header-info_label">Телефон</span>
                                                    <div class="header-info_link">
                                                        <a
                                                            href="tel:@php echo $setting->phone; @endphp">@php echo $setting->phone; @endphp</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto d-none d-xl-block">
                                            <div class="header-info">
                                                <div class="header-info_icon">
                                                    <i class="fal fa-clock"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span class="header-info_label">Работно Време</span>
                                                    <div class="header-info_link">
                                                        <span>@php echo $setting->working_hours; @endphp</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="header-button">
                                        <a class="icon-btn d-none d-md-inline-block" target="_blank"
                                            href="https://maps.google.com/maps?ll=43.227962,27.896385&z=16&t=m&hl=en&gl=BG&mapclient=embed&cid=12465010659316562110"><i
                                                class="fal fa-map-marker-alt"></i></a>
                                        <button class="as-menu-toggle d-inline-block d-lg-none">
                                            <i class="fal fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <div class="sticky-active">
                <div class="menu-area">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <nav class="main-menu menu-style1 d-none d-lg-block">
                                    <ul>
                                        @foreach ($menus->sortBy('order') as $prod)
                                            @if ($prod->on_off_submenu == 1)
                                                <li class="menu-item-has-children">
                                                    <a href="{{ $prod->link }}" ">{{ $prod->name }}</a>
                                    <ul class="sub-menu">
                                        <li>
                                        {!! $prod->submenu !!}
                                        </li>
                                    </ul>
                                </li>
@else
<li><a href="{{ $prod->link }}">{{ $prod->name }}</a></li>
 @endif
                                            @endforeach
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <a href="booking" class="header-link-btn"><i
                                            class="far fa-map-marker-alt"></i>РЕЗЕРВАЦИЯ ГТП</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer-wrapper footer-layout3">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">За нас</h3>
                            <div class="as-widget-about">
                                <p class="footer-text">Автосервиз Дайс Ауто работи с оригинални части и спазва всички
                                    изисквания за качество</p>
                                <h4 class="footer-info-title">Раб.Време</h4>
                                <p class="footer-text">Пон-Пет: 09.00 до 18:00</p>
                                <a href="/contacts" class="as-btn style3">Контакти</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Бързи Връзки</h3>
                            <div class="menu-all-pages-container">
                                {!! $headerfooter->footer_col2_html1 !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_newsletter footer-widget">
                            <h3 class="widget_title">Бюлетин</h3>
                            <p class="footer-text">Не пропускайте да се запишете за бюлетина</p>
                            <form class="newsletter-form">
                                <input class="form-control" type="email" placeholder="Имейл" required="" />
                                <button type="submit" class="as-btn style3">Абониране</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8 text-center text-lg-start">
                        <p class="copyright-text">Собственност на Дайс Ауто. Всички права запазени <i
                                class="fal fa-copyright"></i> <br /> Изработено от <a class="text-white"
                                href="https://prowebsite.vip">Дигитална Агенция ProWebsite</a></p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <div class="as-social">
                            <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-shape1">
            <img src="{{ asset('assets/img/shape/footer_shape_1.png') }}" alt="shape" />
        </div>
        <div class="footer-shape2">
            <img src="{{ asset('assets/img/shape/footer_shape_2.png') }}" alt="shape" />
        </div>
    </footer>
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
