@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">后台首页</div>

        <div class="panel-body">

        <a href="{{ URL('admin/english/create') }}" class="btn btn-lg btn-primary">新增</a>

          @foreach ($englishes as $english)
            <hr>
            <div class="media">
              <h4>{{ $english->content }}</h4>
              <div class="media-left">
                <a href="#">
                  <img src="{{ asset('content/english/picture')."/".$english->picture}}.JPG" alt="" class="img-rounded" style="width:100px;" onerror="imgError(this);">
                </a>
              </div>
              <div class="media-body">
                <p><span>功能：</span> {{ $english-> function}} </p>
                <p><span>分类1：</span>{{ $english-> category1 }}</p>
              </div>
            </div>
            <br> 
            <a href="{{ URL('admin/english/'.$english->id.'/edit') }}" class="btn btn-success">编辑</a>

            <form action="{{ URL('admin/english/'.$english->id) }}" method="POST" style="display: inline;margin-left: 200px"">
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
    <?php echo $englishes->render(); ?>
  </ul>
</nav>
@endsection