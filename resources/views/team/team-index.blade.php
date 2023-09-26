@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ clean(trans('niva-backend.all_team'), ['Attr.EnableID' => true]) }}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ clean(trans('niva-backend.all_team'), ['Attr.EnableID' => true]) }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('home-setting.edit') . '?language=' . request()->input('language') }}"
                                class="btn btn-primary btn-back">{{ clean(trans('niva-backend.back_homepage'), ['Attr.EnableID' => true]) }}</a>
                            <a href="{{ route('team.create') . '?language=' . request()->input('language') }}"
                                class="btn btn-primary btn-back">{{ clean(trans('niva-backend.create_team'), ['Attr.EnableID' => true]) }}</a>
                        </div>

                        <div class="col-lg-6 text-right">
                            @if (!empty($langs))
                                <select name="language" class="form-control language-control"
                                    onchange="window.location='{{ url()->current() . '?language=' }}'+this.value">
                                    <option value="" selected disabled>
                                        {{ clean(trans('niva-backend.select_language'), ['Attr.EnableID' => true]) }}
                                    </option>
                                    @foreach ($langs as $lang)
                                        <option value="{{ $lang->code }}"
                                            {{ $lang->code == request()->input('language') ? 'selected' : '' }}>
                                            {{ $lang->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>



                    @if ($message = Session::get('team_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif



                    <form action="{{ route('delete.team') }}" method="POST" class="form-inline">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <select name="checkbox_array" id="" class="form-control">
                                <option value="">
                                    {{ clean(trans('niva-backend.delete'), ['Attr.EnableID' => true]) }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="delete_all" class="btn btn-primary">
                        </div>



                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="options"></th>
                                    <th>{{ clean(trans('niva-backend.photo'), ['Attr.EnableID' => true]) }}</th>
                                    <th>{{ clean(trans('niva-backend.team_name'), ['Attr.EnableID' => true]) }}</th>
                                    <th>{{ clean(trans('niva-backend.team_position'), ['Attr.EnableID' => true]) }}
                                    </th>
                                    <th>{{ clean(trans('niva-backend.team_facebook'), ['Attr.EnableID' => true]) }}
                                    </th>
                                    <th>{{ clean(trans('niva-backend.team_instagram'), ['Attr.EnableID' => true]) }}
                                    </th>
                                    <th>{{ clean(trans('niva-backend.team_linkedin'), ['Attr.EnableID' => true]) }}
                                    </th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><input type="checkbox" id="options1"></th>
                                    <th>{{ clean(trans('niva-backend.photo'), ['Attr.EnableID' => true]) }}</th>
                                    <th>{{ clean(trans('niva-backend.team_name'), ['Attr.EnableID' => true]) }}</th>
                                    <th>{{ clean(trans('niva-backend.team_position'), ['Attr.EnableID' => true]) }}
                                    </th>
                                    <th>{{ clean(trans('niva-backend.team_facebook'), ['Attr.EnableID' => true]) }}
                                    </th>
                                    <th>{{ clean(trans('niva-backend.team_instagram'), ['Attr.EnableID' => true]) }}
                                    </th>
                                    <th>{{ clean(trans('niva-backend.team_linkedin'), ['Attr.EnableID' => true]) }}
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if ($team)
                                    @foreach ($team as $key => $teams)
                                        <tr>
                                            <td><input class="checkboxes" type="checkbox" name="checkbox_array[]"
                                                    value="{{ $teams->id }}"></td>
                                            <td><img height="100"
                                                    src="{{ $teams->photo ? '/images/media/' . $teams->photo->file : '/public/img/200x200.png' }}"
                                                    alt="">
                                                <p class="mb-0 mt-2"><a
                                                        href="{{ route('team.edit', $teams->id) . '?language=' . request()->input('language') }}">{{ clean(trans('niva-backend.edit'), ['Attr.EnableID' => true]) }}</a>
                                                </p>
                                            </td>

                                            <td data-label="link">{!! $teams->name !!}</td>
                                            <td data-label="link">{{ $teams->position }}</td>
                                            <td data-label="link">{{ $teams->facebook }}</td>
                                            <td data-label="link">{{ $teams->instagram }}</td>
                                            <td data-label="link">{{ $teams->linkedin }}</td>
                                        </tr>
                                    @endforeach
                                @endif



                            </tbody>
                        </table>

                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@stop
