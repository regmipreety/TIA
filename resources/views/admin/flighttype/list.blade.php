@extends('admin/app')
@section('content')
<div class="col-md-10 box">
    <div class="box-header with-border">
        <h3>Flight Type:</h3>
        @if(Session::has('status'))
        <div class="callout callout-success alert-box success">
            <h5>{{ Session::get('status') }}</h5>
        </div>
        @endif
        <h3 class="box-title">
            <a href="{{route('flighttype.create')}}">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Flight Type
               </a>
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="table" class="datatable table-bordered table-striped">
        <thead>
        <tr>
                <th width="84px">#</th>
                <th>Flight Type</th>
                <th>Flight Category</th>
                <th width="120">Actions</th>
        </tr>
        </thead>
        <tbody id="sortable">
            @foreach($flighttype as $val=>$item)
            <tr class="row1">
                <td>{{ $val+1 }}</td>
                <td>{{ $item->flight_type }}</td>
                <td>
                    @if($item->category==1)
                        Wide Body
                    @else
                        Narrow Body
                    @endif
                </td>
                <td>
                    <a href="{{ route('flighttype.edit',$item->id)}}"> <i class="fas fa-edit"></i></a>
                    <a href="{{ route('flighttype.delete',$item->id)}}"  onclick="return confirm('Are you sure?')"> <i class="fas fa-times fabsize"></i></a>
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

$(".category_status").on("click",function(){
    var Id = $(this).data('id');
    var url = '{{ url("/changecategorystatus") }}';
    var status =$(this).data('status');
    $.ajax({
            url: url,
            type: 'get',
            data :{ id: Id,
                  status:status
              },
                //dataType: "json",
                error: function(){
                alert('Error while changing state.');
                },
                success: function(state){
                if (state == 'publish'){
                    $('.chstatus_'+Id).addClass('fa-check-circle');
                    $('.chstatus_'+Id).removeClass('fa-times-circle');
                    $('.chstatus_'+Id).data('status','1')
                } else if (state == 'unpublish'){
                    $('.chstatus_'+Id).addClass('fa-times-circle');
                    $('.chstatus_'+Id).removeClass('fa-check-circle');
                    $('.chstatus_'+Id).data('status','0')
                } else{
                alert('Error while changing state.');
                }
                }
        });
});

});
</script>
@endsection
