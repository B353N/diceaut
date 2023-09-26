

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.create_team') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.create_team') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('team.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_team') , array('Attr.EnableID' => true))}}</a>


                @if ($message = Session::get('team_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @include('includes.form-errors')

                <div class="row">
                    <div class="col-md-12">

                        <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">





                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.team_name') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="name" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.team_position') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="position" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.team_facebook') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="facebook" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.team_instagram') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="instagram" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.team_linkedin') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="linkedin" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.select_language') , array('Attr.EnableID' => true))}}</strong>
                                                <select name="language_id" id="language_id" class="form-control">
                                                    @foreach($langs as $lang)
                                                        <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                            </div>
                                        </div>

                                    </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.create_team') , array('Attr.EnableID' => true))}}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
