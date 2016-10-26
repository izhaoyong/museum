@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">后台首页</div>

        <div class="panel-body">

        <a href="{{ URL('admin/poem/create') }}" class="btn btn-lg btn-primary">新增</a>

          @foreach ($poems as $poem)
            <hr>
            <div class="media">
              <h4>{{ $poem->title }}</h4>
              <div class="media-left">
                <a href="#">
                  <img src="{{ asset('content/poem/image')."/".$poem->picture.".jpg" }}" alt="" class="img-rounded" style="width:100px;" onerror="imgError(this);">
                </a>
              </div>
              <div class="media-body">
                <p>{{ $poem->content }}</p>
                <p> {{ $poem-> category}} </p>

              </div>
            </div>
            <br>
            <a href="{{ URL('admin/poem/'.$poem->id.'/edit') }}" class="btn btn-success">编辑</a>

            <form action="{{ URL('admin/poem/'.$poem->id) }}" method="POST" style="display: inline;margin-left: 200px"">
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
    <?php echo $poems->render(); ?>
  </ul>
</nav>
@endsection