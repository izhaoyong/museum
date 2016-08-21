@extends('app')
@section('content')
  <h4>
    <a href="/">⬅️返回首页</a>
  </h4>
  <?php 
    $filename = pathinfo($chant->media,PATHINFO_FILENAME);
    $media_class = pathinfo($chant->media,PATHINFO_EXTENSION);
  ?>
  <h1 style="text-align: center; margin-top: 50px;">{{ $chant->title }}</h1>
  <hr>
  <div id="content" class="container" style="padding: 50px;">
    <ul class="list-group">
      <li class="list-group-item row">
        <span class="label label-primary">吟诵者:</span>{{ $chant-> chanter}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">视频名:</span>{{ $chant-> media}}
      </li>
      <li class="list-group-item row">
        <div><span class="label label-primary">视频：</span></div>
        @if ($media_class == 'flv')
        <div class="col-md-6 col-md-offset-2" >
          <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="550" height="433" id="AssPlayer" align="middle">
            <param name="movie" value="AssPlayer.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#ffffff" />
            <param name="play" value="true" />
            <param name="loop" value="true" />
            <param name="wmode" value="window" />
            <param name="scale" value="showall" />
            <param name="menu" value="true" />
            <param name="devicefont" value="false" />
            <param name="salign" value="" />
            <param name="allowScriptAccess" value="sameDomain" />
            <param name="allowFullScreen" value="true">
            <param name="flashvars" value="videoSrc={{ asset('content/chant')."/".$chant->category.'/'.$chant->media }}&subtitleSrc={{ asset('content/chant/subtitle')."/".$chant->title.'.xml' }}">
            <object type="application/x-shockwave-flash" data="{{asset('AssPlayer.swf')}}" width="550" height="433">
              <param name="movie" value="AssPlayer.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#ffffff" />
              <param name="play" value="true" />
              <param name="loop" value="true" />
              <param name="wmode" value="window" />
              <param name="scale" value="showall" />
              <param name="menu" value="true" />
              <param name="devicefont" value="false" />
              <param name="salign" value="" />
              <param name="allowScriptAccess" value="sameDomain" />
              <param name="allowFullScreen" value="true">
              <param name="flashvars" value="videoSrc={{ asset('content/chant')."/".$chant->category.'/'.$chant->media }}&subtitleSrc={{ asset('content/chant/subtitle')."/".$chant->title.'.xml' }}">
              <a href="http://www.adobe.com/go/getflash">
                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获得 Adobe Flash Player" />
              </a>
            </object>
          </object>
        </div>
        @elseif ($media_class == 'mp3')
        @else
        @endif
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">字幕名:</span>{{ $chant-> script}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">诗歌体:</span>{{ $chant-> content}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">内容:</span>{{  $chant->description}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">媒体类型:</span>{{ $chant-> media_class}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">创建时间:</span>{{ $chant->created_at }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">更新时间:</span>{{ $chant->updated_at }}
      </li>
    </ul>
    
    
  </div>

@endsection