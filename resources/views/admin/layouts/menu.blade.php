
<?php $url = Request::segment(1); $nxturl =explode('/', Request::url()); ?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="<?php echo ($url == 'dashboard')?'active':''; ?>"">
      <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
    </li>
    @if(auth::user()->user_group_id==4)
      <li class="<?php echo ($url == 'user')?'active':''; ?>">
        <a href="{{ route('user.list') }}"><i class="fa fa-th"></i> <span>User List</span></a>
      </li>
      @endif
    <?php
      $firstlevelmenu = App\Model\admin\AdminMenu::getMenu($id = 0);
      $menus = App\Model\admin\AdminMenu::getAllMenus();
    ?>
    @if(count($firstlevelmenu)>0)
      @foreach($menus as $menu)

          @if($menu->parent_id == 0)
              <?php $secondLevelMenus = App\Model\admin\AdminMenu::getMenu($menu->id); ?>
              @if(count($secondLevelMenus)>0)
                <li class="treeview <?php
                  foreach($secondLevelMenus as $secondLevelMenu) {
                    $urlx = route($secondLevelMenu->menu_link);
                    $lasturl = explode('/',$urlx);
                    echo ($url == end($lasturl))?'active':'';
                  }
                ?>">
                  <a href="#">
                    <i class="{{ $menu->style }}"></i>&nbsp;
                    <span>{{ $menu->menu_name }}</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                    <ul class="treeview-menu">
                        @foreach($secondLevelMenus as $secondLevelMenu)
                            <li class="<?php
                            $urlx = route($secondLevelMenu->menu_link);
                            $lasturl = explode('/',$urlx);
                            if(end($nxturl)==end($lasturl)){
                                echo ($url == $lasturl[3])?'active':'';

                            }
                            ?>">
                              <a href="{{ route("$secondLevelMenu->menu_link") }}" ><i class="{{ $secondLevelMenu->style }}"></i>
                                &nbsp;{{ $secondLevelMenu->menu_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
              @else
                  <li>
                      {{-- <a href="{{ route($menu->menu_link) }}"><span>{{ $menu->menu_name }}</span></a> --}}
                      {{-- <a href="{{ route("dashboard") }}"><span>{{ $menu->menu_name }}</span></a> --}}
                  </li>
              @endif
          @endif
      @endforeach
    @endif

  </ul>
</section>
    <!-- /.sidebar -->
</aside>
