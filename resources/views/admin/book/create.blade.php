@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增 Book</div>

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

          <form action="{{ URL('admin/book') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="bookfengmian"><span class="label label-primary">封面图片名:</span></label>
              <input type="text" name="fengmian" id="bookfengmian" class="form-control">
            </div>
            <div class="form-group">
              <label for="bookmulu"><span class="label label-primary">目录图片名:</span></label>
              <input type="text" name="mulu" id="bookmulu" class="form-control">
            </div>
            <div class="form-group">
              <label for="bookType"><span class="label label-primary">类型:</span></label>
              <input type="text" name="type" id="bookType" class="form-control">
            </div>
            <div class="form-group">
              <label for="bookTitle"><span class="label label-primary">书名:</span></label>
              <input type="text" name="title" id="bookTitle" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="bookAuthor"><span class="label label-primary">作者:</span></label>
              <input type="text" name="author" id="bookAuthor" class="form-control" >
            </div>
            <div class="form-group">
              <label for="bookEdition"><span class="label label-primary">版本:</span></label>
              <input type="text" name="edition" id="bookEdition" class="form-control">
            </div>
            <div class="form-group">
              <label for="bookPublisher"><span class="label label-primary">出版社:</span></label>
              <input type="text" name="publisher" id="bookpublisher" class="form-control">
            </div>
            <div class="form-group">
              <label for="bookYear"><span class="label label-primary">年代:</span></label>
              <input type="text" name="year" id="bookYear" class="form-control">
            </div>
            <div class="form-group">
              <label for="bookIntroduction"><span class="label label-primary">介绍:</span></label>
              <textarea name="introduction" id="bookIntroduction" rows="10" class="form-control" ></textarea>
            </div>
            <div class="form-group">
              <label for="bookNote"><span class="label label-primary">注:</span></label>
              <input type="text" name="note" id="bookNote" class="form-control">
            </div>
            <div class="form-group">
              <label for="bookFengmian"><span class="label label-primary">封面：</span></label>
              <input type="file" name="fengmian" id="bookFengmian" onchange="previewFile(this);">
              <br>
              <img class="img-preview" src="" height="200px" alt="预览" onerror="imgError(this);">
              <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>
            <hr>
            <div class="form-group">
              <label for="bookMulu"><span class="label label-primary">目录：</span></label>
              <input class="img-file" type="file" name="mulu" id="bookMulu" onchange="previewFile(this);">
              <br>
              <img class="img-preview" src="" height="200px" alt="预览" onerror="imgError(this);">
              <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>
            <hr>
            <br>
            <button class="btn btn-lg btn-info">新增文献</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection