@extends('admin/app')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">List of Admin User</h3>
      <span class="pull-right"><a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;  Add New </a></span>
    </div>
    <div class="box-body">
    	<table class="table table-hover table-responsive table-condensed dataTable">
    		<thead class="bg-primary">
    			<tr>
    				<th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="center-align">Mobile No</th>
                    <th class="center-align">Created Date</th>
                    {{-- <th class="center-align">Admin Roles</th> --}}
                    <th class="center-align">Status</th>
                    <th class="center-align">Action</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php $count = 1; ?>
                @foreach ($result['userlist'] as $item)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="center-align">{{ $item->mobileno }}</td>
                    <td class="center-align">{{ $item->created_at }}</td>
                    {{-- <td class="center-align">{{ $item->title }}</td> --}}
                    <td class="center-align">
                    	@if ($item->status == '1')
                            <img src="{{ asset('/admin/images/tick.png') }} ">
                        @else
                            <img src="{{ asset('/admin/images/notick.png') }}">
                        @endif
					</td>
                    <td width="100px" class="center-align">
                        <a href="{{ route('user.edit',$item->id) }}">Edit </a>
                            <a href="{{ route('user.delete', $item->id) }}" onclick=" return confirm('Are You Sure ???');">&nbsp; | &nbsp; Delete</a>
                    </td>
                </tr>
                @endforeach
    		</tbody>
    	</table>
    </div>
  </div>
</div>
<div class="clearfix"></div>

@endsection
