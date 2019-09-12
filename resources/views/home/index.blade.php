@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('partials.errors')
            @include('partials.success')
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover">
                    <caption>{{ config('feedback.feedbacklist') }}</caption>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{$currentTypeName}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($types as $type)
                                    <li>
                                        <a href="{{ route('home' , ['typeid'=>$type->id]) }}">{{$type->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form role="form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="搜索内容">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">搜索</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>用户</th>
                            <th>内容</th>
                            <th>未读</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fblists as $fblist)
                            <tr style="cursor: pointer;">
                                <td>{{ $fblist->name }}</td>
                                <td>
                                    @if($fblist->imgflag)
                                    图片信息
                                    @elseif($fblist->videoflag)
                                    视频信息
                                    @else
                                    {{ $fblist->content }}
                                    @endif
                                </td>
                                <td>
                                    @if($fblist->count)
                                    <span class="label label-warning">
                                        {{ $fblist->count }}
                                    </span>
                                    @endif
                                </td>
                                <td> 
                                    <a class="btn btn-xs btn-primary" href="{{ route('home.show' , ['id'=>$fblist->user_id]) }}"> 查看
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center"> 
            {{ $fblists->links() }}
        </div>
    </div>
</div>
@stop
