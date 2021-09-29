@extends('admin/app')
@section('content')
<div class="col-md-10 box">
    <div class="box-header with-border">
        <h3>Find Available Bay:</h3>
        @if(Session::has('status'))
        <div class="callout callout-success alert-box success">
            <h5>{{ Session::get('status') }}</h5>
        </div>
        @endif
    <div class="col-md-12" id="datetimeform">
        <form action="{{route('findbay')}}" method="POST">
                {{ csrf_field() }}
            <label>Date:&nbsp; &nbsp; </label>    <input type="text" id="date" name="date" autocomplete="off">&nbsp; &nbsp;
            <label>ETA Time:&nbsp; &nbsp; </label>    <input type="text" class="timepicker" name="etatime" id="start-Time" autocomplete="off">&nbsp; &nbsp;
            <label>ETD Time:&nbsp; &nbsp; </label>    <input type="text" class="timepicker" name="etdtime" autocomplete="off" id="end-Time">&nbsp; &nbsp;
            <button type="submit" id="search" class="btn btn-org">Search <i class="fa fa-search"></i>&nbsp; &nbsp; </button>
        </form>
    </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="table" class="datatable table-bordered table-striped">
        <thead>
        <tr>
                <th>Bay</th>
                <th>Flight Type</th>
                <th>ETA</th>
                <th>ETD</th>
                <th>Flight Date</th>
        </tr>
        </thead>
        <tbody >
            @if(isset($bay))
            @foreach($bay as $item)
            @if(isset($item))
            <tr class="row1">
                <td class="details-control">{{$item}}</td>
                <td></td>
                <td>{{$eta}}</td>
                <td>{{$etd}}</td>
                <td>{{ $date }}</td>
            </tr>
            @endif
            @endforeach
            @endif
        </tbody>

        </table>
    </div>
    <!-- /.box-body -->
    </div>
    <script type="text/javascript">

$(document).ready(function(){
    $('#table').DataTable();
});
    $('#date').datepicker({
        autoclose: true,
                dateFormat: 'yy-m-d'
        });

    $('.timepicker').timepicker({
    timeFormat: 'H:mm ',
    interval: 60,
    minTime: '1',
    maxTime: '11:00pm',
    startTime: '1:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
    $('#search').on('click',function(){
        var startDate = new Date("November 13, 2013 " + $('#start-Time').val());
         var endDate = new Date("November 13, 2013 " + $('#end-Time').val());

    if (startDate.getTime() >= endDate.getTime()){
    $("#datetimeform").after('<span class="error" style="color:red"><br>Start-time must be smaller then End-time.</span>');
        return false;
 }


    });
</script>
    @endsection
