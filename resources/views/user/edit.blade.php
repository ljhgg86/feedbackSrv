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
                    @if($user->id)
                        <form action="{{ route('user.update', $user->id) }}" method="POST" accept-charset="UTF-8">
                            <input type="hidden" name="_method" value="PUT">
                    @else
                        <form action="{{ route('user.store') }}" method="POST" accept-charset="UTF-8">
                    @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if($user->role_id == config('feedback.superRole') || $user->id != Auth::id())
                        <div class="form-group">
                            <label for="mobile" class="col-md-3 control-label">
                                {{ config('feedback.user') }}名称
                            </label>
                            
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $user->name }}">
                        </div>{{-- 
                        <div class="form-group">
                            <label for="created_at" class="col-md-3 control-label">
                                {{ config('feedback.user') }}首访
                            </label>
                            
                                <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $user->created_at }}" readonly>
                        </div> --}}
                        <div class="form-group">
                             @if($user->id)
                            <label for="role" class="col-md-3 control-label">
                                {{ config('feedback.user') }}角色
                            </label>
                             <input type="text" class="form-control" id="role" name="role" value="{{ $user->role->name }}" readonly>
                             @else
                             <input type="hidden" class="form-control" id="role" name="role" value={{config('feedback.pcRole')}}>
                            {{-- <select class="form-control" name="role">
                                @foreach($roles as $role)
                                @if($user->role->id == $role->id)
                                <option value="{{ $role->id }}" selected>
                                @else
                                <option value="{{ $role->id }}">
                                @endif 
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select> --}}
                             @endif
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="nickname" class="col-md-3 control-label">
                                {{ config('feedback.user') }}昵称
                            </label>
                            
                                <input type="text" class="form-control" id="nickname" name="nickname" value="{{ $user->nickname }}">
                        </div>
                        <div class="form-group">
                            <label for="avatar" class="col-md-3 control-label">
                                {{ config('feedback.user') }}头像
                            </label>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    {{-- <img id="avatar" src="{{ $user->avatar }}" onerror="this.src=&quot;{{ public_path().config('feedback.image_default') }}&quot; ; this.onerror=null"> --}}
                                    <img id="avatar" src="{{ $user->avatar }}">
                                    <input type="hidden" id="avatarval" name="avatar" value="{{ $user->avatar }}">
                                </div>
                                @if(!($user->role->id == config('feedback.mbRole') && $user->role->id == config('feedback.userRole')))
                                <div class="col-sm-4 col-md-2">
                                    <button type="button" class="btn btn-warning btn-xs plain pull-left" data-toggle="modal" data-target="#myModal1">
                                        <span class="glyphicon glyphicon-cloud-upload">
                                        </span>
                                        上传
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                    <form action="{{ route('user.store') }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <span class="glyphicon glyphicon-hand-up">
                                    保存
                                </button>
                                <a type="button" class="btn btn-info btn-md" href="{{ url()->previous() }}">
                                    <span class="glyphicon glyphicon-arrow-left">
                                    返回
                                </a>
                                {{-- @if($user->role->id == config('feedback.userRole'))
                                <a type="button" class="btn btn-info btn-md" href="{{ route('user.index') }}">
                                    <span class="glyphicon glyphicon-arrow-left">
                                    返回
                                </a>
                                @else
                                <a type="button" class="btn btn-info btn-md" href="{{ route('user.showAdmin') }}">
                                    <span class="glyphicon glyphicon-arrow-left">
                                    返回
                                </a>
                                @endif --}}
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    
</div>
@include('upload._modals')
@stop
@section('scripts')
    <script type="text/javascript"
     src="{{ URL::asset('js/jquery.form.js')  }}">
    </script>
    <script type="text/javascript">
        $(function () {
            $(document).ready(function() {
                var options = {
                    //beforeSubmit:  showRequest,
                    success:       showResponse,
                    dataType: 'json'
                };
                $('#file').on('change', function(){
                    $('#imgForm1').ajaxForm(options).submit();
                });
            });
            function showResponse(response)  {
                if(!response.success)
                {
                    var responseErrors = response.errors;
                    $('#myModal1').modal('hide');
                    alert(responseErrors);
                } else {
                    let imageSrcs=response.imageSrcs;
                    $("#avatar").attr("src",imageSrcs);
                    $("#avatarval").val(imageSrcs);
                    $('#myModal1').modal('hide');
                }
            }
        });
    </script>
@stop
