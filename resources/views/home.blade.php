@extends('layouts.front')

@section('title')
    {{ $homesetting->meta_title }}
@endsection
@section('meta')
    {{ $homesetting->meta_description }}
@endsection

@section('content')
    <div class="as-hero-wrapper hero-slider-3 as-carousel number-dots" data-slide-show="1" data-md-slide-show="1"
        data-fade="true" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true">
        @foreach ($sliders as $slido)
            <div class="as-hero-slide">
                <div class="as-hero-bg"
                    data-bg-src="{{ $slido->photo ? '/images/media/' . $slido->photo->file : '/img/200x200.png' }}">
                    <img src="{{ $slido->photo ? '/images/media/' . $slido->photo->file : '/img/200x200.png' }}"
                        alt="" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="hero-style3">
                                <span class="hero-subtitle" data-ani="slideindown"
                                    data-ani-delay="0.2s">{!! $slido->heading1 !!}</span>
                                <h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.3s">{!! $slido->heading2 !!}
                                </h1>
                                <h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.4s"></h1>
                                <p class="hero-text" data-ani="slideindown" data-ani-delay="0.5s"></p>
                                <a href="{!! $slido->button_link !!}" class="as-btn style3" data-ani="slideindown"
                                    data-ani-delay="0.6s">{!! $slido->button_text !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row seven-cols" style="margin-top: 1%;">
            @foreach ($clients as $client)
                <div class="col-md-1">
                    <a title="{{ $client->company_name }}" target="_blank" href="{{ $client->company_link }}"><img
                            class="client_image owl-lazy"
                            src="{{ $client->photo ? '/images/media/' . $client->photo->file : '/img/200x200.png' }}"
                            alt="{{ $client->company_name }}" style="max-width: 35%;"></a>
                </div>
            @endforeach
        </div>
    </div>
    <section class="position-relative bg-smoke space-top space-extra-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">Мнения</span>
                <h2 class="sec-title">Нашите клиенти за нас</h2>
            </div>
            <div class="row as-carousel" data-slide-show="2" data-md-slide-show="1" data-dots="true" data-xl-dots="true"
                data-ml-dots="true" data-lg-dots="true" data-md-dots="true" data-sm-dots="true" data-xs-dots="true">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-6 col-lg-4">
                        <div class="testi-grid">
                            <div class="testi-grid_profile">
                                <div class="testi-grid_img">
                                    <img src="https://diceauto.bg/images/media/1677577998profile.png" alt="Avatar" />
                                    <div class="testi-grid_icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                                <div class="testi-grid_info">
                                    <h3 class="testi-grid_name">{{ $testimonial->name }}</h3>
                                    <span class="testi-grid_desig">{{ $testimonial->position }}</span>
                                </div>
                            </div>
                            <p class="testi-grid_text">“{{ $testimonial->description }}”</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="body-shape1">
            <img src="assets/img/shape/road_shape_1.png" alt="shape" />
        </div>
    </section>
    <section class="space">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">{{ $homesetting->services_title }}</span>
                <h2 class="sec-title">{{ $homesetting->services_subtitle }}</h2>
            </div>
            <div class="row as-carousel" data-slide-show="3" data-md-slide-show="2" data-arrows="true">
                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-block">
                            <div class="service-block_img">
                                <img src="{{ $service->photo ? '/images/media/' . $service->photo->file : '/img/200x200.png' }}"
                                    alt="service image" />
                            </div>
                            <div class="service-block_content" data-bg-src="assets/img/bg/pattern_bg_7.png">
                                <span class="service-block_number">{{ $service->title }}</span>
                                <h3 class="service-block_title">
                                    <a href="{{ route('portfolio') }}">{{ $service->description }}</a>
                                </h3>
                                <a href="{{ route('portfolio') }}" class="as-btn">Виж Още</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="space position-relative overflow-hidden">
        <div class="bg-shape1"></div>
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-xl-6">
                    <div class="img-box-3">
                        <div class="img1">
                            <img src="{{ $homesetting->about_image1 }}" alt="About" />
                        </div>
                        <div class="img2">
                            <div class="as-experience style3">
                                <h3 class="experience-year"><span
                                        class="counter-number">{{ $homesetting->about_yearstitle }}</span>+</h3>
                                <h4 class="experience-text">{{ $homesetting->about_yearstext }}</h4>
                            </div>
                            <img src="{{ $homesetting->about_image2 }}" alt="About" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="title-area mb-40">
                        <span class="sub-title">{{ $homesetting->about_subtitle }}</span>
                        <h2 class="sec-title">{{ $homesetting->about_title }}</h2>
                    </div>
                    <div class="nav tab-menu4" role="tablist">
                        <button class="as-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one"
                            type="button" role="tab" aria-controls="nav-one" aria-selected="true">За нас</button>
                    </div>
                    <div class="tab-content why-tabcontent" id="why-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                            aria-labelledby="nav-one-tab">
                            {!! $homesetting->about_description !!}
                            <div class="pt-40">
                                <div class="about-progress">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 90%">
                                            <div class="progress-value">90%</div>
                                        </div>
                                    </div>
                                    <h3 class="about-progress_title">Ремонт на двигатели</h3>
                                </div>
                                <div class="about-progress">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 95%">
                                            <div class="progress-value">95%</div>
                                        </div>
                                    </div>
                                    <h3 class="about-progress_title">Диагностика</h3>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href={{ route('contact') }}" class="as-btn">Виж Още</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space" data-overlay="title" data-opacity="7" data-bg-src="assets/img/bg/cta_bg_1.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6 mb-5 mb-lg-0">
                    <div class="title-area mb-0 text-lg-start text-center">
                        <span class="sub-title text-white">{{ $homesetting->separator_title }}</span>
                        <h2 class="sec-title text-white">{{ $homesetting->separator_description }}</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="btn-group justify-content-lg-end justify-content-center">
                        <a href="{{ $homesetting->separator_button1_link }}"
                            class="as-btn style3">{{ $homesetting->separator_button1_text }}</a>
                        <a href="{{ $homesetting->separator_button2_link }}" class="as-btn style-play"><i
                                class="fa-solid fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white space">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">Нашите Експерти</span>
                <h2 class="sec-title">Екипа ни</h2>
            </div>
            <div class="row slider-shadow as-carousel" data-slide-show="3" data-md-slide-show="2" data-arrows="true">
                @foreach ($teams as $team)
                    <div class="col-md-6 col-lg-4">
                        <div class="team-box">
                            <div class="team-img">
                                <img src="{{ $team->photo ? '/images/media/' . $team->photo->file : '/img/200x200.png' }}"
                                    alt="Team" />
                                <div class="team-content">
                                    <h3 class="team-title">
                                        <a href="team-details.html">{{ $team->name }}</a>
                                    </h3>
                                    <span class="team-desig">{{ $team->position }}</span>
                                </div>
                            </div>
                            <div class="as-social" data-bg-src="assets/img/bg/pattern_bg_2.png">
                                <a target="_blank" href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="bg-title position-relative overflow-hidden">
        <div class="row">
            <div class="col-xl-6">
                <div class="as-video style1">
                    <img src="assets/img/normal/video_2.jpg" alt="Video Image" />
                    <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i
                            class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="feature-media-wrap space">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title">Дайс Ауто</span>
                        <h2 class="sec-title text-white">Защо да изберете нас?</h2>
                    </div>
                    <div class="feature-media">
                        <div class="feature-media_num">01</div>
                        <div class="feature-media_content">
                            <h3 class="feature-media_title">Експресни услуги</h3>
                            <p class="feature-media_text">Ако имате нужда от експресен ремонт, доставка на оригинални части
                                в рамките на няколко часа и още.</p>
                        </div>
                    </div>
                    <div class="feature-media">
                        <div class="feature-media_num">02</div>
                        <div class="feature-media_content">
                            <h3 class="feature-media_title">Комплексно обслужване</h3>
                            <p class="feature-media_text">Ние можем да отремонтираме всичко по автомобила: ходова част,
                                двигател, скоростни кутии, климатици и др.</p>
                        </div>
                    </div>
                    <div class="feature-media">
                        <div class="feature-media_num">03</div>
                        <div class="feature-media_content">
                            <h3 class="feature-media_title">Експерти</h3>
                            <p class="feature-media_text">Нашите експерти имат опит и познания по най- новите технологии в
                                автомобилите.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body-shape4">
            <img src="assets/img/shape/shape_2.png" alt="shape" />
        </div>
    </div>
    <section class="space">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">YouTube</span>
                <h2 class="sec-title">Последно от нашия канал</h2>
            </div>
            <div class="row as-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2"
                data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">
                {{-- @foreach ($videos as $video)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="as-product">
                            <div class="product-img">
                                <img src="{{ $video->snippet->thumbnails->high->url }}" alt="Video Thumbnail" />
                                <div class="actions">
                                    <a href="https://www.youtube.com/watch?v={{ $video->id->videoId }}" target="_blank"
                                        class="icon-btn"><i class="fas fa-play"></i></a>
                                </div>
                                <span class="category">Breaking</span>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                    <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span>
                                </div>
                                <h3 class="product-title">
                                    <a href="shop-details.html">{{ $video->snippet->title }}</a>
                                </h3>
                                <span class="price">{{ $video->snippet->channelTitle }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </section>
    <section class="">
        <div class="as-container3 space bg-title position-relative">
            <div class="container">
                <div class="row justify-content-lg-between justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <div class="title-area text-center text-lg-start">
                            <span class="sub-title">Facebook.com</span>
                            <h2 class="sec-title text-white">Последвайте ни</h2>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="sec-btn">
                            <a href="https://www.facebook.com/diceauto.bg" class="as-btn style2">Към фейсбук</a>
                        </div>
                    </div>
                </div>
                <div class="row gy-4">
                    <div class="col-xl-8">
                        <div class="fb-page" data-href="https://www.facebook.com/diceauto.bg" data-tabs="timeline"
                            data-width="500" data-height="581" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/diceauto.bg" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/diceauto.bg">ДАЙС АУТО</a></blockquote>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="">
                            <div class="price-card style2">
                                <div class="price-card_header">
                                    <h3 class="price-card_title">Последвайте ни</h3>
                                    <p class="price-card_subtitle">И може да спечелите супер награди!</p>
                                </div>
                                <div class="price-card_price">
                                    <span class="price">Facebook<span class="package-duration">.com</span> </span><i
                                        class="fal fa-truck-pickup"></i>
                                </div>
                                <div class="price-card_content">
                                    <div class="checklist">
                                        <ul>
                                            <li>Ваучери за отстъпки</li>
                                            <li>Безплатна консултация</li>
                                            <li>Безплатна диагностика</li>
                                            <li>Безплатен ГТП</li>
                                            <li>И много други</li>
                                        </ul>
                                    </div>
                                    <a href="https://www.facebook.com/diceauto.bg" class="as-btn">Вижте повече</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-shape7">
                <img src="assets/img/shape/tier_shape_2.png" alt="shape" />
            </div>
        </div>
    </section>
    <section class="space">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">{{ $homesetting->fun_title }}</span>
                <h2 class="sec-title">{{ $homesetting->fun_description }}</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 process-box-wrap">
                    <div class="process-box">
                        <div class="process-box_icon">
                            <img src="assets/img/icon/process_1_1.svg" alt="service image" />
                        </div>
                        <h3 class="process-box_title">{{ $homesetting->count_number1 }}</h3>
                        <p class="process-box_text">{{ $homesetting->count_description1 }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 process-box-wrap">
                    <div class="process-box">
                        <div class="process-box_icon">
                            <img src="assets/img/icon/process_1_2.svg" alt="service image" />
                        </div>
                        <h3 class="process-box_title">{{ $homesetting->count_number2 }}</h3>
                        <p class="process-box_text">{{ $homesetting->count_description2 }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 process-box-wrap">
                    <div class="process-box">
                        <div class="process-box_icon">
                            <img src="assets/img/icon/process_1_3.svg" alt="service image" />
                        </div>
                        <h3 class="process-box_title">{{ $homesetting->count_number3 }}</h3>
                        <p class="process-box_text">{{ $homesetting->count_description3 }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 process-box-wrap">
                    <div class="process-box">
                        <div class="process-box_icon">
                            <img src="assets/img/icon/process_1_4.svg" alt="service image" />
                        </div>
                        <h3 class="process-box_title">{{ $homesetting->count_number4 }}</h3>
                        <p class="process-box_text">{{ $homesetting->count_description4 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space blog-sec">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">Нашата работа</span>
                <h2 class="sec-title">Последни Проекти</h2>
            </div>
            <div class="row slider-shadow as-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2"
                data-sm-slide-show="1" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true">
                @foreach ($projects as $project)
                    <div class="col-md-6 col-xl-4">
                        <div class="blog-grid">
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="{{ URL::to('/') }}/project/{{ $project->slug }}"><i
                                            class="fas fa-tags"></i>{{ $project->project_category->name }}</a>
                                </div>
                                <h3 class="blog-title">
                                    <a href="{{ URL::to('/') }}/project/{{ $project->slug }}">{{ $project->title }}</a>
                                </h3>
                            </div>
                            <div class="blog-img">
                                <img src="{{ $project->photo ? '/images/media/' . $project->photo->file : 's/img/200x200.png' }}"
                                    alt="{{ $project->title }}" />
                            </div>
                            <a href="{{ URL::to('/') }}/project/{{ $project->slug }}" class="blog-btn">Виж повече<i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
