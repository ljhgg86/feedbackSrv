@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>{{ config('feedback.role') }} <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('role.create') }}" class="btn btn-success btn-md">
                    新建{{ config('feedback.role') }}
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
                            <th>{{ config('feedback.role') }}标签</th>
                            <th>{{ config('feedback.role') }}说明</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-xs btn-info">
                                    编辑
                                </a>
                                <a href="##" class="btn btn-xs btn-info">
                                    权限
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