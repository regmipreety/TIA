@extends('admin/app')
@section('content')
    <!-- Default box -->
    <div class="col-md-10 box">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $result['page_header'] }}</h3>
        </div>
        <div class="box-body">
            <form method="GET" action="{{ route('role-access.index') }}" class="form-horizontal">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="group">Select Group Name</label>
                        <select name="group_id" id="group_id" class="form-control">
                            @foreach($result['grouplist'] as $grp)
                                {{-- <option value="{{ $grp->id }}" @if( $grp->id == $_REQUEST['group_id']) selected @endif >{{ $grp->title }}</option> --}}
                                <option value="{{ $grp->id }}" <?php echo (isset($_REQUEST['group_id']) && $_REQUEST['group_id'] == $grp->id )?'selected':''; ?> >{{ $grp->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Filter</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
            @if(isset($result['list']))
                <div class="table-responsive">
                    <table class="table  table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Module</th>
                            <th>Read?</th>
                            <th>Write?</th>
                            <th>Edit?</th>
                            <th>Delete?</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($result['list']))
                                <?php $i = 1; ?>
                                @foreach($result['list'] as $menu)
                                    <tr>
                                        <td>{{ $i }}. {{ $menu->menu_name }}</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" data-toggle="toggle"
                                                           data-size="mini"
                                                           class="read"
                                                           {{ ($menu->allow_view == 1)?'checked':null }}
                                                           value="{{$menu->group_role_id}}">
                                                </label>
                                            </div>
                                        </td>
                                        <td><!-- Rounded switch -->
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" data-toggle="toggle"
                                                           data-size="mini"
                                                           {{ ($menu->allow_add == 1)?'checked':null }}
                                                           class="write"
                                                           value="{{$menu->group_role_id}}">
                                                </label>
                                            </div>
                                        </td>
                                        <td><!-- Rounded switch -->
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" data-toggle="toggle"
                                                           data-size="mini"
                                                           {{ ($menu->allow_edit == 1)?'checked':null }}
                                                           class="edit"
                                                           value="{{ $menu->group_role_id }}">
                                                </label>
                                            </div>
                                        </td>
                                        <td><!-- Rounded switch -->
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" data-toggle="toggle"
                                                           data-size="mini"
                                                           {{ ($menu->allow_delete == 1)?'checked':null }}
                                                           class="delete"
                                                           value="{{$menu->group_role_id}}">
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        $secondLevelMenus = App\Model\admin\AdminRoleAccess::getAccessMenu($menu->id,Request::get('group_id'));
                                        $j = 1;
                                    ?>
                                    @if(count($secondLevelMenus) > 0)
                                        @foreach($secondLevelMenus as $secondLevelMenu)
                                            <tr>
                                                <td><p style="padding-left: 15px;">{{ $i.'.'.$j++ }}
                                                        . {{ $secondLevelMenu->menu_name }}</p></td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" data-toggle="toggle"
                                                                   data-size="mini"
                                                                   {{ ($secondLevelMenu->allow_view == 1)?'checked':null }}
                                                                   class="read"
                                                                   value="{{$secondLevelMenu->group_role_id}}">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><!-- Rounded switch -->
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" data-toggle="toggle"
                                                                   data-size="mini"
                                                                   {{ ($secondLevelMenu->allow_add == 1)?'checked':null }}
                                                                   class="write"
                                                                   value="{{$secondLevelMenu->group_role_id}}">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><!-- Rounded switch -->
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" data-toggle="toggle"
                                                                   data-size="mini"
                                                                   {{ ($secondLevelMenu->allow_edit == 1)?'checked':null }}
                                                                   class="edit"
                                                                   value="{{ $secondLevelMenu->group_role_id }}">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><!-- Rounded switch -->
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" data-toggle="toggle"
                                                                   data-size="mini"
                                                                   {{ ($secondLevelMenu->allow_delete == 1)?'checked':null }}
                                                                   class="delete"
                                                                   value="{{$secondLevelMenu->group_role_id}}">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <?php $i++; ?>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @else
                <div class="callout callout-info">
                    Please select the group name from above drop down menu.
                </div>
            @endif
        </div>
    </div>
<div class="clearfix"></div>
@endsection
