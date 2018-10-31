@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>修改密码</h3></div>

                <div class="panel-body">
                    <form class="login-form" action="" method="post">
                        @if($errors->first())
                            <div class="alert alert-danger display-hide" style="display: block;">
                                <button class="close" data-close="alert"></button>
                                <span> 输入错误！  </span>
                            </div>
                        @endif
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">原始密码</label>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" name="oldpassword"> </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">新密码</label>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" name="password"> </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">重复密码</label>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" password" name="password_confirmation"> </div>
                        <div class="form-actions">
                            <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">确定</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
