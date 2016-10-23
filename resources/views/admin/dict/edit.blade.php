@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑土语</div>

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
          
          <form action="{{ URL('admin/dict/'.$dict->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="dictDict_id"><span class="label label-primary">dict_id:</span></label>
              <input type="text" name="dict_id" id="dictDict_id" class="form-control" required="required" value="{{ $dict->dict_id }}">
            </div>
            <div class="form-group">
              <label for="dictEntry"><span class="label label-primary">词条:</span></label>
              <input type="text" name="entry" id="dictEntry" class="form-control" required="required" value="{{ $dict->entry }}">
            </div>
            <div class="form-group">
              <label for="dictBeijing_entry"><span class="label label-primary">北京话词条:</span></label>
              <input type="text" name="beijing_entry" id="dictBeijing_entry" class="form-control" required="required" value="{{ $dict->beijing_entry }}">
            </div>
            <div class="form-group">
              <label for="dictPronunciation"><span class="label label-primary">发音:</span></label>
              <input type="text" name="pronunciation" id="dictPronunciation" class="form-control" value="{{ $dict->pronunciation }}">
              <hr>
            </div>
            <div class="form-group">
              <label for="dictInterpretation"><span class="label label-primary">释义:</span></label>
              <input type="text" name="interpretation" id="dictInterpretation" class="form-control"  value="{{ $dict->interpretation }}">
            </div>
            <div class="form-group">
              <label for="dictCategory"><span class="label label-primary">分类:</span></label>
              <input type="text" name="category" id="dictCategory" class="form-control" value="{{ $dict->category }}">
            </div>
            <div class="form-group">
              <label for="dictSound"><span class="label label-primary">声音:</span></label>
              <input type="file" name="sound" id="dictSound" value="{{ $dict->sound }}" onchange="previewSound(this);" >
              <!-- <p>{{ $dict->dict_id.".wav" }}</p> -->
              <button type="button" class="btn btn-default" onclick="playSound(this);">
                <audio src="{{asset('content/dict/sound')."/".$dict->dict_id}}.wav"></audio>
                <span class="glyphicon glyphicon-play" aria-hidden="true"></span> 播放
              </button>
              <hr>
            </div>
            <div class="form-group">
              <label for="dictPicture"><span class="label label-primary">图：</span></label>
              <input type="file" name="picture" id="dictPicture" onchange="previewFile(this);">
              <br> 
              <img class="img-preview" src="{{ asset('content/dict/image')."/".$dict->dict_id }}.jpg" height="200px" alt="预览" onerror="imgError(this);">
              <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>
            <hr>
            <br>
            <button class="btn btn-lg btn-info">编辑土语图典</button>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection