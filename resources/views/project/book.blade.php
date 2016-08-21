@extends('app')

@section('content')
	@if ($search)
	<div class="container">
		<p>数据：<strong>{{$search."\t"}}</strong> 搜索到{{ count($books)}}条结果:</p>
	</div>
	@endif

	<link rel="stylesheet" href="{{asset('/css/normalize-places.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/style2.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
	<script src="{{ asset('/js/modernizr.custom-places.js')}}"></script>
	<style type="text/css">
		.logo img{
			width: 236px;
			height: 38px;
			vertical-align: middle;
		}

		span.next{
			opacity: 0.5;
		}

		span.next:hover{
			opacity: 1;
		}

		span.pre{
			opacity: 0.5;
		}

		span.pre:hover{
			opacity: 1;
		}

		.top-bar{
			display: none;
		}

		body{
			overflow: hidden;
		}

		.wrapper{
			position: absolute;
			top: 50px;
			bottom: 0;
		}

		.grid{
			max-height: calc(100% - 50px);
			bottom: 40px;
			top: 0;
			overflow-y: scroll;
			color: #7b7b7b;
		}

		.grid a{
			text-decoration: none;
		}

		#theSidebar{
			color: #7b7b7b;
		}

		#theSidebar>h1{
			font-size: 3em;
			font-weight: bold;
		}

		.meta__misc--seperator{
			margin-left: 0;
		}

		.meta__misc--seperator>ul{
			padding-left: 0;
			text-align: center;
		}
		
		.meta__misc--seperator li{
			list-style: none;
		}

		.pic_photo{
			max-height: 40vh;
			min-width: 50vh;
		}

		.pagination>li>a,.pagination>li>span{
			color: #B44242;
		}
	
		.pagination>li>a:hover{
			color: #B44242;	
		}

		.pagination>.active>span,.pagination>.active>span:hover{
			border-color: #B44242;
			background-color: #B44242;
		}

		.pagination>li:nth-child(4){
			display: none;
		}

		.pagination>li:nth-child(5){
			display: none;
		}

		.pagination>li:nth-child(6){
			display: none;
		}

		.pagination>li:nth-child(7){
			display: none;
		}

		.pagination>li:nth-child(8){
			display: none;
		}

		.pagination>li:nth-child(9){
			display: none;
		}

		span.fa-chevron-left:before{
			font-family: 'fontawesome';
		}

		.pagination>li:nth-last-child(4){
			display: inline;
		}

		.pagination>li:nth-last-child(3){
			display: inline;
		}

		.pagination>li:nth-last-child(2){
			display: inline;
		}

		.pagination>li:nth-last-child(1){
			display: inline;
		}
		
		.nav{
			list-style: none;
		}

		.menu>.container{
			height: 100%;
			padding: 0px !important;
		}

		.menu{
			background-color: #f5f5f5;
			margin-bottom: 0px;
			border-bottom: none;
			height: 4vh;
			z-index: 999;
			display: flex;
			justify-content: center;
		}

		.navbar-header{
			position: absolute;
			right: 20px;
		}

		.navbar-collapse.collapse{
			display: flex !important;
			background-color: #f5f5f5;
			margin: auto;
			width: 100%;
			flex-wrap: nowrap;
			overflow: auto;
			font-size: 16px;
		}

		.navbar-collapse.collapse.in{
			overflow-y: auto !important;
			position: absolute;
			top: 50px;
			border-top: 1px solid #161616;
		}

		/*每一个小项，hover效果*/
		.grid__item:hover{
			color: #B44242 !important;
		}

		/*三条横线的颜色*/
		.navbar-inverse .navbar-toggle .icon-bar{
			background-color: #B44242;
		}

		/*右上角的三天横线的背景色*/
		.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover{
			background-color: white;
		}

		/*每个主页的左侧padding-top*/
		#theSidebar{
			padding-top: 0.5em;
		}

		.navbar-inverse .navbar-nav>li>a{
			font-size: 20px;
		}

		/*最上面的菜单栏的hover字体颜色*/
		.navbar-inverse .navbar-nav>li>a:hover{
			color: #B44242;
		}

		@media screen and (max-width: 768px){
			.navbar-collapse.collapse{
				display: block !important;
				float: left;
				position: absolute;
				top: 50px;	
				width: 100%;
				margin-left: 0px;
			}

			.menu>.container{
				width: 100%;
				padding: 0px !important;
			}
		}

		@media screen and (max-width: 600px){
			.menu{
				margin-left: 0px;
			}

			.sidebar{
				display: none;
			}

			.wrapper{
				width: 100%;
			}

			.grid{
				width: 100%;
				overflow-y:auto;
			}
		}

		@media screen and (min-width: 600px){
			.menu{
				margin-left: 300px;
			}
		}

		@media screen and (max-width: 1200px){
			.navbar-collapse.collapse{
				visibility: hidden !important;
			}

			.navbar-collapse.collapse.in{
				visibility: visible !important;
			}

			.navbar-toggle.collapsed{
				display: block !important;
			}

			.navbar-nav>li{
				float: none;
			}
		}

		@media screen and (min-width:  1200px){
			.navbar-collapse.collapse.in{
				visibility: visible !important;
				top: 0px;
				border-top: none;
			}			
		}

		.scroll-wrap{
			background-color: #f5f5f5;
		}

		.main{
			position:relative;
			height:100%;
		}

		nav{
			position: absolute;
			bottom: 0px;
		}

		nav>.pagination{
			margin: 0px;
		}

		nav>.pagination>.pagination{
			margin: 0px;
		}
	</style>

    <div class="navbar navbar-inverse navbar-fixed-top menu">
      <div class="container">

        <div class="navbar-header">
        	<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
          	</button>
        </div>

        <div class="navbar-collapse collapse" role="navigation">
			<ul class="nav navbar-nav">
				<li>
					<a  href="/">首页</a>
				</li>

				<li>
					<a {{ (Request::path() == 'place' ? 'class=active' : '') }} href="{{ url('/place') }}">
						地名
					</a>
				</li>

				<li>
					<a {{ (Request::path() == 'book' ? 'class=active' : '') }} href="{{ url('/book') }}">
						北京话文献
					</a>
				</li>

				<li>
					<a {{ (strpos(Request::path(),'chant')!==false ? 'class=active' : '') }} href="{{ url('/chant') }}">
						吟诵
					</a>
				</li>

				<li>
					<a {{ (Request::path() == 'poem' ? 'class=active' : '') }} href="{{ url('/poem') }}">
						清代御诗
					</a>
				</li>

				<li>
					<a {{ (Request::path() == 'dict' ? 'class=active' : '') }} href="{{ url('/dict') }}">
						土语词典
					</a>
				</li>

				<li>
					<a {{ (Request::path() == 'english' ? 'class=active' : '') }} href="{{ url('/english') }}">
						外语
					</a>
				</li>

				<li>
					<a {{ (Request::path() == 'oral' ? 'class=active' : '') }} href="{{ url('/oral') }}">
						口传文化
					</a>
				</li>

				<li>
					<a {{ (Request::path() == 'oldbeijing' ? 'class=active' : '') }} href="{{ url('/oldbeijing') }}">
						话说老北京
					</a>
				</li>				
			</ul>
        </div>
      </div>
    </div>


	<div class="wrapper">
		<div id="theSidebar" class="sidebar">
			<div class="logo">
				<a href="/">
					<img src="{{ asset('/assets/img/icon/logo.png') }}">	
				</a>
				
			</div>

			<div id="search">
				<input class="box" type="text" title="在此输入搜索内容">
				<input type="submit" class="button" title="搜索" value="GO">
			</div>
			<!-- <button class="close-button fa fa-fw fa-close"></button> -->
			
			<h1>北京话文献</h1>

			<div class="info">
				<h3>本项目是对北京话研究历史文献叙录及目录进行归纳和整理。项目收集北京话研究历史文献的叙录及目录，进行资源建设与研究。共包括三个部分，分别是：直接记录现当代北京方言土语或口语的辞书和准辞书；用北京话撰写的文学作品中的语汇辞书和语汇索引书；清代国家机关主持编撰的多体《清文鉴》类辞书和准辞书的现代整理本</h3>
			</div>
		</div>

		<div id="theGrid" class="main">
			<section class="grid" id="container">
				<header class="top-bar">
				</header>

				@foreach ($books as $book)
					<a class="grid__item" href="#">
						<h2 class="title title--preview">{{ $book->title }}</h2>
						<div class="loader"></div>
						<span class="category">{{ $book->author }}</span>
						<div class="meta meta--preview">						
							<img class="lazy meta__avatar" src="{{ asset('/assets/img/logo.png') }}" data-original="{{ asset('content/book/thumbnails')."/".$book->fengmian }}" alt="图片暂缺" onerror="imgError(this);">
						</div>
					</a>
				@endforeach
			</section>

			<section class="content">
				<div class="scroll-wrap">
				@foreach ($books as $book)
					<article class="content__item">

						<div class="meta meta--full">
							<img src="{{ asset('/assets/img/logo.png') }}" style="width:236px; height: 38px; vertical-align: middle" >

							<img data-src="{{ asset('content/book/thumbnails')."/".$book->fengmian }}" alt="图片暂缺" class="meta__avatar" onerror="imgError(this);">

							<span class="meta__subTitle">{{ $book->title }}</span>

							<div class="meta__misc--seperator">
								<ul>
									<li>类型 ：{{ $book-> type}}</li>
									<li>书名 ：{{ $book-> title}}</li>
									<li>作者 ：{{ $book-> author}}</li>
									<li>年份 ：{{ $book-> year}}</li>
								</ul>
							</div>

							<span class="fa fa-chevron-left fa-2x pre" aria-hidden="true" style="position: absolute; bottom: 15vh; left: 5vw; z-index: 999"></span>

							<span class="fa fa-chevron-right fa-2x next"  aria-hidden="true" style="position: absolute; bottom: 15vh; right: 5vw; z-index: 999"></span>
						</div>

						<div class="picture">
							<img class="pic_photo img-responsive" data-src="{{ asset('content/book')."/".$book->fengmian }}" alt="图片暂缺" onerror="imgError(this);" />

							<img class="pic_photo" data-src="{{ asset('content/book')."/".$book->mulu }}" class="pic_photo" alt="图片暂缺" onerror="imgError(this);" />
						</div>

						<div class="detail" style="max-height: calc(85vh - 60px);overflow:auto">
							<h2 class="title title--full">{{ $book-> title }}</h2>
							<p>{{ $book->introduction }}</p>
						</div>
					</article>
				@endforeach
				</div>
				<button class="close-button">
					<i class="fa fa-close  glyphicon glyphicon-remove"></i>
				</button>

			</section>

			<nav>
				<ul class="pagination">
					<?php echo $books->render(); ?> 
				</ul>
			</nav>
		</div>

	</div>
	<script type="text/javascript">
		'use strict';
		var position = -1;
		var content__item = $('.content__item');
		var grid__item = $('.grid__item');
		var length = grid__item.length;
		var where = ['place','book','chant','poem','dict','english','oral','oldbeijing'];
	</script>

	<script src="{{ asset('/js/classie-places.js')}}"></script>
	<script src="{{ asset('/js/place-main.js')}}"></script>

	<script type="text/javascript">
		var left = $('.fa.fa-chevron-left.fa-2x.pre');
		var right = $('.fa.fa-chevron-right.fa-2x.next');
		if ( position == 0 ) {
			$(left).css('visibility','hidden');
		}

		if ( position == length - 1) {
			$(right).css('visibility','hidden');
		}

		$('.pre').click( function (argument) {
			$(right).css('visibility','visible');
			var pre = position;
			position -- ;

			if( position == -1 ){
				position = 0;
				return;
			}

    		var imgs = $('img[data-src]');
			var thumbnail = imgs[position * 3];
			var origin = imgs[position * 3 + 1];
			var detail = imgs[position * 3 + 2];
			thumbnail.src = $(thumbnail).attr('data-src');
			origin.src = $(origin).attr('data-src');
			detail.src = $(detail).attr('data-src');

			$(left).css('visibility','visible');

			$(content__item[pre]).removeClass('content__item--show');
			$(content__item[position]).addClass('content__item--show');

			$(grid__item[pre]).removeClass('grid__item--loading');
			$(grid__item[pre]).removeClass('grid__item--animate');

			$(grid__item[position]).addClass('grid__item--loading');
			$(grid__item[position]).addClass('grid__item--animate');

			if ( position == 0) {
				$(left).css('visibility','hidden');
			}
		});

		$('.next').click( function (argument) {
			$(left).css('visibility','visible');
			var pre = position;
			position ++ ;

			if( position == length ){
				position = length - 1;
				return;
			}

    		var imgs = $('img[data-src]');
			var thumbnail = imgs[position * 3];
			var origin = imgs[position * 3 + 1];
			var detail = imgs[position * 3 + 2];
			thumbnail.src = $(thumbnail).attr('data-src');
			origin.src = $(origin).attr('data-src');
			detail.src = $(detail).attr('data-src');

			$(right).css('visibility','visible');

			$(content__item[pre]).removeClass('content__item--show');
			$(content__item[position]).addClass('content__item--show');

			$(grid__item[pre]).removeClass('grid__item--loading');
			$(grid__item[pre]).removeClass('grid__item--animate');

			$(grid__item[position]).addClass('grid__item--loading');
			$(grid__item[position]).addClass('grid__item--animate');

			if (position == length -1 ) {
				$(right).css('visibility','hidden');
			}
		});

		$('.close-button').click(function(){
			$(content__item[position]).removeClass('content__item--show');
			$(grid__item[position]).removeClass('grid__item--loading');
			$(grid__item[position]).removeClass('grid__item--animate');

			$('.grid').css('overflow-y','scroll');
			$('.menu').delay(500).slideDown(1000,function(){});
			$('.wrapper').css('top','5vh');

			$(left).css('visibility','visible');
			$(right).css('visibility','visible');
		});    

		$('.grid__item').click(function(event){
			console.log('ready');
			$('.grid').css('overflow-y','hidden');
			$('.menu').delay(500).slideUp(1000,function(){
				if ( position == 0 ) {
					$(left).css('visibility','hidden');
				}

				if ( position == length - 1) {
					$(right).css('visibility','hidden');
				}				
				$('.wrapper').delay(1500).css('top','0vh');

	    		var imgs = $('img[data-src]');
				var thumbnail = imgs[position * 3];
				var origin = imgs[position * 3 + 1];
				var detail = imgs[position * 3 + 2];
				thumbnail.src = $(thumbnail).attr('data-src');
				origin.src = $(origin).attr('data-src');
				detail.src = $(detail).attr('data-src');
			});
		});

		var pathname = location.pathname.split('/');
		var nav = $('.nav.navbar-nav')[0].children;
		var index = where.indexOf( pathname[1] );

		if (  index > -1 ) {
			var a = nav[index + 1].firstElementChild;
			$(a).css('text-decoration','underline');
			$(a).css('color','#B44242');
		}
	</script>

	<script type="text/javascript">
		
        $(function () {
            $("img.lazy").lazyload({
                container: $("#container")
            });
        });
    
	</script>
@endsection
