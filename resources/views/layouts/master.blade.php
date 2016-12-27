<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/gif" href="{{URL::to('plugins/pic')}}/GDCE-png.png" />
    <title>{{config('app.name')}}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::to('plugins/font-awesome-4.6.3')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/dist/css/skins/skin-black-light.min.css">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/datatables/dataTables.bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Siemreap" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="{{URL::to('plugins/adminlte-2.3.7')}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/iCheck/icheck.min.js"></script>
    <script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
</head>
<body class="sidebar-mini skin-black-light">
<div class="wrapper">
    <header class="main-header bg-primary">
        <a href="{{URL::to('')}}" class="logo">
            <span class="logo-mini"><b>CKM</b></span>
            <span class="logo-lg"><b>Chamkarmorn CEO</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{URL::to('plugins/adminlte-2.3.7')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="{{trans('general.language')}}">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-info">2</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <ul class="menu">
                                    <li><!— Task item —>
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->name != "UNG Visal")
                                <img src="{{URL::to('plugins/adminlte-2.3.7')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            @else
                                <img src="{{asset('plugins/pic/UNG Visal.jpg')}}" class="user-image" alt="User Image">
                            @endif
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">

                                @if(Auth::user()->name != "UNG Visal")
                                    <img src="{{URL::to('plugins/adminlte-2.3.7')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                @else
                                    <img src="{{asset('plugins/pic/UNG Visal.jpg')}}" class="img-circle" alt="User Image">
                                @endif
                                <p>
                                    {{Auth::user()->name}}
                                    <small>Member Since - {{explode(' ',Auth::user()->created_at)[0]}}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{URL::to('profile')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="javascript: void(0);" onclick="logout()" class="btn btn-default btn-flat">Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    @if(Auth::user()->name != "UNG Visal")
                        <img src="{{URL::to('plugins/adminlte-2.3.7')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    @else
                        <img src="{{asset('plugins/pic/UNG Visal.jpg')}}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                {{--<li class="treeview active">--}}
                    {{--<a href="javascript:void(0);">--}}
                        {{--<i class="fa fa-file-text-o"></i>--}}
                        {{--<span>Administration</span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu" style="padding-left: 15px;">--}}
                        {{--<li>--}}
                            {{--<a href="javascript:void(0);">--}}
                                {{--<i class="fa fa-calendar"></i> បញ្ជីវេនប្រចាំការ--}}
                            {{--</a>--}}
                            {{--<ul class="treeview-menu">--}}
                                {{--<li><a href="{{URL::to('under/construction')}}"><i class="fa fa-moon-o"></i> យាមពេលយប់</a></li>--}}
                                {{--<li><a href="{{URL::to('under/construction')}}"><i class="fa fa-sun-o"></i> យាមថ្ងៃសៅរ៍-អាទិត្យ</a></li>--}}
                                {{--<li><a href="{{URL::to('under/construction')}}"><i class="fa fa-bank"></i> នៅការិ.ច្រកចេញចូលតែមួយ</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class="treeview active">
                    <a href="javascript:void(0);">
                        <i class="fa fa-pie-chart"></i>
                        <span>Accounting</span>
                    </a>
                    <ul class="treeview-menu" style="padding-left: 15px;">
                        <li>
                            <a href="{{URL::to('revenue')}}">
                                <i class="fa fa-tasks"></i> Revenue
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::to('under/construction')}}">
                                <i class="fa fa-book"></i> Printed Documents
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::to('under/construction')}}"><i class="fa fa-shopping-cart"></i> Goods Statistics</a>
                        </li>
                        <li>
                            <a href="{{URL::to('under/construction')}}"><i class="fa fa-motorcycle"></i> Motorcycle Statistics</a>
                        </li>
                        <li>
                            <a href="{{URL::to('under/construction')}}"><i class="fa fa-automobile"></i> Automobile Statistics</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    @yield('content')
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copy Right &copy; {{date('Y')}} <a href="javascriopt:void(0)">{{config('app.name')}}</a>.</strong>
    </footer>
    <div class="control-sidebar-bg"></div>
</div>

<form method="post" id="logoutForm" action="{{URL::to('logout')}}">
    {{csrf_field()}}
</form>

<script type="text/javascript">
    function logout() {
        $('#logoutForm').submit();
    }
</script>

<script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/fastclick/fastclick.js"></script>
<script src="{{URL::to('plugins/adminlte-2.3.7')}}/dist/js/app.min.js"></script>
<script src="{{URL::to('plugins/adminlte-2.3.7')}}/dist/js/demo.js"></script>
<script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="{{URL::to('plugins/bootstrap-notify')}}/bootstrap-notify.min.js"></script>
</body>
</html>