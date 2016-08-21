@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增 place</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('admin/place') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="placename"><span class="label label-primary">地名:</span></label>
              <input type="text" name="name" id="placename" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="placeregion"><span class="label label-primary">城区:</span></label>
              <input type="text" name="region" id="placeregion" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="placemandarin"><span class="label label-primary">普通话音:</span></label>
              <input type="text" name="mandarin" id="placemandarin" class="form-control">
            </div>
            <div class="form-group">
              <label for="placeYear"><span class="label label-primary">北京话音:</span></label>
              <input type="text" name="beijing" id="placeYear" class="form-control">
            </div>
            <div class="form-group">
              <label for="placetraditional"><span class="label label-primary">繁体:</span></label>
              <input type="text" name="traditional" id="placetraditional" class="form-control" >
            </div>
            <div class="form-group">
              <label for="placeDescription"><span class="label label-primary">介绍:</span></label>
              <textarea name="description" id="placeexplaination" class="form-control" id="placeDescription" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="placeexplaination"><span class="label label-primary">注:</span></label>
              <textarea name="explaination" id="placeexplaination" class="form-control" id="" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label for="placeJiedao"><span class="label label-primary">图：</span></label>
              <input type="file" name="jiedao" id="placeJiedao" onchange="previewFile(this);">
              <br> 
              <img class="img-preview" src="" height="200px" alt="预览" onerror="imgError(this);">
            </div>
            <div class="form-group">
              <label for="placeJiepai"><span class="label label-primary">图：</span></label>
              <input type="file" name="jiepai" id="placeJiepai" onchange="previewFile(this);">
              <br> 
              <img class="img-preview" src="" height="200px" alt="预览" onerror="imgError(this);">
            </div>
            <hr>
            <br>
            <button class="btn btn-lg btn-info">新增 place</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection