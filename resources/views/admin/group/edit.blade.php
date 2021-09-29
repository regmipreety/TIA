@extends('admin/app')

@section('content')
<?php $record = $result['record']; ?>
    <!-- Default box -->
    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
        <div class="col-md-10 box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $result['page_header'] }}</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed dataTable">
                        <thead class="bg-primary">
                            <tr>
                                <th>S.No</th>
                                <th>Ttile</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($result['list'] as $item)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td class="center-align">
                                    @if ($item->status == '1')
                                        <img src="{{ asset('admin/images/tick.png') }} ">
                                    @else
                                        <img src="{{ asset('admin/images/notick.png') }}">
                                    @endif
                                </td>
                                <td width="100px" class="center-align">
                                    <a href="{{ route('usergroup.edit', $item->id) }}">Edit </a>&nbsp; | &nbsp; 
                                    <a href="{{ route('usergroup.delete', $item->id) }}" onclick=" return confirm('Are You Sure ???');">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
        <div class="col-md-10 box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Group User</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="POST" action="{{ route('usergroup.update', $record->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $record->title }}" >
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $record->description }}" >
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="statusid" class="form-control">
                                <option value="1" <?= isset($record->status) && ($record->status == '1')? 'selected' : '' ?> >Publish</option>
                                <option value="0" <?= isset($record->status) && ($record->status == '0')? 'selected' : '' ?> >UnPublish</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection