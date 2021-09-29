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
            <form class="form-horizontal" method="POST" action="{{ route('addbay.store')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="bay_number" class="col-sm-3 control-label">Bay Number</label>

                                <div class="col-sm-2">
                                    <input name="bay_no" id="bay_no" type="text" class="form-control" value="{{old('bay_no')}}" />
                                </div>
                                <div class="col-md-4 err-msg"></div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="flight_type" class="col-sm-3 control-label">Flight Type</label>
                                <div class="col-sm-2">
                                    
                                     <select id="flight_type" name="flight_type" class="col-sm-12">
                                        <option value="1">Wide Body</option>
                                        <option value="2">Narrow Body</option>
                                       
                                    </select>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                    </div>
                </div>
            </form>
        </div>
    <!-- /.box-body -->
    </div>
   
@endsection
