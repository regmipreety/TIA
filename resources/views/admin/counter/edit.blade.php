@extends('admin/app')
@section('content')
<div class="col-md-10 box">
    <div class="box-header with-border">
        <h3 class="box-title">Counter</h3>
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
            <form class="form-horizontal" method="POST" action="{{ route('counter.update',$counter->id)}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="counter_number" class="col-sm-3 control-label">Counter</label>

                                <div class="col-sm-2">
                                    <input name="counter_number" id="counter_number" type="text" class="form-control" value="{{ $counter->counter_number }}" />
                                </div>
                                <div class="col-md-4 err-msg"></div>
                            </div>
                            <div class="form-group">
                                <label for="eta" class="col-sm-3 control-label">ETA</label>

                                <div class="col-sm-2">
                                    <input name="eta" id="eta" type="text" class="form-control" value="{{ $counter->eta }}"/>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="etd" class="col-sm-3 control-label">ETD</label>

                                <div class="col-sm-2">
                                    <input name="etd" id="etd" type="text" class="form-control" value="{{ $counter->etd }}"/>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="flight_type" class="col-sm-3 control-label">Flight Type</label>

                                <div class="col-sm-2">
                                    <input name="flight_type" id="etd" type="text" class="form-control" value="{{ $counter->flight_type }}"/>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="airlines" class="col-sm-3 control-label">Airlines</label>

                                <div class="col-sm-2">
                                    <input name="airlines" id="etd" type="text" class="form-control" value="{{ $counter->airlines }}"/>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="flight_date" class="col-sm-3 control-label">Date</label>

                                <div class="col-sm-2">
                                    <input name="flight_date" id="flight_date" type="text" class="form-control" value="{{ $counter->flight_date }}"/>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group">
                                <label for="days" class="col-sm-3 control-label">Days</label>

                                <div class="col-sm-2">
                                    <input name="days" id="etd" type="text" class="form-control" value="{{ $counter->days }}"/>
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
    $('#flight_date').datepicker({
            autoclose: true,
                    dateFormat: 'yy-m-d'
            });
    </script>
@endsection
