@extends('cAdmin.layouts.manage', ['nav_active' => 'permission'])

@section('title')权限 - @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-key"></i> 管理员</a></li>
            <li class="active">权限列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">权限列表
                            <small>权限与功能代码同步，不能自行新建</small>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>名称</th>
                                <th>标识</th>
                                <th>描述</th>
                            </tr>
                            @foreach($items as $item)
                            <tr class="@if($item->parent_id == 0) text-danger @endif">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->display_name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td></td>
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
