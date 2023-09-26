@extends('layouts.front')

@section('title') {{$contactsetting->meta_title}} @endsection
@section('meta') {{$contactsetting->meta_description}} @endsection


@section('content')


<div class="breadcumb-wrapper" data-bg-src="assets/img/breadcumb/breadcumb-bg.jpg">
    <div class="container z-index-common">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">{{$contactsetting->meta_title}}</h1>
        <div class="breadcumb-menu-wrap">
          <ul class="breadcumb-menu">
            <li><a href="{{ route('home') }}">Начало</a></li>
            <li>Контакти</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section class="space">
    <div class="container">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
          <div class="row gy-30 justify-content-center">
            <div class="col-md-6 col-lg-4">
              <div class="contact-box">
                <div class="contact-box_img"><img src="assets/img/normal/contact_1_1.jpg" alt="service image" /></div>
                <div class="contact-box_content">
                  <div class="contact-box_icon"><i class="far fa-headset"></i></div>
                  <div class="contact-box_info">
                    <p class="contact-box_text">{!!$contactsetting->box_title1!!}</p>
                    <h5 class="contact-box_link"><a href="tel:{!!$contactsetting->box_html1!!}">{!!$contactsetting->box_html1!!}</a></h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="contact-box">
                <div class="contact-box_img"><img src="assets/img/normal/contact_1_2.jpg" alt="service image" /></div>
                <div class="contact-box_content">
                  <div class="contact-box_icon"><i class="far fa-envelope-open-text"></i></div>
                  <div class="contact-box_info">
                    <p class="contact-box_text">{!!$contactsetting->box_title2!!}</p>
                    <h5 class="contact-box_link"><a href="mailto:{!!$contactsetting->box_html2!!}">{!!$contactsetting->box_html2!!}</a></h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="contact-box">
                <div class="contact-box_img"><img src="assets/img/normal/contact_1_3.jpg" alt="service image" /></div>
                <div class="contact-box_content">
                  <div class="contact-box_icon"><i class="far fa-map-location-dot"></i></div>
                  <div class="contact-box_info">
                    <p class="contact-box_text">{!!$contactsetting->box_title3!!}</p>
                    <h5 class="contact-box_link">{!!$contactsetting->box_html3!!}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="space bg-smoke position-relative">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7 col-sm-9">
          <div class="title-area text-center">
            <span class="sub-title">{!!$contactsetting->form_title!!}</span>
            <h2 class="sec-title">Имате нужда от помощ?</h2>
          </div>
        </div>
        @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                      <strong>{{ $message }}</strong>
                  </div>
              @endif

        {!! NoCaptcha::renderJs() !!}
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <form action="{{route('contactPost')}}" method="POST" class="contact-form ajax-contact">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="name" id="name" placeholder="{!!$contactsetting->form_input_name!!}" />
                <i class="fal fa-user"></i>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="{!!$contactsetting->form_input_email!!}" />
                <i class="fal fa-envelope"></i>
              </div>
              <div class="form-group col-md-6">
                <input type="phone" class="form-control" name="phone" id="phone" placeholder="{!!$contactsetting->form_input_budget!!}"" />
                <i class="fal fa-phone"></i>
              </div>
              <div class="form-group col-12">
                <textarea
                  name="message"
                  id="message"
                  cols="30"
                  rows="3"
                  class="form-control"
                  placeholder="{!!$contactsetting->form_message!!}"
                ></textarea>
                <i class="fal fa-comment"></i>
              </div>
              {!! NoCaptcha::display() !!}

                @if ($errors->has('g-recaptcha-response'))
                  <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                @endif
              <div class="form-btn col-12 mt-10 text-center"><button class="as-btn">{!!$contactsetting->button_text!!}</button></div>
            </div>
            <p class="form-messages mb-0 mt-3"></p>
          </form>
        </div>
      </div>
    </div>
    <div class="body-shape1"><img src="assets/img/shape/road_shape_1.png" alt="shape" /></div>
  </section>
  <div class="map-sec">
    {!!$contactsetting->iframe_txt!!}
  </div>




@endsection

