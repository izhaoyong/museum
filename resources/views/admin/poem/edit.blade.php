@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑 poem</div>

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

          <form action="{{ URL('admin/poem/'.$poem->id) }}" method="POST" enctype="multipart/form-data" >
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="poempicture_name"><span class="label label-primary">图片名称:</span></label>
              <input type="text" name="picture_name" id="poempicture_name" class="form-control" required="required" value="{{ $poem->picture }}">
            </div>
            <div class="form-group">
              <label for="poemtitle"><span class="label label-primary">标题:</span></label>
              <input type="text" name="title" id="poemtitle" class="form-control" required="required" value="{{ $poem->title }}">
            </div>
            <div class="form-group">
              <label for="poemcontent"><span class="label label-primary">内容:</span></label>
              <textarea name="content" rows="10" id="poemcontent" class="form-control" required="required">{{ $poem->content}}</textarea>
              
            </div>
            <div class="form-group">
              <label for="poemcomment"><span class="label label-primary">评论:</span></label>
              <textarea type="text" name="comment" id="poemcomment" rows="10" class="form-control" >{{ $poem->comment }}</textarea>
            </div>
            <div class="form-group">
              <label for="poemyear"><span class="label label-primary">年份:</span></label>
              <input type="text" name="year" id="poemyear" class="form-control"  value="{{ $poem->year }}">
            </div>
            <div class="form-group">
              <label for="poemcategory"><span class="label label-primary">作者:</span></label>
              <input type="text" name="author" id="poemauthor" class="form-control" value="{{ $poem->author }}">
            </div>
            <div class="form-group">
              <label for="poempicture"><span class="label label-primary">图片：</span></label>
              <input type="file" name="picture" id="poempicture" onchange="previewFile(this);">
              <br> 
              <img class="img-preview" src="{{ asset('content/poem/image')."/".$poem->picture.".jpg" }}" height="200px" alt="预览" onerror="imgError(this);">
            </div>
            <div class="form-group">
              <label for="poemcategory"><span class="label label-primary">诗集:</span></label>
              <input type="text" name="category" id="poemcategory" class="form-control" value="{{ $poem->category }}">
            </div>
            <hr>
            <br>
            <button class="btn btn-lg btn-info">编辑 poem</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection