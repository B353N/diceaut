@extends('layouts.front')


@section('title')
    {{ $portfoliosettings->meta_title }}
@endsection
@section('meta')
    {{ $portfoliosettings->meta_description }}
@endsection


@section('content')
    <div class="breadcumb-wrapper" data-bg-src="assets/img/breadcumb/breadcumb-bg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Портфолио</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="{{ route('home') }}">Начало</a></li>
                        <li>Нашите проекти</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-smoke space">
        <div class="container">
            <div class="row gy-30">
                @foreach ($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-grid">
                            <div class="service-grid_img"><img
                                    src="{{ $project->photo ? '/images/media/' . $project->photo->file : '/img/200x200.png' }}"
                                    alt="{{ $project->title }}" /></div>
                            <div class="service-grid_content">
                                <h3 class="service-grid_title"><a
                                        href="{{ URL::to('/') }}/project/{{ $project->slug }}">{{ $project->title }}</a>
                                </h3>
                                <p class="service-grid_text">
                                    {{ $project->meta_description }}
                                </p>
                                <a href="{{ URL::to('/') }}/project/{{ $project->slug }}" class="as-btn">Виж проекта</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection





@section('scripts')
    <script>
        const filters = document.querySelectorAll('.filter');

        filters.forEach(filter => {

            filter.addEventListener('click', function() {

                var liElements = document.querySelectorAll(".portfolio-section-filters span.filter.active");
                if (liElements.length > 0) {
                    liElements[0].classList.remove("active");
                }

                filter.classList.add("active");

                let selectedFilter = filter.getAttribute('data-filter');

                let itemsToHide = document.querySelectorAll(
                    `.projects .project:not([data-filter='${selectedFilter}'])`);
                let itemsToShow = document.querySelectorAll(`.projects [data-filter='${selectedFilter}']`);

                if (selectedFilter == 'all') {
                    itemsToHide = [];
                    itemsToShow = document.querySelectorAll('.projects [data-filter]');
                }

                itemsToHide.forEach(el => {
                    el.classList.add('hide');
                    el.classList.remove('show');
                });

                itemsToShow.forEach(el => {
                    el.classList.remove('hide');
                    el.classList.add('show');
                });

            });
        });
    </script>
@endsection
