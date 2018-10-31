@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-6">
            <h3>{{ $kind }} <small>» 列表</small></h3>
        </div>
        @if($kind == "管理员")
        <div class="col-md-6 text-right">
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    管理员管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('user.create') }}">新建普通管理员</a></li>
                    <li><a href="{{ route('user.createMB') }}">管理手机管理员</a></li>
                </ul>
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-12">

            @include('partials.errors')
            @include('partials.success')

            <table id="companies-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>{{ $kind }}帐号</th>
                        <th>{{ $kind }}昵称</th>
                        <th>{{ $kind }}角色</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                 </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nickname }}</td>
                        <td>{{ $user->role->description }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-xs btn-info">
                                查看
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center"> 
            {{ $users->links() }}
        </div>
    </div>
</div>
@stop