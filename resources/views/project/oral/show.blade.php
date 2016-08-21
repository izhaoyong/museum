@extends('app')
@section('content')
  <h4>
    <a href="/">⬅️返回首页</a>
  </h4>

  <h1 style="text-align: center; margin-top: 50px;">{{ $oral->name }}</h1>
  <hr>
  <div id="content" class="container" style="padding: 50px;">
    <ul class="list-group">
      <li class="list-group-item row">
        <span class="label label-primary">叫卖人:</span>{{ $oral-> speaker}}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">内容:</span>{{ $oral-> content}}
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">视频快照:</span>
        </div>
        <div class="col-md-6 col-md-offset-2" >
          <img src="{{ asset('content/oral/picture')."/".$oral->speaker.'\\'.$oral->video }}.jpg" class="img-responsive" alt="Responsive image" onerror="imgError(this);">
        </div>
      </li>
      <li class="list-group-item row">
        <div>
          <span class="label label-primary">视频:</span>
        </div>

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
            <!-- <param name="flashvars" value="videoSrc=content/oral/video/.$oral->speaker.'\\'.$oral->video&subtitleSrc=content/oral/xml/.$oral->xml"> -->
            
            <param name="flashvars" value="videoSrc={{ asset('content/oral/video')."/".$oral->speaker.'\\'.$oral->video.'.flv' }}&subtitleSrc={{ asset('content/oral/subtitle')."/".$oral->speaker.'\\'.$oral->name.'.xml' }}">
            <!--[if !IE]>-->
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
               <param name="flashvars" value="videoSrc={{ asset('content/oral/video')."/".$oral->speaker.'\\'.$oral->video.'.flv' }}&subtitleSrc={{ asset('content/oral/subtitle')."/".$oral->speaker.'\\'.$oral->name.'.xml' }}">
            <!--<![endif]-->
              <a href="http://www.adobe.com/go/getflash">
                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获得 Adobe Flash Player" />
              </a>
            <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
        </div>
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">字幕:</span>{{ $oral-> subtitle }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">创建时间:</span>{{ $oral->created_at }}
      </li>
      <li class="list-group-item row">
        <span class="label label-primary">更新时间:</span>{{ $oral->updated_at }}
      </li>
    </ul>
  </div>

@endsection