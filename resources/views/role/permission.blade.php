@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>{{ config('enterfor.permission') }} <small>» 列表</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('partials.errors')
                @include('partials.success')
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.role.updatePermission') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $roleid }}">
                    <table id="permission-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>编号</th>
                                <th>{{ config('enterfor.permission') }}名称</th>
                                <th>{{ config('enterfor.permission') }}标签</th>
                            </tr>
                         </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    @if(in_array($permission->id,array_values($rolepermissions)))
                                    <input type="checkbox" name="role_permissions[]" value="{{ $permission->id }}" checked>
                                    @else
                                    <input type="checkbox" name="role_permissions[]" value="{{ $permission->id }}">
                                    @endif
                                </td>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->permissionname }}</td>
                                <td>{{ $permission->permissionlabel }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-md">
                                保存
                            </button>
                            <a type="button" class="btn btn-primary btn-md" href="{{ route('role.index') }}">
                                返回
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop