@extends('cAdmin.layouts.manage', ['nav_active' => 'admin'])

@section('title')修改密码 - @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-key"></i> 个人中心</a></li>
            <li class="active">修改密码</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">修改密码
                            <small><strong class="text-red">【*】</strong>为必填项</small>
                        </h3>
                    </div>
                    <!-- /.box-header -->

                    <form class="form-horizontal" id="form-base" method="post" action="{{ route('cAdmin.profile.updatePassword') }}">
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
                                <label for="input-password_old" class="col-sm-2 control-label"><strong class="text-red">*</strong> 旧登录密码</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="input-password_old" name="password_old" placeholder="6~20位" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-password" class="col-sm-2 control-label"><strong class="text-red">*</strong> 新登录密码</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="input-password" name="password" placeholder="6~20位" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-password_confirmation" class="col-sm-2 control-label"><strong class="text-red">*</strong> 新登录密码</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="input-password_confirmation" name="password_confirmation" placeholder="6~20位" value="">
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
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('footer')
@endsection