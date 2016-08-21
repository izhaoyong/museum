@extends('app')
@section('content')
  <h4>
    <a href="/">⬅️返回首页</a>
  </h4>

  <h1 style="text-align: center; margin-top: 50px;">{{ $place->name}}</h1>
  <hr>
  <div id="content" class="container" style="padding: 50px;">
    <ul class="list-group">
      <li class="list-group-item row">
        <span class="label label-primary">地名:</span>{{ $place-> name}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">城区:</span>{{ $place-> region}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">普通话音:</span>{{ $place-> mandarin}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">北京话音:</span>{{  $place->beijing}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">繁体:</span>{{ $place-> traditional}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">介绍:</span>{{ $place-> description}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">注:</span>{{ $place->explaination }}
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">街道图:</span>
        </div>
        <div class="col-md-6 col-md-offset-3" >
          <img src="{{ asset('content/place')."/".$place->name.".jpg" }}" class="img-responsive" alt="Responsive image" onerror="imgError(this);">
        </div>
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">街牌图:</span>
        </div>
        <div class="col-md-6 col-md-offset-3" >
          <img src="{{ asset('content/place')."/".$place->name."街牌.jpg" }}" class="img-responsive" alt="Responsive image" onerror="imgError(this);">
        </div>
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">创建时间:</span>{{ $place->created_at }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">更新时间:</span>{{ $place->updated_at }}
      </li>
    </ul>
    
  </div>

@endsection