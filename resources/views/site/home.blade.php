
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css')}}">
<script src="{{ asset('admin/js/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('admin/js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<?php $title = trans('content.title'); ?>
<div class="container pen">
        <div class="row">
          <div class="col-sm-12">
                <nav class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                              <a class="navbar-brand" href="#" target="_blank">Home</a>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                            <?php $menu = App\Model\site\Home::getMenu($id=0); ?>
                                        @if(count($menu)>0)
                                            @foreach($menu as $item)
                                            <?php $secondlevel = App\Model\site\Home::getMenu($item->id); ?>
                                            @if(count($secondlevel)>0)
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $item->$title }}<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        @foreach($secondlevel as $second)
                                                        <?php $thirdlevel = App\Model\site\Home::getMenu($second->id); ?>
                                                        @if(count($thirdlevel)>0)
                                                        <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $second->$title}}</a>
                                                            <ul class="dropdown-menu">
                                                                @foreach ($thirdlevel as $third)
                                                                    <li><a href="#">{{ $third->$title}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        @else
                                                            <li><a href="#">{{ $second->$title}}</a></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li><a href="#">{{ $item->title }}</a></li>
                                            @endif
                                            @endforeach
                                        @endif
                                    </ul>
                            </div>
                </nav>
          </div>
        </div>
</div>
      <style>
          .dropdown-submenu{ position: relative; }
.dropdown-submenu>.dropdown-menu{
  top:0;
  left:100%;
  margin-top:-6px;
  margin-left:-1px;
  -webkit-border-radius:0 6px 6px 6px;
  -moz-border-radius:0 6px 6px 6px;
  border-radius:0 6px 6px 6px;
}
.dropdown-submenu>a:after{
  display:block;
  content:" ";
  float:right;
  width:0;
  height:0;
  border-color:transparent;
  border-style:solid;
  border-width:5px 0 5px 5px;
  border-left-color:#cccccc;
  margin-top:5px;margin-right:-10px;
}
.dropdown-submenu:hover>a:after{
  border-left-color:#555;
}
.dropdown-submenu.pull-left{ float: none; }
.dropdown-submenu.pull-left>.dropdown-menu{
  left: -100%;
  margin-left: 10px;
  -webkit-border-radius: 6px 0 6px 6px;
  -moz-border-radius: 6px 0 6px 6px;
  border-radius: 6px 0 6px 6px;
}

      </style>
<script>
(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault();
			event.stopPropagation();
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);
/* http://www.bootply.com/nZaxpxfiXz */</script>
