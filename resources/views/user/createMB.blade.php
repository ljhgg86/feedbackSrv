@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><span class="glyphicon glyphicon-comment"></span>管理手机管理员</h4>
            </div>
            <div class="panel-body">

                @include('partials.errors')
                @include('partials.success')
                <form action="{{ route('user.searchMB') }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">
                            &times;
                        </button>
                        {{ $tip }}
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-md-3 control-label">
                            输入{{ config('feedback.user') }}手机号码
                        </label>
                        
                        <input type="text" class="form-control" id="mobile" name="mobile" value="">
                    </div>
                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-md">
                                <span class="glyphicon glyphicon-hand-up">
                                查找
                            </button>
                            <a type="button" class="btn btn-info btn-md" href="{{ route('user.showAdmin') }}">
                                <span class="glyphicon glyphicon-arrow-left">
                                返回
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@stop