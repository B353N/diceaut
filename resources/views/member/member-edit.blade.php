@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ clean(trans('niva-backend.edit_member'), ['Attr.EnableID' => true]) }}
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ clean(trans('niva-backend.edit_member'), ['Attr.EnableID' => true]) }}</h6>
            </div>
            <div class="card-body">

                <a href="{{ route('member.index') }}"
                    class="btn btn-primary btn-back">{{ clean(trans('niva-backend.back_members'), ['Attr.EnableID' => true]) }}</a>


                @if ($message = Session::get('member_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @include('includes.form-errors')

                <div class="row">

                    <div class="col-md-12">

                        <form action="{{ route('member.update', $member->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{ clean(trans('niva-backend.name'), ['Attr.EnableID' => true]) }}</strong>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $member->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{ clean(trans('niva-backend.position'), ['Attr.EnableID' => true]) }}</strong>
                                                <input type="text" name="position" class="form-control"
                                                    value="{{ $member->position }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{ clean(trans('niva-backend.facebook'), ['Attr.EnableID' => true]) }}</strong>
                                                <input type="text" name="facebook" class="form-control"
                                                    value="{{ $member->facebook }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{ clean(trans('niva-backend.twitter'), ['Attr.EnableID' => true]) }}</strong>
                                                <input type="text" name="twitter" class="form-control"
                                                    value="{{ $member->twitter }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{ clean(trans('niva-backend.linkedin'), ['Attr.EnableID' => true]) }}</strong>
                                                <input type="text" name="linkedin" class="form-control"
                                                    value="{{ $member->linkedin }}">
                                            </div>
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <img class="img-fluid pb-4" width="100" height="100"
                                            src="{{ $member->photo ? '/images/media/' . $member->photo->file : '/public/img/200x200.png' }}">
                                        <p><strong>{{ clean(trans('niva-backend.photo'), ['Attr.EnableID' => true]) }}</strong>
                                        </p>
                                        <input type="file" name="photo_id" class="form-control-file" id="photo_id">
                                    </div>


                                </div>




                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit"
                                        class="btn btn-primary">{{ clean(trans('niva-backend.update'), ['Attr.EnableID' => true]) }}</button>
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
