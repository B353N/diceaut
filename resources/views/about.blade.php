@extends('layouts.front')

@section('title') {{$aboutsetting->meta_title}} @endsection
@section('meta') {{$aboutsetting->meta_description}} @endsection


@section('content')


<div class="breadcumb-wrapper" data-bg-src="assets/img/breadcumb/breadcumb-bg.jpg">
    <div class="container z-index-common">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">За нас</h1>
        <div class="breadcumb-menu-wrap">
          <ul class="breadcumb-menu">
            <li><a href="{{ route('home') }}">Начало</a></li>
            <li>За нас</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="space">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-xl-6 mb-35 mb-xl-0">
          <div class="img-box-2">
            <div class="img1"><img src="assets/img/normal/about_3_1.jpg" alt="About" /></div>
            <div class="img2"><img src="assets/img/normal/about_3_2.jpg" alt="About" /></div>
            <div class="img3"><img src="assets/img/normal/about_3_3.jpg" alt="About" /></div>
            <div class="as-experience style2" data-bg-src="assets/img/normal/year_bg_2.png">
              <h3 class="experience-year"><span class="counter-number">25</span></h3>
              <h4 class="experience-text">Години Опит</h4>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="title-area mb-40 text-md-start text-center">
            <span class="sub-title">Дайс Ауто ЕООД</span>
            <h2 class="sec-title">Комплексно сервизно обслужване</h2>
          </div>
          <p class="text-md-start text-center mt-n2 mb-30">
            Специализираният сервизен център на Дайс Ауто предлага точно това, от което Вие имате необходимост – високо технологично обслужване на Вашия автомобил,
            оригинални или алтернативни резервни части и ремонти извършени от високо квалифицирани специалисти след направена компютърна диагностика.
          </p>
          <div class="checklist style2 about-checklist">
            <ul>
              <li>Експресни услуги</li>
              <li>Високо качество</li>
              <li>Коректност</li>
              <li>Експресна доставка на оригинални резервни части</li>
              <li>Комплексно сервизно обслужване</li>
              <li>Професионално оборудване и специализиран софтуер</li>
              <li>Unlimited Free Checkup</li>
              <li>Great Skilled Technician</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="" data-pos-space=".circle-bg" data-sec-space="margin-bottom" data-margin-bottom="225px">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-3 col-sm-6">
          <div class="feature-circle" data-bg-src="assets/img/bg/pattern_bg_6.png">
            <div class="progressbar">
              <div class="circle" data-percent="100"><div class="circle-num"></div></div>
              <h3 class="feature-circle_title">Качествени услуги</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="feature-circle" data-bg-src="assets/img/bg/pattern_bg_6.png">
            <div class="progressbar">
              <div class="circle" data-percent="95"><div class="circle-num"></div></div>
              <h3 class="feature-circle_title">Обучени експерти</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="feature-circle" data-bg-src="assets/img/bg/pattern_bg_6.png">
            <div class="progressbar">
              <div class="circle" data-percent="93"><div class="circle-num"></div></div>
              <h3 class="feature-circle_title">Доволни Клиент</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="feature-circle" data-bg-src="assets/img/bg/pattern_bg_6.png">
            <div class="progressbar">
              <div class="circle" data-percent="3"><div class="circle-num"></div></div>
              <h3 class="feature-circle_title">Отказани поръчки</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="circle-bg space-bottom bg-smoke"></div>
  <section class="space" data-overlay="title" data-opacity="7" data-bg-src="assets/img/bg/cta_bg_1.jpg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-7 col-lg-6 mb-5 mb-lg-0">
          <div class="title-area mb-0 text-lg-start text-center">
            <span class="sub-title text-white">Услуги</span>
            <h2 class="sec-title text-white">Премиум качество на супер цена.</h2>
          </div>
        </div>
        <div class="col-xl-5 col-lg-6">
          <div class="btn-group justify-content-lg-end justify-content-center">
            <a href="{{route('portfolio')}}" class="as-btn style3">Портфолио</a>
            <a href="{{route('contact')}}" class="as-btn style2">Контакти</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

