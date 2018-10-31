<!-- 模态框（Modal） -->
<!-- 上传多张图片 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/image/upload" class="form-horizontal" id="imgForm" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="imageCounts" value="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">上传图片/视频</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file" class="col-sm-3 control-label">
                            图片/视频
                        </label>
                        <div class="col-sm-8">
                            <input type="file" accept="image/*,video/*" id="files" name="files[]" multiple>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-primary">
                        提交
                    </button>
                </div> --}}
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/image/uploadApi" class="form-horizontal" id="imgForm1" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">上传图片</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file" class="col-sm-3 control-label">
                            图片:
                        </label>
                        <div class="col-sm-8">
                            <input type="file" accept="image/*" id="file" name="file">
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
        {{-- 浏览图片 --}}
<div class="modal fade" id="modal-image-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">Image Preview</h4>
            </div>
            <div class="modal-body">
                <img id="preview-image" src="" class="img-responsive">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>