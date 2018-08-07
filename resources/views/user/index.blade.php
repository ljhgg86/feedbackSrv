@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>{{ config('feedback.user') }} <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('user.create') }}" class="btn btn-success btn-md">
                    新建{{ config('feedback.user') }}
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('partials.errors')
                @include('partials.success')

                <table id="companies-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>编号</th>
                            <th>{{ config('feedback.user') }}帐号</th>
                            <th>{{ config('feedback.user') }}昵称</th>
                            <th>{{ config('feedback.user') }}角色</th>
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
    </div>
@stop