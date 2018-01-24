@extends('cAdmin.layouts.manage', ['nav_active' => 'admin'])

@section('title')修改账号密码 - @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-key"></i> 管理员</a></li>
            <li><a href="{{ route('cAdmin.admin.index') }}">管理员列表</a></li>
            <li class="active">修改账号密码 #{{ $admin->id }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">账号密码
                            <small><strong class="text-red">【*】</strong>为必填项</small>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    @if(!Auth::can('admin-account'))
                        <div class="box-body">
                            {{ Auth::PERMISSION_DENIED_MSG }}
                        </div>
                    @else
                        <form class="form-horizontal" id="form-base" method="post" action="{{ route('cAdmin.admin.updateAccount') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $admin->id }}" />
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
                                        <input type="email" class="form-control" id="input-email" name="email" placeholder="请输入完整的邮箱格式" value="{{ old('email', $admin->email) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-password" class="col-sm-2 control-label">登录密码</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input-password" name="password" placeholder="6~20位" value="">
                                        <p class="help-block">不修改密码请留空</p>
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
                    @endif
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