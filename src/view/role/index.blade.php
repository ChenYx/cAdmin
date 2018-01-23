@extends('backend.layouts.manage', ['nav_active' => 'role'])

@section('title')角色 - @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-key"></i> 管理员</a></li>
            <li class="active">角色列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('backend.role.create') }}" class="btn btn-xs btn-default">
                            <i class="fa fa-plus"></i> 新建角色
                        </a>
                        {{--<div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th style="min-width: 160px;">名称<small>/标识</small></th>
                                <th>描述</th>
                                <th>权限</th>
                                <th style="min-width: 80px;">操作</th>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->display_name }}
                                    <br/>{{ $item->name }}
                                </td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->permissions->implode('display_name', '、') }}</td>
                                <td>
                                    <a href="{{ route('backend.role.edit', ['id' => $item->id]) }}"><i class="fa fa-edit"></i> 编辑</a>
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
