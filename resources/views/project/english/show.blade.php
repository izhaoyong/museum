@extends('app')
@section('content')
  <h4>
    <a href="/english">⬅️返回</a>
  </h4>

  <h1 style="text-align: center; margin-top: 50px;">{{ $english->content }}</h1>
  <hr>
  <div id="content" class="container" style="padding: 50px;">
    <ul class="list-group">
      <li class="list-group-item row">
        <span class="label label-primary">内容:</span>{{ $english-> content}}
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">图片:</span>
        </div>
        <div class="col-md-6 col-md-offset-2" >
          <img src="{{ asset('content/english/picture')."/".$english->picture}}.jpg" class="img-responsive" alt="Responsive image" onerror="imgError(this);">
        </div>
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">功能:</span>{{ $english-> function}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">分类1:</span>{{ $english-> category1}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">分类2:</span>{{ $english-> category2}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">拍摄时间:</span>{{ $english-> recording_date}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">拍摄人:</span>{{ $english-> recorder}}
      </li>
      
      <li class="list-group-item row">
        <span class="label label-primary">拍摄地点:</span>{{ $english-> place }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">评价人:</span>{{ $english-> commentator}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">评价:</span>{{ $english-> description }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">创建时间:</span>{{ $english->created_at }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">更新时间:</span>{{ $english->updated_at }}
      </li>
    </ul>
  </div>

@endsection