@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>{{ config('enterfor.record') }} <small>» 列表</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('partials.errors')
                @include('partials.success')

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>编号</th>
                            <th>{{ config('enterfor.record') }}</th>                            
                            <th data-sortable="false">操作</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($enterforinfos as $enterforinfo)
                        <tr>
                            <td>{{ $enterforinfo->infoid }}</td>
                            <td>{{ $enterforinfo->itemcontents[0]->contentinfo }}</td>
                            <td>
                                <a href="{{ route('admin.enterfor.showmore',$enterforinfo->infoid) }}" class="btn btn-xs btn-info">查看
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            {{ $enterforinfos->links() }}
        </div>
    </div>
@stop
