@extends('layouts.app')
@section('content')
<div class="container">
    
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><span class="glyphicon glyphicon-edit"></span>编辑{{ config('feedback.role') }}</h4>
                </div>
                <div class="panel-body">

                    @include('partials.errors')
                    @include('partials.success')

                    @if($role->id)
                        <form action="{{ route('role.update', $role->id) }}" method="POST" accept-charset="UTF-8">
                            <input type="hidden" name="_method" value="PUT">
                    @else
                        <form action="{{ route('role.store') }}" method="POST" accept-charset="UTF-8">
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">
                                {{ config('feedback.role') }}名称
                            </label>
                            
                                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">
                                {{ config('feedback.role') }}描述
                            </label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ $role->description }}">
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <span class="glyphicon glyphicon-save">
                                    保存
                                </button>
                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete">
                                    <span class="glyphicon glyphicon-trash">
                                    删除
                                </button>
                                <a type="button" class="btn btn-info btn-md" href="{{ route('role.index') }}">
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

{{-- 确认删除 --}}
<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">请确认修改</h4>
            </div>
            <div class="modal-body">
                <p class="lead">
                    是否真的需要删除此{{ config('feedback.role') }}？
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('role.destroy', $role->id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-danger">
                        确认
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
