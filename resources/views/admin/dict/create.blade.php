@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增土语</div>

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


          <form action="{{ URL('admin/dict/') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="dictEntry"><span class="label label-primary">词条:</span></label>
              <input type="text" name="entry" id="dictEntry" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="dictBeijing_entry"><span class="label label-primary">北京话词条:</span></label>
              <input type="text" name="beijing_entry" id="dictBeijing_entry" class="form-control" required="required" >
            </div>
            <div class="form-group">
              <label for="dictInterpretation"><span class="label label-primary">释义:</span></label>
              <input type="text" name="interpretation" id="dictInterpretation" class="form-control">
            </div>
            <div class="form-group">
              <label for="dictYear"><span class="label label-primary">分类:</span></label>
              <input type="text" name="category" id="dictYear" class="form-control">
            </div>
            <div class="form-group">
              <label for="dictSound"><span class="label label-primary">声音:</span></label>
              <input type="file" name="sound" id="dictSound" onchange="previewSound(this);" >
              <button type="button" class="btn btn-default" onclick="playSound(this);">
                <audio src=""></audio>
                <span class="glyphicon glyphicon-play" aria-hidden="true"></span> 播放
              </button> 
              <hr>
            </div>
            <div class="form-group">
              <label for="dictPicture"><span class="label label-primary">图：</span></label>
              <input type="file" name="picture" id="dictPicture" onchange="previewFile(this);">
              <br> 
              <img class="img-preview"  height="200px" alt="预览" onerror="imgError(this);">
              <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>
            <hr>
            <br>
            <button class="btn btn-lg btn-info">新增土语</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection