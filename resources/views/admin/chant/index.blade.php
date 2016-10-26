@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">后台首页</div>

        <div class="panel-body">

        <a href="{{ URL('admin/chant/create') }}" class="btn btn-lg btn-primary">新增</a>

          @foreach ($chants as $chant)
            <hr>
            <h4>{{ $chant->title }}</h4>
            <?php 
              $filename = pathinfo($chant->media,PATHINFO_FILENAME);
              $media_class = pathinfo($chant->media,PATHINFO_EXTENSION);
            ?>
            <div class="media">
              <div class="media-left">
                @if ($media_class == 'flv')
                <a href="#">
                  <img src="{{ asset('content/chant')."/".$chant->category.'/'.$filename.".jpg" }}" alt="" class="img-rounded" style="width:100px;" onerror="imgError(this);">
                </a>
                @elseif ($media_class == 'mp3')
                <button type="button" class="btn btn-default" onclick="playSound(this);">
                  <audio src="{{asset('content/chant')."/".$chant->category.'/'.$chant->media}}"></audio>
                  <span class="glyphicon glyphicon-play" aria-hidden="true"></span> 播放
                </button>
                @else
                @endif
              </div>
              <div class="media-body">
                <p>{{ $chant->author }}</p>
                <p>{{ $chant->media_class}}</p>
              </div>
            </div>
            <br>
            <a href="{{ URL('admin/chant/'.$chant->id.'/edit') }}" class="btn btn-success">编辑</a>

            <form action="{{ URL('admin/chant/'.$chant->id) }}" method="POST" style="display: inline;margin-left: 200px"">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">删除</button>
            </form>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
<nav>
  <ul class="pagination">
    <?php echo $chants->render(); ?>
  </ul>
</nav>
@endsection