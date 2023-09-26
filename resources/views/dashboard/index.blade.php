@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ clean(trans('niva-backend.dashboard'), ['Attr.EnableID' => true]) }}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4 dashboard-page">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ clean(trans('niva-backend.dashboard'), ['Attr.EnableID' => true]) }}</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ clean(trans('niva-backend.blog'), ['Attr.EnableID' => true]) }}</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $post_number }}
                                            {{ clean(trans('niva-backend.posts'), ['Attr.EnableID' => true]) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ clean(trans('niva-backend.projects'), ['Attr.EnableID' => true]) }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $project_number }}
                                            {{ clean(trans('niva-backend.projects'), ['Attr.EnableID' => true]) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ clean(trans('niva-backend.what_we_do'), ['Attr.EnableID' => true]) }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $service_number }}
                                            {{ clean(trans('niva-backend.services'), ['Attr.EnableID' => true]) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ clean(trans('niva-backend.feedback'), ['Attr.EnableID' => true]) }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $testimonial_number }}
                                            {{ clean(trans('niva-backend.testimonials'), ['Attr.EnableID' => true]) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ clean(trans('niva-backend.our_team'), ['Attr.EnableID' => true]) }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $member_number }}
                                            {{ clean(trans('niva-backend.members'), ['Attr.EnableID' => true]) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ clean(trans('niva-backend.our_clients'), ['Attr.EnableID' => true]) }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $client_number }}
                                            {{ clean(trans('niva-backend.clients'), ['Attr.EnableID' => true]) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>
    <style>
        .chosen-container {
            width: 170px !important;
        }
    </style>
    <script>
        // initialize your calendar, once the page's DOM is ready
        $(document).ready(function() {
            $('.calendar').evoCalendar({
                language: 'ie',
                todayHighlight: 'true',
                calendarEvents: [{
                        name: "Event Test",
                        date: "July/08/2023",
                        type: "event",
                        everyYear: "true",
                        color: "#63d867"
                    },
                    {
                        name: "Event Name Two",
                        date: "February/14/2021",
                        type: "event1",
                        everyYear: "true",
                        color: "#63d867"
                    }
                ]
            })
        })
    </script>
@stop
