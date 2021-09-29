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
            <form class="form-horizontal" method="POST" action="{{ route('bay.update',$bay->id)}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="bay_number" class="col-sm-3 control-label">Bay Number</label>

                                <div class="col-sm-2">
                                    <select id="bay_number" name="bay_number" class="js-select2 col-sm-12">
                                        <option value=" ">Select</option>
                                        @foreach($baylist as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $bay->bay_number) selected @endif> {{ $item->bay_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 err-msg"></div>
                            </div>
                            <div class="form-group">
                                <label for="eta" class="col-sm-3 control-label">ETA</label>

                                <div class="col-sm-2">
                                    <input name="eta" id="eta" type="text" class="form-control" value="{{ $bay->eta }}"/>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="etd" class="col-sm-3 control-label">ETD</label>

                                <div class="col-sm-2">
                                    <input name="etd" id="etd" type="text" class="form-control" value="{{ $bay->etd }}"/>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="flight_type" class="col-sm-3 control-label">Flight Type</label>

                                <div class="col-sm-2">
                                    <select id="flight_type" name="flight_type" class="js-select2 col-sm-12">
                                        <option value=" ">Select</option>
                                        @foreach($flighttype as $item)
                                            <option value="{{ $item->flight_type }}" @if($item->flight_type == $bay->flight_type) 'selected' @endif> {{ $item->flight_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="operation_date" class="col-sm-3 control-label">Date</label>

                                <div class="col-sm-2">
                                    <input name="operation_date" id="operation_date" type="text" class="form-control" value="{{ $bay->operation_date }}"/>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="days" class="col-sm-3 control-label">Days</label>

                                <div class="col-sm-2">
                                    <input name="days" id="etd" type="text" class="form-control" value="{{ $bay->days }}"/> (note: 1 for monday)
                                </div>
                                <div class="col-md-4"></div>
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
    <script>
    $('#operation_date').datepicker({
        autoclose: true,
                dateFormat: 'yy-m-d'
        });
    $(".js-select2").select2({});
    </script>
@endsection
