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
                    <form action="{{ route('user.store') }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <span class="glyphicon glyphicon-hand-up">
                                    保存
                                </button>
                                <a type="button" class="btn btn-info btn-md" href="{{ route('user.index') }}">
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
