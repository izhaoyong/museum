@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增吟诵</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('admin/chant') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="chanttitle"><span class="label label-primary">标题:</span></label>
              <input type="text" name="title" id="chanttitle" class="form-control">
            </div>
            <div class="form-group">
              <label for="chantauthor"><span class="label label-primary">吟诵者信息:</span></label>
              <input type="text" name="author" id="chantauthor" class="form-control">
            </div>
            <div class="form-group">
              <label for="chantcategory"><span class="label label-primary">类别:</span></label>
              <input type="text" name="category" id="chantcategory" class="form-control" >
            </div>
            <!-- <div class="form-group">
              <label for="chantmedia_class"><span class="label label-primary">媒体类型:</span></label>
              <input type="text" name="media_class" id="chantmedia_class" class="form-control" >
            </div> -->

            
            <div class="form-group">
              <label for="chantPicture"><span class="label label-primary">视频图：</span></label>
              <input type="file" name="picture" id="chantPicture" onchange="previewFile(this);">
              <br> 
              <img class="img-preview" src="" height="200px" alt="预览" onerror="imgError(this);">
            </div>
            <div class="form-group">
              <label for="chantmedia"><span class="label label-primary">媒体文件名:</span></label>
              <input type="text" name="media" id="chantmedia" class="form-control"  >
            </div>
            <div class="form-group">
              <label for="chantmediafile"><span class="label label-primary">媒体文件：</span></label>
              <input id="file" type="file" name="mediafile" id="chantmediafile">
              <br>
              <p>上传进度：</p>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;width: 0%;">
                  0%
                </div>
              </div>
              <br>
            </div>
            <div class="form-group">
              <label for="chantscript"><span class="label label-primary">字幕名:</span></label>
              <input type="text" name="script" id="chantscript" class="form-control">
              <hr>
            </div>
            <div class="form-group">
              <label for="chantscriptfile"><span class="label label-primary">字幕文件：</span></label>
              <input type="file" name="scriptfile" id="chantscriptfile">
              <br>
            </div>

            <div class="form-group">
              <label for="chantcontent"><span class="label label-primary">诗歌体:</span></label>
              <input type="text" name="content" id="chantcontent" class="form-control"  >
            </div>
            <div class="form-group">
              <label for="chantdescription"><span class="label label-primary">解释:</span></label>
              <input type="text" name="description" id="chantdescription" class="form-control">
            </div>
            <div class="form-group">
              <label for="chantchanter"><span class="label label-primary">吟诵者:</span></label>
              <input type="text" name="chanter" id="chantchanter" class="form-control" >
            </div>
            <button class="btn btn-lg btn-info">新增吟诵</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection