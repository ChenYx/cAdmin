@extends('cAdmin.layouts.manage', ['nav_active' => 'admin'])

@section('title')管理员 - @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-key"></i> 管理员</a></li>
            <li class="active">管理员列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('cAdmin.admin.create') }}" class="btn btn-xs btn-default">
                            <i class="fa fa-plus"></i> 新建管理员
                        </a>
                        <div class="box-tools">
                            <form method="get" action="{{ route('cAdmin.admin.index') }}">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="key" class="form-control pull-right" placeholder="姓名/邮件" value="{{ isset($filter['key']) ? $filter['key'] : '' }}">
                                <div class="input-group-btn">
                                    @if(!empty($filter))<a class="btn btn-default" href="{{ route('cAdmin.admin.index') }}" title="关闭搜索"><i class="fa fa-close"></i></a>@endif
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>状态</th>
                                <th>姓名</th>
                                <th>邮箱</th>
                                <th>所属角色</th>
                                <th>操作</th>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><span class="label label-{{ \App\Support\Backend::getStatusClass($item->status) }}">
                                        {{ rowGet(\App\Model\AdminModel::getConstStatus(), $item->status) }}
                                    </span>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td><small>{{ $item->roles->implode('display_name', '、') }}</small></td>
                                <td>
                                    @if(Auth::can('admin-update'))
                                    <a href="{{ route('cAdmin.admin.edit', ['id' => $item->id]) }}"><i class="fa fa-edit"></i> 编辑</a>
                                    @endif
                                    @if(Auth::can('admin-role-all'))
                                    <a href="{{ route('cAdmin.admin.edit', ['id' => $item->id]) }}"><i class="fa fa-eye"></i> 角色配置</a>
                                    @endif
                                    @if(Auth::can('admin-account'))
                                    <a href="{{ route('cAdmin.admin.editAccount', ['id' => $item->id]) }}"><i class="fa fa-key"></i> 账号密码</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $items->links() }}
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
