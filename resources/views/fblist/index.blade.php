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
                            <th>序号</th>
                            <th>用户</th>
                            <th>标题</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fblists as $fblist)
                            @if($fblist->replyflag)
                                <tr class="success" style="cursor: pointer;">
                                    <td>{{ $fblist->id }}</td>
                                    <td>{{ $fblist->user->name }}</td>
                                    <td>{{ $fblist->title }}</td>
                                    <td>{{ config('feedback.replied') }}</td>
                                    <td> 
                                        <a class="btn btn-xs btn-primary" href="{{ route('fblist.show',$fblist->id) }}"> 详情
                                        </a>
                                    </td>
                                </tr>
                            @else
                                <tr class="warning" style="cursor: pointer;">
                                    <td>{{ $fblist->id }}</td>
                                    <td>{{ $fblist->user->name }}</td>
                                    <td>{{ $fblist->title }}</td>
                                    <td>{{ config('feedback.unreply') }}</td>
                                    <td> 
                                        <a class="btn btn-xs btn-primary" href="{{ route('fblist.show',$fblist->id) }}"> 详情
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
            {{ $fblists->links() }}
        </div>
    </div>
</div>
@stop
