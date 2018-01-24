<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title'){{ config('cAdmin.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="//cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="//cdn.bootcss.com/admin-lte/2.4.2/css/AdminLTE.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/admin-lte/2.4.2/css/skins/skin-blue-light.min.css">
    <link rel="stylesheet" href="{{ public_path('/assets/cAdmin/css/app2.css') }}">
    @yield('head')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('cAdmin.home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">{{ config('cAdmin.name_abbr') }}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>{{ config('cAdmin.name') }}</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ public_path('assets/cAdmin/img/avatar.jpg') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::guard()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ public_path('assets/cAdmin/img/avatar.jpg') }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ Auth::guard()->user()->name }}
                                </p>
                            </li>
                            <!-- Menu Body -->
                            {{--<li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">修改密码</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>--}}
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('cAdmin.profile.password') }}" class="btn btn-default btn-flat">修改密码</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('cAdmin.logout') }}" class="btn btn-default btn-flat">退出登录</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="@if(in_array($nav_active, ['admin', 'role', 'permission'])) active @endif treeview">
                    <a href="{{ route('cAdmin.admin.index') }}">
                        <i class="fa fa-key"></i> <span>管理员</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li @if($nav_active === 'admin')class="active"@endif><a href="{{ route('cAdmin.admin.index') }}"><i class="fa fa-fighter-jet"></i> 管理员列表</a></li>
                        <li @if($nav_active === 'role')class="active"@endif><a href="{{ route('cAdmin.role.index') }}"><i class="fa fa-fighter-jet"></i> 角色列表</a></li>
                        <li @if($nav_active === 'permission')class="active"@endif><a href="{{ route('cAdmin.permission.index') }}"><i class="fa fa-fighter-jet"></i> 权限列表</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="//cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="//cdn.bootcss.com/admin-lte/2.4.2/js/adminlte.min.js"></script>
@yield('footer')
</body>
</html>