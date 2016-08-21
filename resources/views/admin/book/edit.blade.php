@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑 book</div>

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

          <form action="{{ URL('admin/book/'.$book->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="bookType"><span class="label label-primary">类型:</span></label>
              <input type="text" name="type" id="bookType" class="form-control" required="required" value="{{ $book->type }}">
            </div>
            <div class="form-group">
              <label for="bookTitle"><span class="label label-primary">书名:</span></label>
              <input type="text" name="title" id="bookTitle" class="form-control" required="required" value="{{ $book->title }}">
            </div>
            <div class="form-group">
              <label for="bookAuthor"><span class="label label-primary">作者:</span></label>
              <input type="text" name="author" id="bookAuthor" class="form-control" value="{{ $book->author }}">
            </div>
            <div class="form-group">
              <label for="bookEdition"><span class="label label-primary">版本:</span></label>
              <input type="text" name="edition" id="bookEdition" class="form-control"  value="{{ $book->edition }}">
            </div>
            <div class="form-group">
              <label for="bookPublisher"><span class="label label-primary">出版社:</span></label>
              <input type="text" name="Publisher" id="bookpublisher" class="form-control" value="{{ $book->publisher }}">
            </div>
            <div class="form-group">
              <label for="bookYear"><span class="label label-primary">年代:</span></label>
              <input type="text" name="year" id="bookYear" class="form-control" value="{{ $book->year }}">
            </div>
            <div class="form-group">
              <label for="bookIntroduction"><span class="label label-primary">介绍:</span></label>
              <textarea name="introduction" id="bookIntroduction" rows="10" class="form-control" required="required">{{ $book->introduction }}</textarea>
            </div>
            <div class="form-group">
              <label for="bookTitle"><span class="label label-primary">注:</span></label>
              <input type="text" name="title" id="bookTitle" class="form-control" value="{{ $book->title }}">
            </div>
            <div class="form-group">
              <label for="bookFengmian"><span class="label label-primary">封面：</span></label>
              <input type="file" name="fengmian" id="bookFengmian" onchange="previewFile(this);">
              <br> 
              <img class="img-preview" src="{{ asset('content/book')."/".$book->fengmian }}" height="200px" alt="预览" onerror="imgError(this);">
              <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>
            <hr>
            <div class="form-group">
              <label for="bookMulu"><span class="label label-primary">目录：</span></label>
              <input type="file" name="mulu" id="bookMulu" onchange="previewFile(this);">
              <br>
              <img class="img-preview" src="{{ asset('content/book')."/".$book->mulu }}" height="200px" alt="预览"  onerror="imgError(this);" >
              <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>
            <hr>
            <div class="form-group">
              <label for="bookPdf"><span class="label label-primary">PDF：</span></label>
              <input type="file" name="pdf" id="bookPdf">
              <!-- <p class="help-block">Example block-level help text here.</p> -->
              <img class="img-preview" src="{{ asset('content/book')."/".$book->mulu }}" height="200px" alt="预览"  onerror="imgError(this);" >
            </div>
            <br>
            <button class="btn btn-lg btn-info">编辑文献</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection