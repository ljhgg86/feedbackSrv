@extends('layouts.app')
@section('content')
<div class="container">
    
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><span class="glyphicon glyphicon-edit"></span>编辑{{ config('feedback.notice') }}</h4>
                </div>
                <div class="panel-body">

                    @include('partials.errors')
                    @include('partials.success')

                    @if($notice->id)
                        <form action="{{ route('notice.update', $notice->id) }}" method="POST" accept-charset="UTF-8">
                            <input type="hidden" name="_method" value="PUT">
                    @else
                        <form action="{{ route('notice.store') }}" method="POST" accept-charset="UTF-8">
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">
                                {{ config('feedback.notice') }}标题(less than 50)
                            </label>
                            
                                <input type="text" class="form-control" id="title" name="title" value="{{ $notice->title }}">
                        </div>
                        <div class="form-group">
                            <label for="detail" class="col-md-3 control-label">
                                {{ config('feedback.notice') }}内容(less than 200)
                            </label>
                                <textarea class="form-control" rows="3" name="detail">{{ $notice->detail }}</textarea>
                            
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="type">
                                {{ config('feedback.notice') }}类型
                            </label>
                            <select class="form-control" name="type">
                                @foreach($types as $type)
                                @if($notice->type)
                                    @if(intval($type->id)==intval($notice->type->id))
                                    <option value={{$type->id}} selected>{{$type->name}}</option>
                                    @else
                                    <option value={{$type->id}}>{{$type->name}}</option>
                                    @endif
                                @else
                                    @if(intval($type->id)==1)
                                    <option value={{$type->id}} selected>{{$type->name}}</option>
                                    @else
                                    <option value={{$type->id}}>{{$type->name}}</option>
                                    @endif
                                @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="showtop" class="col-md-2 control-label">
                                首页展示
                            </label>
                            @if($notice->showtop)
                            <label class="radio-inline">
                                <input type="radio" name="showtop" value=1 checked >开启
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="showtop" value=0>关闭
                            </label>
                            @else<label class="radio-inline">
                                <input type="radio" name="showtop" value=1>开启
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="showtop" value=0 checked>关闭
                            </label>
                            @endif
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
                                <a type="button" class="btn btn-info btn-md" href="{{ route('notice.index') }}">
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
                    是否真的需要删除此{{ config('feedback.notice') }}？
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('notice.destroy', $notice->id) }}">
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
