@extends('cAdmin.layouts.manage', ['nav_active' => 'admin'])

@section('title')新建管理员 - @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-key"></i> 管理员</a></li>
            <li><a href="{{ route('cAdmin.admin.index') }}">管理员列表</a></li>
            <li class="active">新建管理员</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">管理员信息
                            <small><strong class="text-red">【*】</strong>为必填项</small>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <form class="form-horizontal" id="form-base" method="post" action="{{ route('cAdmin.admin.store') }}">
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
                                <label for="input-email" class="col-sm-2 control-label"><strong class="text-red">*</strong> 登录邮箱</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="input-email" name="email" placeholder="请输入完整的邮箱格式" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-password" class="col-sm-2 control-label"><strong class="text-red">*</strong> 登录密码</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="input-password" name="password" placeholder="6~20位" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-name" class="col-sm-2 control-label"><strong class="text-red">*</strong> 姓名</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="input-name" name="name" placeholder="用于显示" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-status" class="col-sm-2 control-label"><strong class="text-red">*</strong> 状态</label>
                                <div class="col-sm-8">
                                    @inject("adminModel", "App\Model\AdminModel")
                                    <div class="input-group">
                                    @foreach($adminModel::getConstStatus() as $key => $val)
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="{{ $key }}" @if($key === $adminModel::STATUS_DEFAULT_AT_ADMIN_CREATE) checked @endif> {{ $val }}
                                        </label>
                                    @endforeach
                                    </div>
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
                        <h3 class="box-title">角色配置</h3>
                    </div>
                    <div class="box-body">
                        保存管理员信息后，才能操作角色配置哟
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