@extends('layouts.front')

@section('title')
    {{ $project->meta_title }}
@endsection
@section('meta')
    {{ $project->meta_description }}
@endsection

@section('styles')
    <link href="{{ asset('css/front/magnific.min.css') }}" type="text/css" rel="stylesheet">
@endsection

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="assets/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Детайли за проекта</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{{ route('home') }}">Начало</a></li>
                        <li>Детайли</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-40">
                        <img class="w-100"
                            src="{{ $project->photo ? '/images/media/' . $project->photo->file : '/img/200x200.png' }}"
                            alt="{{ $project->title }}" />
                    </div>
                    <h3 class="single-title">{{ $project->title }}</h3>
                    <div class="project-content">
                        {!! $project->body !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_project_info">
                            <h4 class="widget_title">Детайли</h4>
                            <div class="project-info-wrap">
                                @if (!empty($project->client))
                                    <div class="project-info">
                                        <div class="project-info_icon"><i class="fas fa-user"></i></div>
                                        <div class="project-info_content">
                                            <p class="project-info_text">Марка:</p>
                                            <h6 class="project-info_title">{{ $project->client }}</h6>
                                        </div>
                                    </div>
                                @endif
                                <div class="project-info">
                                    <div class="project-info_icon"><i class="fas fa-layer-group"></i></div>
                                    <div class="project-info_content">
                                        <p class="project-info_text">Категория:</p>
                                        <h6 class="project-info_title">{{ $project->project_category->name }}</h6>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <div class="project-info_icon"><i class="fas fa-calendar-days"></i></div>
                                    <div class="project-info_content">
                                        <p class="project-info_text">Срок:</p>
                                        <h6 class="project-info_title">{{ $project->date }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
