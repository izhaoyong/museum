@extends('app')
@section('content')
  <h4>
    <a href="/">⬅️返回首页</a>
  </h4>

  <h1 style="text-align: center; margin-top: 50px;">{{ $book->title }}</h1>
  <hr>
  <div id="content" class="container" style="padding: 50px;">
    <ul class="list-group">
      <li class="list-group-item row">
        <span class="label label-primary">类型:</span>{{ $book-> type}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">书名:</span>{{ $book-> title}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">作者:</span>{{ $book-> author}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">版本:</span>{{  $book->edition}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">出版社:</span>{{ $book-> publisher}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">年份:</span>{{ $book-> year}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">介绍:</span>{{ $book->introduction }}
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">封面:</span>
        </div>
        <div class="col-md-6 col-md-offset-3" >
          <img src="{{ asset('content/book')."/".$book->fengmian }}" class="img-responsive" alt="Responsive image" onerror="imgError(this);">
        </div>
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">目录:</span>
        </div>
        <div class="col-md-6 col-md-offset-3" >
          <img src="{{ asset('content/book')."/".$book->mulu }}" class="img-responsive" alt="Responsive image" onerror="imgError(this);">
        </div>
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">PDF:</span>{{ $book-> pdf }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">创建时间:</span>{{ $book->created_at }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">更新时间:</span>{{ $book->updated_at }}
      </li>
    </ul>

    <!-- <div class="row">
      <div class="col-md-6 col-md-offset-3" >
        <img src="{{ asset('content/book')."/".$book->fengmian }}" class="img-responsive" alt="Responsive image">
      </div>
      
    </div> -->
    
  </div>

@endsection