@extends('admin/app')
@section('content')
<script src="{{ asset('admin/js/graphdownload.js')}}"></script>
<div class="col-md-10 box">
    <div class="box-header with-border">
        <h3>Bay:</h3>
        @if(Session::has('status'))
        <div class="callout callout-success alert-box success">
            <h5>{{ Session::get('status') }}</h5>
        </div>
        @endif
        <div class="col-md-6">
            <h3 class="box-title">
                <a href="{{route('bay.create')}}">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Bay
                </a>
            </h3>
        </div>
        <div class="col-md-6">
            <input type="text" id="date" autocomplete="off">
        <button type="submit" id="search" class="btn btn-org">Search <i class="fa fa-search"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="bay-chart">
            @include('admin.bay.ajax_bay')
        </div>
    </div>
    <!-- /.box-body -->
    </div>
    <div class="clearfix"></div>
    <Style>
      #chartdiv {
  width: 100%;
  height: 500px;
}
</Style>
<script type="text/javascript">
 $('#date').datepicker({
        autoclose: true,
                dateFormat: 'yy-m-d'
        });

	$(document).ready(function() {

		$("#search").on('click',function() {
			$date=$('#date').val();
		$.ajax({
				url:'{{url('/searchbay')}}',
				type: 'GET',
				data : {'date':$date},

				success: function( data ) {
					$('#bay-chart').html(data);
				},
				error: function() {
					console.log('error');
				}
		   });
	  });

	});
</script>
@endsection
