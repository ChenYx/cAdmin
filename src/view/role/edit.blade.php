@extends('backend.layouts.manage', ['nav_active' => 'role'])

@section('title')编辑角色 - @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-key"></i> 管理员</a></li>
            <li><a href="{{ backend_url_previous(route('backend.role.index')) }}">角色列表</a></li>
            <li class="active">编辑角色 #{{ $role->id }}</li>
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
                    <form class="form-horizontal" id="form-base" method="post" action="{{ route('backend.role.update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $role->id }}" />

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
                                <label for="input-name" class="col-sm-2 control-label"><strong class="text-red">*</strong> 标识</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="input-name" name="name" placeholder="eg: admin-manage" value="{{ old('name', $role->name) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-display_name" class="col-sm-2 control-label"><strong class="text-red">*</strong> 名称</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="input-display_name" name="display_name" placeholder="中文名称" value="{{ old('display_name', $role->display_name) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-description" class="col-sm-2 control-label">描述</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="input-description" name="description" placeholder="说明">{{ old('description', $role->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-left">
                                <i class="fa fa-save"></i> 保存【角色信息】
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
                    <form class="form-horizontal" id="form-permission" method="post" action="{{ route('backend.role.updatePermission') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="role_id" value="{{ $role->id }}" />
                        <div class="box-header with-border">
                            <h3 class="box-title">权限配置</h3>
                            <div class="box-tools pull-right">
                                <div class="btn-group btn-group-sm">
                                    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i> 保存</button>
                                    <button type="button" class="btn btn-default js-permission-all">全选</button>
                                    <button type="button" class="btn btn-default js-permission-no">全不选</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered" id="js-permission-box">
                                <tbody>
                                <tr>
                                    <th>名称（描述）</th>
                                </tr>
                                @foreach($permission_group[0] as $permission)
                                    <tr>
                                        <td><label>
                                                <input type="checkbox" class="js-permission-group" name="permission_ids[]" value="{{ $permission->id }}"
                                                    @if(in_array($permission->id, $permission_checked)) checked @endif/>
                                                全选{{ $permission->display_name }}
                                                <small>{{ $permission->description }}</small>
                                            </label>
                                            <div>
                                                @if($permission_group[$permission->id])
                                                    @foreach($permission_group[$permission->id] as $sub_permission)
                                                        <label class="checkbox-inline js-permission-item no-margin">
                                                            <input type="checkbox" name="permission_ids[]" value="{{ $sub_permission->id }}"
                                                                   @if(in_array($sub_permission->id, $permission_checked)) checked @endif/>
                                                            {{ $sub_permission->display_name }}
                                                            @if(!empty($sub_permission->description))<small>{{ $sub_permission->description }}</small>@endif
                                                        </label>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="btn-group btn-group-sm">
                                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i> 保存【权限配置】</button>
                                <button type="button" class="btn btn-default js-permission-all">全选</button>
                                <button type="button" class="btn btn-default js-permission-no">全不选</button>
                            </div>
                        </div>
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
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ cdn_as('vendor/jsvalidation/js/jsvalidation.js', '#my-form')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UpdateRoleRequest', '#form-base') !!}

    <script>
        (function(){
            //设置统一宽度为最大宽度
            var max_width = 0;
            $("label.js-permission-item").each(function(){
                var item_width = $(this).width();
                max_width = max_width < item_width ? item_width : max_width;
            });
            max_width += 8;
            $("label.js-permission-item").width(max_width);

            //选择全部
            $("button.js-permission-all").click(function(){
                $("#js-permission-box input[name='permission_ids[]']").prop("checked", true);
            });
            $("button.js-permission-no").click(function(){
                $("#js-permission-box input[name='permission_ids[]']").prop("checked", false);
            });
            $("input.js-permission-group").change(function(){
                $(this).parent().next().find("input[name='permission_ids[]']").prop("checked", $(this).prop("checked"));
            });
        })();
    </script>
@endsection