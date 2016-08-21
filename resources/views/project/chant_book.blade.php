@extends('project.chant')

@section('chant_content')
	<style type="text/css">
		.nav-pills>li>a{
			color: #9d9d9d;
		}

		.nav-pills>li.active>a{
			color: #9d9d9d;
			/*background-color: #fff;*/
		}

		.nav-pills>li.active>a:hover{
			color: #B44242;
		}

		.list-group-item>div{
			text-align: left;
			font-size: 16px;
		}
	</style>

	<div id="content" style="overflow-y:auto; height:100%;">
<!-- 		<ul class="nav nav-pills" style="margin: 20px 100px 0 ;">
			<li {{ ($category == 'ancient' ? 'class=active' : '') }}><a href="{{ url('/chant/book?book=ancient')}}">北京话吟诵</a></li>
			<li {{ ($category == 'modern' ? 'class=active' : '') }}><a href="{{url('/chant/book?book=modern')}}">普通话吟诵</a></li>
		</ul> -->
		<ul>
			@foreach ($books as $book)
			<li style="" class="list-group-item">
				<div class="title">
						{{$book}}
				</div>
			</li>
			@endforeach
		</ul>
	</div>
	
@endsection