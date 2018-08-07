@extends('layouts.app')
@section('content')
<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <span class="glyphicon glyphicon-comment"></span>
                        {{ $fblist->title }}
                    </h4>
                </div>
                <div class="panel-body">

                    @include('partials.errors')
                    @include('partials.success')
                    @foreach($fblist->fbcontents as $fbcontent)
                        @if($fblist->user_id==$fbcontent->user_id)
                        <div class="row" style="text-align: left;">
                            <div class="col-md-1">
                                <a href="#" class="thumbnail">
                                    <img src="{{ $fbcontent->user->avatar }}">
                                </a>
                            </div>
                            <div class="col-md-7">
                                {{ $fbcontent->content }}
                            </div>
                        </div>
                        @else 
                        <div class="row">
                            <div class="col-md-1 pull-right">
                                <a href="#" class="thumbnail">
                                    <img src="{{ $fbcontent->user->avatar }}">
                                </a>
                            </div>
                            <div class="col-md-7 pull-right text-right">
                                {{ $fbcontent->content }}
                            </div>
                        </div>
                        @endif
                    @endforeach

                    <form action="{{ route('fbcontent.store') }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="fblist_id" value={{ $fblist->id }}>
                        <input type="hidden" name="user_id" value={{ Auth::id() }}>
                        
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="content">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <span class="glyphicon glyphicon-hand-up">
                                    发送
                                </button>
                                <a type="button" class="btn btn-info btn-md" href="{{ route('fblist.index') }}">
                                    <span class="glyphicon glyphicon-arrow-left">
                                    返回
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    
</div>
@stop
