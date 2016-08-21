@extends('app')
@section('content')
  <h4>
    <a href="/">⬅️返回首页</a>
  </h4>

  <h1 style="text-align: center; margin-top: 50px;">{{ $poem->title }}</h1>
  <hr>
  <div id="content" class="container" style="padding: 50px;">
    <ul class="list-group">
      <li class="list-group-item row">
        <span class="label label-primary">标题:</span>{{ $poem-> title}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">内容:</span>{{ $poem-> content}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">评论:</span>{{ $poem-> comment}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">年份:</span>{{  $poem->edition}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">作者:</span>{{ $poem-> author}}
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">图片:</span>
        </div>
        <div class="col-md-6 col-md-offset-3" >
          <img src="{{ asset('content/poem/image')."/".$poem->picture.".jpg" }}" class="img-responsive" alt="Responsive image" onerror="imgError(this);">
        </div>
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">诗集:</span>{{ $poem-> category}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">创建时间:</span>{{ $poem->created_at }}
      </li>

      <li class="list-group-item row">
        <span class="label label-primary">更新时间:</span>{{ $poem->updated_at }}
      </li>
    </ul>
    
  </div>

@endsection