@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">后台首页</div>

        <div class="panel-body">

        <a href="{{ URL('admin/oldbeijing/create') }}" class="btn btn-lg btn-primary">新增</a>

          @foreach ($oldbeijings as $oldbeijing)
            <hr>
            <div class="media">
              <h4>{{ $oldbeijing->entry }}</h4>
              <div class="media-left">
                <a href="#">
                  <img src="{{ asset('content/oldbeijing/image')."/".$oldbeijing->item_id }}.jpg" alt="" class="img-rounded" style="width:100px;" onerror="imgError(this);">
                </a>
              </div>
              <div class="media-body">
                <button type="button" class="btn btn-default" onclick="playSound(this);">
                  <audio src="{{asset('content/oldbeijing/sound')."/".$oldbeijing->item_id}}.wav"></audio>
                  <span class="glyphicon glyphicon-play" aria-hidden="true"></span> 播放
                </button>
                <p><span>北京话词条：</span> {{ $oldbeijing-> beijing_entry}} </p>
                <p><span>释义：</span>{{ $oldbeijing->interpretation }}</p>

              </div>
            </div>
            <br>
            <a href="{{ URL('admin/oldbeijing/'.$oldbeijing->id.'/edit') }}" class="btn btn-success">编辑</a>

            <form action="{{ URL('admin/oldbeijing/'.$oldbeijing->id) }}" method="POST" style="display: inline;">
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
    <?php echo $oldbeijings->render(); ?>
  </ul>
</nav>
@endsection