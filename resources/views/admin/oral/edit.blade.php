@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑口传文化</div>

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

          <form action="{{ URL('admin/oral/'.$oral->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="oralname"><span class="label label-primary">叫卖物:</span></label>
              <input type="text" name="name" id="oralname" class="form-control" required="required" value="{{ $oral->name }}">
            </div>
            <div class="form-group">
              <label for="oralspeaker"><span class="label label-primary">叫卖人:</span></label>
              <input type="text" name="speaker" id="oralspeaker" class="form-control" value="{{ $oral->speaker }}">
            </div>
           
            <div class="form-group">
              <label for="oralPicture"><span class="label label-primary">图：</span></label>
              <input type="file" name="picture" id="oralPicture" onchange="previewFile(this);">
              <br> 
              <img class="img-preview" src="{{ asset('content/oral/picture')."/".$oral->speaker.'\\'.$oral->video }}.jpg" height="200px" alt="预览" onerror="imgError(this);">
            </div>
            <div class="form-group">
              <label for="oralvideo"><span class="label label-primary">视频名:</span></label>
              <input type="text" name="video" id="oralvideo" class="form-control" required="required" value="{{ $oral->video }}">
            </div>
            <div class="form-group">
              <label for="oralvideofile"><span class="label label-primary">视频文件：</span></label>
              <input id="file" type="file" name="videofile" id="oralvideofile">
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
              <label for="oralxml"><span class="label label-primary">字幕名:</span></label>
              <input type="text" name="xml" id="oralxml" class="form-control" value="{{ $oral->xml }}">
              <hr>
            </div>
            <div class="form-group">
              <label for="oralxmlfile"><span class="label label-primary">字幕文件：</span></label>
              <input type="file" name="xmlfile" id="oralxmlfile">
              <br>
            </div>
            <div class="form-group">
              <label for="oralcontent"><span class="label label-primary">释义:</span></label>
              <input type="text" name="content" id="oralcontent" class="form-control"  value="{{ $oral->content }}">
            </div>
            
            
            <hr>
            <br>
            <button class="btn btn-lg btn-info">编辑口传文化</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  
  var form = document.querySelector('form');
  var request = new XMLHttpRequest();

  request.upload.addEventListener('progress',function(e){
    if (e.lengthComputable) {
      var percentComplete = parseInt(e.loaded/e.total * 100);
      var progress = document.querySelector(".progress-bar");

      progress.innerHTML = percentComplete + "%";
      console.log(percentComplete);
      progress.setAttribute("style", "width: " + percentComplete + "%;");
      progress.setAttribute("aria-valuenow", percentComplete);

    }
  },false);

  request.addEventListener('load', function(e){
    window.location = "{{ URL('admin/oral')}}";
  }, false);
  var file = document.getElementById("file");

  form.addEventListener('submit', function(e){
    e.preventDefault();

    var formdata = new FormData(form);
    // var file = this.files[0];
    // formdata.append('uploadedfile',file )
    request.open("POST",form.action);
    request.send(formdata);
  }, false);

  

</script>
@endsection