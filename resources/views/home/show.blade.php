@extends('layouts.app')
@section('content')
<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <span class="glyphicon glyphicon-comment"></span>
                        {{ $user->name }}
                    </h4>
                </div>
                <div class="panel-body pre-scrollable" id="fbPanel">
                </div>
                <div class="panel-body">
                    <form action="{{ route('fbcontent.store') }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" id="user_id" value={{ $user->id }}>
                        <input type="hidden" name="admin_id" value={{ Auth::id() }}>
                        <input type="hidden" name="preUrl" value={{ $preUrl }}>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="content"></textarea>
                        </div>
                        <input type="hidden" name="imageSrcs" value="">
                        <div class="form-group" id="imgLine">
                            <button type="button" class="btn btn-warning btn-xs plain pull-left" data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-cloud-upload">
                                </span>
                                图片
                            </button>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md pull-center">
                                    <span class="glyphicon glyphicon-hand-up"></span>
                                    发送
                                </button>
                                <a type="button" class="btn btn-info btn-md pull-center" href="{{ $preUrl }}">
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                                    返回
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@include('upload._modals')
@stop
@section('scripts')
    <script type="text/javascript"
     src="{{ URL::asset('js/jquery.form.js')  }}">
    </script>
    {{-- <script type="text/javascript"
     src="{{ URL::asset('js/jquery-3.3.1.min.js')  }}">
    </script> --}}
    <script type="text/javascript">
        var page=0;
        $(function () {
            var imageCounts=0;
            var imageSrcs=new Array();
            $(document).ready(function() {
                var options = {
                    //beforeSubmit:  showRequest,
                    success:       showResponse,
                    dataType: 'json'
                };
                $('#files').on('change', function(){
                    $('#imgForm').ajaxForm(options).submit();
                });
                getFbcontents();
            });
            // function showRequest(){
            //     $("input[name=imageCounts]").val(imageCounts);
            // }
            function showResponse(response)  {
                if(!response.success)
                {
                    var responseErrors = response.errors;
                    $('#myModal').modal('hide');
                    alert(responseErrors);
                } else {
                    let imageSrcsAdd=response.imageSrcs;
                    imageSrcs=imageSrcs.concat(imageSrcsAdd);
                    imageCounts+=imageSrcsAdd.length;
                    for(let index in imageSrcsAdd){
                        var temp=imageSrcsAdd[index];
                        $("#imgLine").append(
                            "<div class='col-sm-3 col-md-2'>\
                                    <a href='#' class='thumbnail' onclick='preview_image(&quot;"+temp+"&quot;)'>\
                                        <img src='"+imageSrcsAdd[index]+"'>\
                                    </a>\
                                </div>"
                            );
                    }
                    $("input[name=imageCounts]").val(imageCounts);
                    console.log(imageSrcs);
                    $('input[name=imageSrcs]').val(imageSrcs);
                    $('#myModal').modal('hide');

                }
            }

            
        });
        //function toHome(userid){
            //$.get('/fbcontent/toHome/'+$('#readflag').val()+'/'+userid);
        //}
        // 预览图片
        function preview_image(path) {console.log(path);
            $("#preview-image").attr("src", path);
            $("#modal-image-view").modal("show");
        }
        //append dialog
        function getFbcontents(){
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                async:false,
                cache:false
            });
            $.ajax({url:'../../fbcontent/getFbcontents',
                    type:'post',
                    data:{userid:$('input[name=user_id]').val(),
                            page:page++},
                    dataType:'json',
                    success:function(data){
                        //console.log(getPanelHtml(data.fbContents));
                        $("#loadMore").remove();
                        $("#fbPanel").prepend(getPanelHtml(data.fbContents));
                    },
                    error:function(error){
                        //console.log(error);
                    }
            });
        }
        function getPanelHtml(fbcontents){
            var html="";
            var htmlRow="";
            var perPage={{ config('feedback.perPage') }};
            console.log(perPage);
            console.log(fbcontents.length);
        if(!fbcontents.length){
            return "<div class='row'>\
                        <div class='col-md-offset-5'>\
                            没有更多了\
                        </div>\
                    </div>";
         }
         
        for(let index in fbcontents){
            if(fbcontents[index].admin_id==0){
                htmlRow=
                "<div class='row' style='text-align: left;'>\
                    <div class='col-md-1'>\
                        <a href='#' class='thumbnail'>\
                            <img src='"+fbcontents[index].user.avatar+"'>\
                        </a>\
                    </div>\
                    <div class='col-md-7'>";
                        if(fbcontents[index].imgflag){
                        htmlRow+=
                        "<div class='col-sm-9 col-md-6'>\
                            <a href='#' class='thumbnail' onclick='preview_image(&quot;"+fbcontents[index].content+"&quot;)'>\
                                <img src='"+fbcontents[index].content+"'>\
                            </a>\
                        </div>";
                        htmlRow+=
                        "<div>\
                            <span class='label label-info'>"+
                                fbcontents[index].created_at
                            +"</span>\
                        </div>";
                        }
                        else{
                        htmlRow+=
                        "<div class='col-md-12 text-left' style='background:#F5FFFA'>"+fbcontents[index].content+"</div>";
                        htmlRow+=
                        "<div class='col-md-12 text-left'>\
                            <span class='label label-info'>"+
                                fbcontents[index].created_at
                            +"</span>\
                        </div>";
                        }
                        htmlRow+=
                    "</div>\
                </div>";
            }
            else {
                htmlRow=
                "<div class='row'>\
                    <div class='col-md-1 pull-right'>\
                        <a href='#' class='thumbnail'>\
                            <img src='"+fbcontents[index].admin.avatar+"'>\
                                </a>\
                            </div>\
                            <div class='col-md-7 pull-right text-right'>";
                                if(fbcontents[index].imgflag){
                                    htmlRow+=
                                "<div class='col-sm-9 col-md-6 pull-right'>\
                                    <a href='#' class='thumbnail' onclick='preview_image(&quot;"+fbcontents[index].content+"&quot;)'>\
                                        <img src='"+fbcontents[index].content+"'>\
                                    </a>\
                                </div>";
                                htmlRow+=
                                "<div>\
                                    <span class='label label-info'>"+
                                        fbcontents[index].created_at
                                    +"</span>\
                                </div>";
                                }
                                else{
                                htmlRow+=
                                "<div class='col-md-12'>"+"<div class='text-left' style='background:#eeeed1;display:inline-block'>"+fbcontents[index].content+"</div>"+"</div>";
                                htmlRow+=
                                "<div class='col-md-12 text-left'>\
                                    <span class='label label-info'>"+
                                        fbcontents[index].created_at
                                    +"</span>\
                                </div>";
                                }
                                htmlRow+=
                            "</div>\
                        </div>";
            }
            html=htmlRow+html;
        }
        if(parseInt(perPage)>fbcontents.length){
                return "<div class='row'>\
                        <div class='col-md-offset-5'>\
                            没有更多了\
                        </div>\
                    </div>"+html;
            }
            else{console.log()
                return "<div class='row' id='loadMore'>\
                        <div class='col-md-offset-5'>\
                            <a href='#' type='button' class='btn btn-default plain' onclick='getFbcontents()'>\
                            点击更多\
                            </a>\
                        </div>\
                    </div>"+html;
            }
        }
    </script>
@stop