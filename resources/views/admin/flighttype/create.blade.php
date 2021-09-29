@extends('admin/app')
@section('content')
<div class="col-md-10 box">
    <div class="box-header with-border">
        <h3 class="box-title">Flight Type</h3>
    </div>
    <!-- /.box-header -->
        <div class="box-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('flighttype.store')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="flight_type" class="col-sm-3 control-label">Flight Type</label>

                                        <div class="col-sm-4">
                                            <input name="flight_type" id="flight_type" type="text" class="form-control" value="{{old('name')}}" />
                                        </div>
                                        <div class="col-md-4 err-msg"></div>
                                    </div>
                                    <div class="form-group">
                                            <label for="category" class="col-sm-3 control-label">Flight Category</label>
                                            <div class="col-sm-6 col-md-4">
                                        <select class="form-control" id="category" name="category">
                                            <option value=" ">Select Flight Category</option>
                                            <option value="1">Wide Body</option>
                                            <option value="2">Narrow Body</option>
                                        </select>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                    <center><button type="submit" class="btn btn-info pull-right">Save</button></center>

                                </div>
                        </div>
                </form>
        </div>
    <!-- /.box-body -->
    </div>


@endsection
