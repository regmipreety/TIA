@extends('admin/app')
@section('content')
<div class="col-md-10 box">
    <div class="box-header with-border">
        <h3>Counter:</h3>
        @if(Session::has('status'))
        <div class="callout callout-success alert-box success">
            <h5>{{ Session::get('status') }}</h5>
        </div>
        @endif

        <h3 class="box-title">
            <a href="{{route('counter.create')}}">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Counter
            </a>
        </h3>
    <center><h3><b>Date: {{ $date }}, {{ $day }}</b></h3></center>
    <div class="col-md-6">
        <form action="{{route('countersearch')}}" method="GET">

            <label>Date:</label>    <input type="text" id="date" name="date" autocomplete="off">
            <button type="submit" id="search" class="btn btn-org">Search <i class="fa fa-search"></i></button>
        </form>
    </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="table" class="datatable table-bordered table-striped">
        <thead>
        <tr>
                <th>Counter</th>
                <th>ETA</th>
                <th>ETD</th>
                <th>Airlines</th>
                <th>Flight Date</th>
                <th width="120">Actions</th>
        </tr>
        </thead>
        <tbody >
            @foreach($counter as $val=>$item)
            <tr class="row1">
                <td class="details-control" data-counter="{{ $item->counter_number}}" data-date="{{ $item->flight_date }}">Counter &nbsp;{{ $item->counter_number }} &nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $item->flight_date }}</td>
                <td></td>
            </tr>
            @endforeach

        </tbody>

        </table>
    </div>
    <!-- /.box-body -->
    </div>
    <style>
    td.details-control {
    background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
}
</style>
<script type="text/javascript">

    $('#date').datepicker({
        autoclose: true,
                dateFormat: 'yy-m-d'
        });

    function format ( d ) {
        var url = '{{ url("/counterdetail") }}';
        var val;
        var tr="";
    $.ajax({
            url: url,
            type: 'get',
            async: false,
            data :{ counter: counter,
                  date:date
              },
                //dataType: "json",
                error: function(){
                },
                success: function(data){

                    for(var i=0; i<data.length; i++){
                        var editurl = "{{route('counter.edit',":id")}}";
                        editurl = editurl.replace(':id', data[i].id);
                        var deleteurl = "{{route('counter.delete',":id")}}";
                        deleteurl = deleteurl.replace(':id', data[i].id);
                    val =  '<tr>'+
                                '<td>Counter '+data[i].counter_number+'</td>'+
                                '<td>'+data[i].eta+'</td><td>'+
                                        data[i].etd
                                +'</td><td>'+data[i].airlines+'</td><td>'+data[i].flight_date+'</td><td>'+
                                '<a href="'+editurl+'"> <i class="fas fa-edit"></i></a>'+
                    '<a onclick="return confirm("Are you sure?");" href="'+deleteurl+'"> <i class="fas fa-times fabsize"></i></a>'+'</td></tr>';
                    tr=tr+val;
                    }
            }

        });
        return '<table id="countertable" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<thead><th>Counter</th><th>ETA</th><th>ETD</th><th>Airlines</th><th>Fllight Date</th><th>Action</th></thead>'+'<tbody>'+tr +'</tbody>'+
    '</table>';

    }
        $(document).ready(function () {

            var table = $('#table').DataTable();
            $('#table tbody').on('click', 'td:first-child', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if (row.child.isShown()) {
                // This row is already open - close it.
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open row.
                counter = $(this).data('counter');
                date = $(this).data('date');
                row.child(format(counter,date)).show();
                tr.addClass('shown');
                $("#countertable").dataTable({
                    "ordering": false,
                    "paging": false,
                    "searching": false,
                    "destroy": true
                });

            }
            });
        })
</script>

@endsection
