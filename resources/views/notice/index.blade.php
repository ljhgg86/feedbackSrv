@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>{{ config('feedback.notice') }} <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('notice.create') }}" class="btn btn-success btn-md">
                    新建{{ config('feedback.notice') }}
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
                            <th>类型</th>
                            <th>{{ config('feedback.notice') }}标题</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($notices as $notice)
                        <tr>
                            <td>{{ $notice->id }}
                                @if($notice->showtop)
                                <span class="label label-warning">展示</span>
                                @endif
                            </td>
                            <td>{{ $notice->type->name }}</td>
                            <td>{{ $notice->title }}</td>
                            <td>
                                <a href="{{ route('notice.edit', $notice->id) }}" class="btn btn-xs btn-info">
                                    编辑
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