@extends('cAdmin.layouts.manage', ['nav_active' => 'role'])

@section('title')新建角色 - @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-key"></i> 管理员</a></li>
            <li><a href="{{ route('cAdmin.role.index') }}">角色列表</a></li>
            <li class="active">新建角色</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">角色信息
                            <small><strong class="text-red">【*】</strong>为必填项</small>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <form class="form-horizontal" id="form-base" method="post" action="{{ route('cAdmin.role.store') }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="input-display_name" class="col-sm-2 control-label"><strong class="text-red">*</strong> 名称</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="input-display_name" name="display_name" placeholder="中文名称" value="{{ old('display_name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-name" class="col-sm-2 control-label"><strong class="text-red">*</strong> 标识</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="input-name" name="name" placeholder="eg: admin-manage" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-description" class="col-sm-2 control-label">描述</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="input-description" name="description" placeholder="说明">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-left">
                                <i class="fa fa-save"></i> 保存
                            </button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-xs-12 -->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">权限配置</h3>
                    </div>
                    <div class="box-body">
                        保存角色信息后，才能操作权限配置哟
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-xs-12 -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('footer')

@endsection