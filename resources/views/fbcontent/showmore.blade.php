@extends('layouts.app')
@section('content')
	<div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>{{ config('enterfor.detail') }}
            </div>
        </div>

        <div class="row">
        	@foreach($enterforinfo->itemcontents as $itemcontent)
        		<div class="col-sm-12">
        			{{ $itemcontent->item->itemname }}：{{ $itemcontent->contentinfo }}
        		</div>
        	@endforeach
        	@foreach($enterforinfo->infoimgs as $infoimg)
        		<div class="col-sm-6 col-md-3">
        			<a href="#" class="thumbnail">
            			<img src="{{ $infoimg->imgsrc }}" alt="通用的占位符缩略图">
        			</a>
        		</div>
        	@endforeach
		</div>
		{{ $enterforinfo }}
	</div>
@stop