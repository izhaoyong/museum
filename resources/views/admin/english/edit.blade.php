@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑外语</div>

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

          <form action="{{ URL('admin/english/'.$english->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="englishcontent"><span class="label label-primary">照片标识:</span></label>
              <input name="picture_id" id="englishpicture" rows="10" class="form-control" required="required" value="{{ $english->picture }}"></input>
            </div>
            <div class="form-group">
              <label for="englishcontent"><span class="label label-primary">内容:</span></label>
              <textarea name="content" id="englishcontent" rows="10" class="form-control" required="required">{{ $english->content }}</textarea>
            </div>
            <div class="form-group">
              <label for="englishpiacture"><span class="label label-primary">图片：</span></label>
              <input type="file" name="picture" id="englishpiacture" onchange="previewFile(this);">
              <br> 
              <img class="img-preview" src="{{ asset('content/english/picture')."/".$english->picture}}.JPG" height="200px" alt="预览" onerror="imgError(this);">
            </div>
            <div class="form-group">
              <label for="englishfunction"><span class="label label-primary">功能:</span></label>
              <input type="text" name="function" id="englishfunction" class="form-control" required="required" value="{{ $english->function }}">
            </div>
            <div class="form-group">
              <label for="englishcategory1"><span class="label label-primary">分类1:</span></label>
              <input type="text" name="category1" id="englishcategory1" class="form-control" value="{{ $english->category1 }}">
            </div>
            <div class="form-group">
              <label for="englishcategory2"><span class="label label-primary">分类2:</span></label>
              <input type="text" name="category2" id="englishcategory2" class="form-control" value="{{ $english->category2 }}">
            </div>
            <div class="form-group">
              <label for="englishrecording_date"><span class="label label-primary">拍摄时间:</span></label>
              <input type="text" name="recording_date" id="englishrecording_date" class="form-control" required="required" value="{{ $english->recording_date }}">
            </div>
            <div class="form-group">
              <label for="englishrecorder"><span class="label label-primary">拍摄人:</span></label>
              <input type="text" name="recorder" id="englishrecorder" class="form-control" value="{{ $english->recorder }}">
            </div>
            <div class="form-group">
              <label for="englishplace"><span class="label label-primary">拍摄地点:</span></label>
              <input type="text" name="place" id="englishplace" class="form-control" value="{{ $english->place }}">
            </div>
            <div class="form-group">
              <label for="englishcommentator"><span class="label label-primary">评价人:</span></label>
              <input type="text" name="commentator" id="englishcommentator" class="form-control" value="{{ $english->commentator }}">
            </div>
            <div class="form-group">
              <label for="englishdescription"><span class="label label-primary">评价:</span></label>
              <input type="text" name="description" id="englishdescription" class="form-control"  value="{{ $english->description }}">
            </div>
            <hr>
            <br>
            <button class="btn btn-lg btn-info">编辑外语</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection