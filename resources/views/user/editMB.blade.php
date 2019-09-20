@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><span class="glyphicon glyphicon-comment"></span>用户详情</h4>
            </div>
            <div class="panel-body">

                @include('partials.errors')
                @include('partials.success')
                <form action="{{ route('user.updateMB') }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value={{$user->id}}>
                    <div class="form-group">
                        <label for="mobile" class="col-md-3 control-label">
                            {{ config('feedback.user') }}名称
                        </label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nickname" class="col-md-3 control-label">
                            {{ config('feedback.user') }}昵称
                        </label>
                        <input type="text" class="form-control" id="nickname" name="nickname" value="{{ $user->nickname }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-md-3 control-label">
                            {{ config('feedback.user') }}角色
                        </label>
                        <div>
                            @if($user->role_id == 3)
                            <label class="radio-inline"><input type="radio" name="role" value=3 checked>管理员</label>
                            <label class="radio-inline"><input type="radio" name="role" value=4>普通用户</label>
                            @else
                            <label class="radio-inline"><input type="radio" name="role" value=3>管理员</label>
                            <label class="radio-inline"><input type="radio" name="role" value=4 checked>普通用户</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="types" class="col-md-12 control-label">
                            {{ config('feedback.user') }}类型
                        </label>
                        @foreach($types as $type)
                        @if(in_array($type->id,$typeids))
                        <div class="checkbox">
                            <label><input type="checkbox" name="types" value={{$type->id}} checked>{{$type->name}}</label>
                        </div>
                        @else
                        <div class="checkbox">
                            <label><input type="checkbox" name="types" value={{$type->id}}>{{$type->name}}</label>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-md">
                                <span class="glyphicon glyphicon-hand-up">
                                确定
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