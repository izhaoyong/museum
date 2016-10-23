@extends('app')

@section('content')
@if ($search)
	<div class="container">
		<p>数据：<strong>{{$search."\t"}}</strong> 搜索到{{ count($orals)}}条结果:</p>
	</div>
	@endif

	<link rel="stylesheet" href="{{asset('/css/normalize-places.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/style2.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
	<script src="{{ asset('/js/modernizr.custom-places.js')}}"></script>
	
	<link rel="stylesheet" href="{{asset('/css/style.css')}}" />
	<script src="{{ asset('/js/slideout.js')}}"></script>

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
			position:absolute;
			top:50px;
			bottom:0;
		}

		.grid{
			max-height: calc(100% - 50px);
			bottom:40px;
			top:0;
			overflow-y:scroll;
			color:#7b7b7b;
		}

		.grid a{
			text-decoration: none;
		}

		div[class="meta meta--full"]{
			/*top: 50px;*/
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

		span.fa-chevron-left:before{
			font-family: 'fontawesome';
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
		.grid__item{
			color: #7b7b7b !important;
		}

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
				margin: 0px;
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

		@media screen and (max-width: 900px){
			.wrapper{
				width: 100%;
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

		.video{
			max-width: 50vw;
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

		.title--full{
			font-size: 1.25em;
		}

		.picture{
			display: flex;
			justify-content: center;
		}

		.detailButton{
			float:right; 
			margin-right: 1em; 
			padding:0.5em 2em; 
			font-weight:bold; 
			border:none; 
			background:transparent;
			color: #b44242;
		}

		.detailButton:hover{
			color: #777;
		}		
	</style>

	<style type="text/css">
		@media screen and (max-width: 600px){
			.navbar-header{
				display: none;
			}
		}

		@media screen and (min-width: 600px){
			.btn-hamburger.js-slideout-toggle{
				display: none;
			}

			.header-hamburger>button, .header-hamburger>a{
				display: none;
			}
		}

		.fixed {
			backface-visibility: hidden;
			position: fixed;
			z-index:2;
			transition: transform 300ms ease;
		}

		.fixed-open {
			transform: translate3d(140px, 0px, 0px);
		}

		.btn-hamburger {
			position: absolute;
			border-radius: 4px;
			border: none;
			padding: 9px 10px;
			width: 44px;
			top: 8px;
			bottom: 8px;
			background: transparent;
		}

		.btn-hamburger span{
		    display: block;
		    width: 22px;
		    height: 2px;
		    border-radius: 1px;
		    background-color: #B44242;
		}

		.btn-hamburger .icon-bar+.icon-bar {
			margin-top: 4px;
		}

		.header-hamburger>a{
			color: #B44242;
		}

		.header-hamburger>a>button{
			position: absolute;
		    left: 50%;
		    top: 50%;
		    -webkit-transform: translate(-50%,-50%); 
		    -moz-transform: translate(-50%,-50%); 
		    -o-transform: translate(-50%,-50%); 
		    transform: translate(-50%,-50%);
		    border: none;
		    background: transparent;
		    font-size: 24px;
		    text-decoration: underline;
		}

		.header-hamburger>button:nth-child(4){
			position: absolute;
		    right: 12px;
		    top: 50%;
		    width: 24px;
		    height: 24px;
		    -webkit-transform: translate(0, -50%); 
		    -moz-transform: translate(0, -50%); 
		    -o-transform: translate(0, -50%); 
		    transform: translate(0, -50%);
		    border: none;
		    background: transparent;
		    background-image: url('/img/search.svg');
		    background-repeat: no-repeat;
		    background-size: contain;
		}

		#panel{
			background-color: white;
		}

		div.search{
			display: none;
			width: 100%;
			height: 100%;
			z-index: 999;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			background-color: gray;
		}

		div.search>div:nth-child(1){
			display: flex;
			justify-content: space-around;
			margin-top: 5px;
		}

		div.search>div:nth-child(1)>form{
			width: 100%;
		    display: flex;
		    justify-content: space-around;
		}

		div.search>div:nth-child(1)>form>input:nth-child(1){
			width: 60%;
			border-radius: 12px;
			outline: none;
			border: none;
			padding-left: 10px;
			padding-right: 10px;
			height: 28px;
		}

		div.search>div:nth-child(1)>form>input:nth-child(2){
			border-radius: 12px;
			border: none;
			outline: none;
		}
		
		div.search>div:nth-child(1)>form>input:nth-child(3){
			border-radius: 12px;
			border: none;
			outline: none;
		}

		div.search>div:nth-child(2){
			display: flex;
			justify-content: space-around;
			margin-top: 10px; 
		}

		div.search>div:nth-child(2)>button{
			border: none;
			outline: none;
			border-radius: 12px;
			height: 28px;
		}

		#panel>div:nth-child(3){
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			padding: 0;
			border: none;
			background-color: rgba(128,128,128,0.5);
			z-index: 999;
			display: none;
		}

		.menu-section-list>li{
			font-size: 16px;
			border-bottom: 1px solid #e0e0e0;
		}

		.menu-section-list a{
			color: #7b7b7b;
		}

		.menu-section-list a.active{
			color: #b44242;
			font-weight: bolder;
		}

		.tips{
			position: absolute;
			width: 100%;
			height: 100%;
			left: 0;
			top: 0;
			right: 0;
			bottom: 0;
			opacity: 0.9;
			z-index: 999;
			background-color: #b44242;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			visibility: hidden;
		}

		.tips>h3{
			width: 30%;
			color: black;
		}

		.tips>button{
			margin-top: 30px;
			color: black;
		}
	</style>

	<div class="tips">
		<h3>我们现在参观的是口传文化子馆，口传文化子馆是对北京地域口传文化进行研究。项目以数名土生土长的北京著名老艺人为采集对象，以老北京人聚居的城区为采集布点，观察、记录、描述、分析北京商业叫卖。...</h3>
		<button class="know">知道了</button>
	</div>

    <nav id="menu" class="sideMenu slideout-menu" style="background:#fff;">
      <section class="menu-section">
        <ul class="menu-section-list">
			<li><a  href="/">首页</a></li>
			<li><a {{ (Request::path() == 'place' ? 'class=active' : '') }} href="{{ url('/place') }}">地名</a></li>
			<li><a {{ (Request::path() == 'book' ? 'class=active' : '') }} href="{{ url('/book') }}">北京话文献</a></li>
			<li><a {{ (strpos(Request::path(),'chant')!==false ? 'class=active' : '') }} href="{{ url('/chant') }}">吟诵</a></li>
			<li><a {{ (Request::path() == 'poem' ? 'class=active' : '') }} href="{{ url('/poem') }}">清代御诗</a></li>
			<li><a {{ (Request::path() == 'dict' ? 'class=active' : '') }} href="{{ url('/dict') }}">土语词典</a></li>
			<li><a {{ (Request::path() == 'english' ? 'class=active' : '') }} href="{{ url('/english') }}">外语</a></li>
			<li><a {{ (Request::path() == 'oral' ? 'class=active' : '') }} href="{{ url('/oral') }}">口传文化</a></li>
			<li><a {{ (Request::path() == 'oldbeijing' ? 'class=active' : '') }} href="{{ url('/oldbeijing') }}">话说老北京</a></li>
        </ul>
      </section>
    </nav>

    <div class="navbar navbar-inverse navbar-fixed-top menu header-hamburger fixed"">
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

      	<button class="btn-hamburger js-slideout-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      	</button>

      	<a href="/oral.html">
      		<button>口传文化</button>
      	</a>
      	
      	<button class="searchBtn"></button> 

    </div>

	<div class="wrapper" id="panel" style="width:100%">
		<div id="theSidebar" class="sidebar">
			<div class="logo">
				<a href="/">
					<img src="{{ asset('/assets/img/icon/logo.png') }}">	
				</a>
			</div>
			
			<div id="search">
				<form action="/oral">
					<input name="search" class="box" type="text" placeholder="在此输入搜索内容">
					<input type="submit" class="button" title="搜索" value="GO">
				</form>
			</div>
			<!-- <button class="close-button fa fa-fw fa-close"></button> -->
			
			<h1>口传文化</h1>
			
			<div class="info">
				<h3>本项目是对北京地域口传文化进行研究。项目以数名土生土长的北京著名老艺人为采集对象，以老北京人聚居的城区为采集布点，观察、记录、描述、分析北京商业叫卖。</h3>
			</div>

			<button class="detailButton" onclick="location.href='/oral.html';">详细介绍>></button>
		</div>

		<div id="theGrid" class="main">
			<section class="grid" id="container">
				<header class="top-bar">
				</header>

				@foreach ($orals as $oral)
					<a class="grid__item" href="#">
						<h2 class="title title--preview">{{ $oral->name }}</h2>
						<div class="loader"></div>
						<span class="category">{{ $oral-> speaker }}</span>
						<div class="meta meta--preview">
							<img class="lazy meta__avatar" src="{{ asset('/assets/img/logo.png') }}" data-original="{{ asset('content/oral/picture')."/".$oral->speaker.'/'.$oral->video }}.jpg" alt="图片暂缺" onerror="imgError(this);">
						</div>
					</a>
				@endforeach
			</section>

			<section class="content">
				<div class="scroll-wrap">
				@foreach ($orals as $oral)
					<article class="content__item">

						<div class="meta meta--full">
							<img src="{{ asset('/assets/img/logo.png') }}" style="width:236px; height: 38px; vertical-align: middle" >

							<img class="meta__avatar" data-src="{{ asset('content/oral/picture')."/".$oral->speaker.'/'.$oral->video }}.jpg" alt="图片暂缺" onerror="imgError(this);">

							<span class="meta__subTitle">{{ $oral->name }}</span>

							<div class="meta__misc--seperator">
								叫卖人 ：{{ $oral-> speaker }}</br>
							</div>

							<span class="fa fa-chevron-left fa-2x pre" aria-hidden="true" style="position: absolute; bottom: 15vh; left: 5vw; z-index: 999"></span>

							<span class="fa fa-chevron-right fa-2x next" aria-hidden="true" style="position: absolute; bottom: 15vh; right: 5vw; z-index: 999"></span>
						</div>

						<div class="picture">
							<video class="video" controls preload="none">
								<source src="{{ asset('content/oral/video')."/".$oral->speaker.'/'.$oral->video.'.mp4' }}"  />
								<source src="{{ asset('content/oral/video')."/".$oral->speaker.'/'.$oral->video.'.ogg' }}"  />
								<source src="{{ asset('content/oral/video')."/".$oral->speaker.'/'.$oral->video.'.webm' }}"  />
							</video>
						</div>

						<div class="detail" style="max-height: calc(85vh - 60px); overflow:auto;">
							<h2 class="title title--full">{{ $oral-> subtitle }}</h2>
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
					<?php echo $orals->render(); ?>
				</ul>
			</nav>
		</div>

		<div class="mask"></div>
	</div>

	<div class="search">
		<div>
			<form action="/book">
				<input name="search" type="text" placeholder="在此输入搜索内容">
				<input type="submit" class="button" title="搜索" value="GO">
				<input type="button" class="button" title="取消" value="Cancel">
			</form>
		</div>
		<div>
			<button>清除浏览记录</button>
		</div>
	</div>

	<script type="text/javascript">
		'use strict';
		var position = -1,
			content__item = $('.content__item'),
			grid__item = $('.grid__item'),
			length = grid__item.length,
			media = null, 
			articles = $('.scroll-wrap').children(),
			where = ['place','book','chant','poem','dict','english','oral','oldbeijing'];
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
			media.pause();
			$(right).css('visibility','visible');
			var pre = position;
			position -- ;

			if( position == -1 ){
				position = 0;
				return;
			}

    		var imgs = $('img[data-src]');
			var thumbnail = imgs[position];
			thumbnail.src = $(thumbnail).attr('data-src');

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

			var picture = $(articles[position]).children()[1];
			media = $(picture).children()[0];
		
		});

		$('.next').click( function (argument) {
			media.pause();

			$(left).css('visibility','visible');
			var pre = position;
			position ++ ;

			if( position == length ){
				position = length - 1;
				return;
			}

    		var imgs = $('img[data-src]');
			var thumbnail = imgs[position];
			thumbnail.src = $(thumbnail).attr('data-src');

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

			var picture = $(articles[position]).children()[1];
			media = $(picture).children()[0];
		});

		$('.close-button').click(function(){
			media.pause();

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
			slideout.close();

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
				var thumbnail = imgs[position];
				thumbnail.src = $(thumbnail).attr('data-src');
				
			});

			var picture = $(articles[position]).children()[1];
			media = $(picture).children()[0];
		});

		var pathname = location.pathname.split('/');
		var nav = $('.nav.navbar-nav')[0].children;
		var index = where.indexOf( pathname[1] );

		if (  index > -1 ) {
			var a = nav[index + 1].firstElementChild;
			$(a).css('text-decoration','underline');
			$(a).css('color','#B44242');
		}

		if( "ontouchstart" in document ) {
	        $('[class="fa fa-close  glyphicon glyphicon-remove"]').css('top', '2vh');
	        $('[class="fa fa-chevron-left fa-2x pre"]').css('position', 'fixed');
	        $('[class="fa fa-chevron-right fa-2x next"]').css('position', 'fixed');
	    }
	    
		$(function () {
            $("img.lazy").lazyload({
                container: $("#container")
            });
        });
	</script>

    <script type="text/javascript">
		var slideout = new Slideout({
			'panel': document.querySelector('#panel'),
			'menu': document.querySelector('#menu'),
			'padding': 140,
			'tolerance': 70
		});
		var flag = 0;

		slideout.disableTouch();
		slideout.close();

		document.querySelector('.js-slideout-toggle').addEventListener('click', function() {
			slideout.toggle();
			if( !flag ){
				$("#panel>div:nth-child(3)").css("display","block");
			}else{
				$("#panel>div:nth-child(3)").css("display","none");
			}
			flag = 1 - flag;
		});

		document.querySelector('.sideMenu').addEventListener('click', function(eve) {
			if (eve.target.nodeName === 'A') { slideout.close(); }
		});

		slideout.on('beforeopen', function() {
			document.querySelector('.fixed').classList.add('fixed-open');
		});

		slideout.on('beforeclose', function() {
			document.querySelector('.fixed').classList.remove('fixed-open');
		});

		var searchBtn = document.querySelector('.searchBtn'),
			searchDiv = document.querySelector('div.search');
		$(searchBtn).click( function(event){
			searchDiv.style.display = "block";
		});

		$("div.search>div:nth-child(1)>form>input:nth-child(3)").click(function(event){
			searchDiv.style.display = "none";
		});

		$('.know').click(function(){
			$('.tips').remove();
		});

		(function(){
			$(document).ready(function(){
				console.log('app');
				var prepath = sessionStorage.getItem('path');
				var path = location.pathname.split('/')[1];
				if(path != prepath){
					$('.tips').css('visibility','visible');
					sessionStorage.setItem('path',path) ;
				}
			});
		})();
    </script>
@endsection