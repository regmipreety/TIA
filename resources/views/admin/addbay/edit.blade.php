@extends('admin/app')
@section('content')
<div class="col-md-10 box">
    <div class="box-header with-border">
        <h3 class="box-title">Bay</h3>
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
                <form class="form-horizontal" method="POST" action="{{ route('addbay.update',$bay->id)}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="bay" class="col-sm-3 control-label">Bay</label>

                                        <div class="col-sm-4">
                                            <input name="bay_no" id="bay" type="text" class="form-control" value="{{$bay->bay_no}}" />
                                        </div>
                                        <div class="col-md-4 err-msg"></div>
                                    </div>
                                    <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Flight Type</label>
                                            <div class="col-sm-6 col-md-4">
                                        <select class="form-control" id="flight_type" name="flight_type">
                                            <option value="1" @if($bay->flight_type==1) selected @endif>
                                                    Wide Body</option>
                                            <option value="0" @if($bay->flight_type==2) selected @endif>
                                                    Narrow Body</option>
                                        </select>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                    <button type="submit" class="btn btn-info pull-right">Update</button>
                                </div>
                        </div>
                </form>
        </div>
    <!-- /.box-body -->
    </div>
@endsection
