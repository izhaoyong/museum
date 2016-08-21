@extends('app')
@section('content')
  <h4>
    <a href="/">⬅️返回首页</a>
  </h4>

  <h1 style="text-align: center; margin-top: 50px;">{{ $oldbeijing->entry }}</h1>
  <hr>
<div id="content" class="container" style="padding: 50px;">
    <ul class="list-group">
      <li class="list-group-item row">
        <span class="label label-primary">词条:</span>{{ $oldbeijing-> entry}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">北京话词条:</span>{{ $oldbeijing-> beijing_entry}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">发音:</span>{{ $oldbeijing-> pronunciation}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">释义:</span>{{  $oldbeijing->interpretation}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">声音:</span>
        <button type="button" class="btn btn-default" onclick="playSound(this);">
          <audio src="{{asset('content/oldbeijing/sound')."/".$oldbeijing->item_id}}.wav"></audio>
          <span class="glyphicon glyphicon-play" aria-hidden="true"></span> 播放
        </button>
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">分类:</span>{{ $oldbeijing->category }}
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">图片:</span>
        </div>
        <div class="col-md-6 col-md-offset-3" >
          <img src="{{ asset('content/oldbeijing/image')."/".$oldbeijing->item_id }}.jpg" class="img-responsive" alt="Responsive image" >
        </div>
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">创建时间:</span>{{ $oldbeijing->created_at }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">更新时间:</span>{{ $oldbeijing->updated_at }}
      </li>
    </ul>
  </div>

@endsection