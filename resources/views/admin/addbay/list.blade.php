@extends('admin/app')
@section('content')
<div class="col-md-10 box">
    <div class="box-header with-border">
        <h3>Bay Type:</h3>
        @if(Session::has('status'))
        <div class="callout callout-success alert-box success">
            <h5>{{ Session::get('status') }}</h5>
        </div>
        @endif
        <h3 class="box-title">
            <a href="{{route('addbay.create')}}">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Bay
               </a>
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="table" class="datatable table-bordered table-striped">
        <thead>
        <tr>
                <th width="84px">#</th>
                <th>Bay</th>
                <th>Type</th>
                <th width="120">Actions</th>
        </tr>
        </thead>
        <tbody id="sortable">
            @foreach($bay as $val=>$item)
            <tr class="row1">
                <td>{{ $val+1 }}</td>
                <td>{{ $item->bay_no }}</td>
                <td>
                    @if($item->flight_type==1)
                        Wide Body
                    @else
                        Narrow Body
                    @endif
                </td>
                <td>
                    <a href="{{ route('addbay.edit',$item->id)}}"> <i class="fas fa-edit"></i></a>
                    <a href="{{ route('addbay.delete',$item->id)}}"  onclick="return confirm('Are you sure?')"> <i class="fas fa-times fabsize"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>

        </table>
    </div>
    <!-- /.box-body -->
    </div><Style>
        .fa-check-circle{
            color:green;
            font-size: 20px;
        }
        .fa-times-circle{
            color:red;
            font-size: 20px;
        }
        .fabsize{
            font-size: 18px;
        }
    </Style>
<script>
        $(function () {
            $('#example').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })
        })
</script>
<script>
$(document).ready(function(){
    $('#table').DataTable();

});
</script>
@endsection
