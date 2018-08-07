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
                    <thead>
                        <tr>
                            <th style="width:5%;">序号</th>
                            <th style="width:17%;">用户</th>
                            <th style="width:65%;">内容</th>
                            <th style="width:8%;">状态</th>
                            <th style="width:5%">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fbcontents as $fbcontent)
                            @if($fbcontent->replyflag)
                                <tr class="success" style="cursor: pointer;">
                                    <td>{{ $fbcontent->id }}</td>
                                    <td>{{ $fbcontent->user_send->name }}</td>
                                    <td>{{ $fbcontent->content }}</td>
                                    <td>{{ config('feedback.replied') }}</td>
                                    <td> 
                                        <a class="btn btn-xs btn-primary" href="{{ route('user.show',$fbcontent->user_send->id) }}"> 详情
                                        </a>
                                    </td>
                                </tr>
                            @else
                                <tr class="warning" style="cursor: pointer;" onclick="{{ route('user.show',$fbcontent->user_send->id) }}">
                                    <td>{{ $fbcontent->id }}</td>
                                    <td>{{ $fbcontent->user_send->name }}</td>
                                    <td>{{ $fbcontent->content }}</td>
                                    <td>{{ config('feedback.unreply') }}</td>
                                    <td> 
                                        <a class="btn btn-xs btn-primary" href="{{ route('user.show',$fbcontent->user_send->id) }}"> 详情
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center"> 
            {{ $fbcontents->links() }}
        </div>
    </div>
</div>
@stop
