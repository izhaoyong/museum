@extends('app')

@section('content')	
	<link rel="stylesheet" href="{{asset('/css/normalize-places.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/style2.css')}}" />
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
	<script src="{{ asset('/js/modernizr.custom-places.js')}}"></script>

	<link rel="stylesheet" href="{{asset('/css/style.css')}}" />
	<script src="{{ asset('/js/slideout.js')}}"></script>

	<style type="text/css">
		#content{
			color: #9d9d9d;
		}

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
			bottom: 0px;
		}

		.grid{
			max-height: calc(100% - 45px);
			top: 0px;
			bottom: 40px;
			overflow-y: scroll;
			color: #7b7b7b;
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

		.pagination>li>a, .pagination>li>span{
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
			justify-content: center;
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

			.select{
				margin: 0px !important;
				padding-left: 10px !important;
			}

			#content>ul{
				padding-left: 10px;
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
				display: block !important;
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

		.nav.nav-tabs{
			margin: 0px 0px 10px 300px;
			border-bottom: none; 
			display: flex;
			justify-content: center;
		}

		.nav.nav-tabs>li{
			height: 40px;
			margin-bottom: 0;
		}

		.nav.nav-tabs>li>a{
			background-color: white;
			margin-right: 0px;
			color: #9d9d9d;
		}

		.nav.nav-tabs>li>a:hover{
			color: #B44242;
		}

		.media-left>a>img{
			color: #9d9d9d;	
		}

		.select{
			display: none;
			padding-left: 0px;
		}

		.select li{
			list-style: none;
			position: relative;
			display: inline-block;
			top: 5px;
		}

		.select li ul{
			display: none;
			position: absolute;
			z-index: 999;
			background-color: #f5f5f5;
			left: 0px;
			top: 100%;
			padding: 0;
			margin: 0;
			width: 100px;
		}

		.select li>a{
			padding: 1em 0em;
		}		

		.select li ul>li>a, .select li>a{
			color: #9d9d9d;
			color: #333;
			font-weight: bold;
		}

		.select li ul>li>a:hover, .select li>a:hover{
			color: #B44242;
		}

		.select li:hover > ul{
			display: block;
		}

		@media screen and (max-width: 1160px){
			.nav.nav-tabs{
				display: none;
			}

			.select{
				margin: 5px 0px 5px 340px;
				height: 41px;
				display: block;
			}
		}

		.main{
			height: calc(100% - 51px);
			position: relative;
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

		.nav.nav-tabs{
			color: #333;
			font-weight: bold;
		}

		.picture {
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

		#panel>div:nth-child(6){
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
	</style> 

	<style type="text/css">
		@media screen and (max-width: 600px){
			.navbar-header{
				display: none;
			}

			.menuContainer{
				width: 100%;
				margin: 5px 0;
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

		@media screen and (max-width: 1160px) and (min-width: 600px){
			.menuContainer{
				margin-left: 300px;
				width: calc(100% - 300px);
			}
		}

		@media screen and (min-width: 1160px){
			.menuContainer{
				display: none;
			}
		}

		.select{
			display: none;
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

		.menuContainer{
			height: 50px;
			position: relative;
			overflow: hidden;
			border-bottom: 1px solid #acacac;
		}

		.menuContainer>button{
			display: inline-block;
			width: 30px;
			height: 100%;
			top: 0;
			position: absolute;
			border: none;
			background-color: white;
		}

		.menuContainer>button.toLeft{
			left: 0;
		}

		.menuContainer>button.toRight{
			right: 0;
		}

		.menuContainer>div{
			margin: 0;
			padding: 0;
			border-width: 0;
			top: 0;
			left: 30px;
			right: 30px;
			bottom: 0;
			width: calc(100% - 60px);
			position: absolute;
			overflow: hidden;
		}

		.menuContainer>div>ul{
			min-width: 700px;
			width: 100%;
			height: 100%;
			padding: 0;
			margin: 0;
			position: absolute;
			display: flex;
			justify-content: space-between;
		}

		.menuContainer>div>ul>li{
			display: inline-block;
			list-style: none;
			height: 50px;
			line-height: 50px;
		}

		.menuContainer>div>ul>li>a{
			line-height: 100%;
			height: 100%;
			font-weight: bold;
			color: #9d9d9d;
		}

		.menuContainer>div>ul>li>a:hover{
			color: #B44242;
		}

		.menuContainer>div>ul>li.active>a{
			color: #B44242 !important;
			text-decoration: underline !important;
		}

		#panel{
			background-color: white;
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
	</style>

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

    <div class="navbar navbar-inverse navbar-fixed-top menu header-hamburger fixed">
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
	        </div>
      	</div>

       	<button class="btn-hamburger js-slideout-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      	</button>

      	<a href="/place.html">
      		<button>吟诵</button>
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
				<form action="/chant">
					<input name="search" class="box" type="text" placeholder="在此输入搜索内容">
					<input type="submit" class="button" title="搜索" value="GO">
				</form>
			</div>
			
			<h1>吟诵</h1>
			
			<div class="info">
				<h3>吟诵是指对北京话/普通话诗文吟诵研究，主要以视频的形式展示北京话吟诵和普通话诗文的吟诵资源。资源共分为四个部分：文献论文，北京话吟诵，其他方言吟诵及吟诵教学。</h3>
			</div>

			<button class="detailButton" onclick="location.href='/chant.html';">详细介绍>></button>
		</div>

		@if (!$search)
		<ul class="nav nav-tabs">
			<li {{ (Request::path() == 'chant/beijing' ? 'class=active' : '') }}><a href="{{ url('/chant/beijing')}}">北京话吟诵</a></li>
			<li {{ (Request::path() == 'chant/normal' ? 'class=active' : '') }}><a href="{{url('/chant/normal')}}">普通话吟诵</a></li>
			<li {{ (Request::path() == 'chant/other' ? 'class=active' : '') }}><a href="{{url('/chant/other')}}">京外吟诵</a></li>
			<li {{ (Request::path() == 'chant/teach' ? 'class=active' : '') }}><a href="{{url('/chant/teach')}}">吟诵教学</a></li>
			<li {{ (Request::path() == 'chant/book' ? 'class=active' : '') }}><a href="{{url('/chant/book?book=ancient')}}">北京话吟诵文献</a></li>
			<li {{ (Request::path() == 'chant/book' ? 'class=active' : '') }}><a href="{{url('/chant/book?book=modern')}}">普通话吟诵文献</a></li>
			<li {{ (Request::path() == 'chant/paper' ? 'class=active' : '') }}><a href="{{url('/chant/paper')}}">吟诵论文</a></li>
			<li {{ (Request::path() == 'chant/ppt' ? 'class=active' : '') }}><a href="{{url('/chant/ppt')}}">吟诵课件</a></li>
		</ul>

		<ul class="select">
			<li><a class="subNav" href="#">北京话吟诵</a>
				<ul>
					<li {{ (Request::path() == 'chant/beijing' ? 'class=active' : '') }}><a href="{{ url('/chant/beijing')}}">北京话吟诵</a></li>
					<li {{ (Request::path() == 'chant/normal' ? 'class=active' : '') }}><a href="{{url('/chant/normal')}}">普通话吟诵</a></li>
					<li {{ (Request::path() == 'chant/other' ? 'class=active' : '') }}><a href="{{url('/chant/other')}}">京外吟诵</a></li>
					<li {{ (Request::path() == 'chant/teach' ? 'class=active' : '') }}><a href="{{url('/chant/teach')}}">吟诵教学</a></li>
					<li {{ (Request::path() == 'chant/book' ? 'class=active' : '') }}><a href="{{url('/chant/book?book=ancient')}}">北京话吟诵文献</a></li>
					<li {{ (Request::path() == 'chant/book' ? 'class=active' : '') }}><a href="{{url('/chant/book?book=modern')}}">普通话吟诵文献</a></li>
					<li {{ (Request::path() == 'chant/paper' ? 'class=active' : '') }}><a href="{{url('/chant/paper')}}">吟诵论文</a></li>
					<li {{ (Request::path() == 'chant/ppt' ? 'class=active' : '') }}><a href="{{url('/chant/ppt')}}">吟诵课件</a></li>
				</ul>
			</li>
		</ul>
		@else
		@endif

		<div class="menuContainer">
			<button class="toLeft"><</button>
			<div>
				<ul>
					<li {{ (Request::path() == 'chant/beijing' ? 'class=active' : '') }}><a href="{{ url('/chant/beijing')}}">北京话吟诵</a></li>
					<li {{ (Request::path() == 'chant/normal' ? 'class=active' : '') }}><a href="{{url('/chant/normal')}}">普通话吟诵</a></li>
					<li {{ (Request::path() == 'chant/other' ? 'class=active' : '') }}><a href="{{url('/chant/other')}}">京外吟诵</a></li>
					<li {{ (Request::path() == 'chant/teach' ? 'class=active' : '') }}><a href="{{url('/chant/teach')}}">吟诵教学</a></li>
					<li {{ (Request::path() == 'chant/book' ? 'class=active' : '') }}><a href="{{url('/chant/book?book=ancient')}}">北京话吟诵文献</a></li>
					<li {{ (Request::path() == 'chant/book' ? 'class=active' : '') }}><a href="{{url('/chant/book?book=modern')}}">普通话吟诵文献</a></li>
					<li {{ (Request::path() == 'chant/paper' ? 'class=active' : '') }}><a href="{{url('/chant/paper')}}">吟诵论文</a></li>
					<li {{ (Request::path() == 'chant/ppt' ? 'class=active' : '') }}><a href="{{url('/chant/ppt')}}">吟诵课件</a></li>
				</ul>
			</div>
			<button class="toRight">></button>
		</div>

		<div id="theGrid" class="main">
			@yield('chant_content')
		</div>

		<div class="mask"></div>
	</div>

	<div class="search">
		<div>
			<form action="/chant">
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
		var media = null,
			position = -1,
		 	content__item = $('.content__item'),
			grid__item = $('.grid__item'),
			length = grid__item.length,
			media = null,
			articles = $('.scroll-wrap').children(),
			where = ['place','book','chant','poem','dict','english','oral','oldbeijing'];

		var subWhere = {"beijing":"北京话吟诵",'normal':"普通话吟诵",'other':"京外吟诵",'teach':"吟诵教学",'ancient':"北京话吟诵文献",'modern':"普通话吟诵文献",'paper':"吟诵论文",'ppt':"吟诵课件"};

		var book = location.href.split('=');
		var li;
		var nav = $('.nav.nav-tabs');
		if ( book.length > 1) {
			var bookname = book[1];
			if ( bookname === 'modern') {
				li = nav[0].children[4];
			}else{
				li = nav[0].children[5];
			}
			li.removeAttribute('class');
		}

		var subNav = $('.subNav');
		var subpath = location.pathname.split('/');
		if (subpath.length == 3) {
			if (location.search != "") {
				var triple = location.search.split('=');
				$(subNav).html(subWhere[triple[1]]);
			}else{
				$(subNav).html(subWhere[subpath[2]]);
			}
		}
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
			$('.menu').delay(500).slideDown(0,function(){
				if ( $(window).width() > 1160 ) {
					// $('.select').css('display','none');
					$('.menuContainer').css('display','none');
					$('.nav.nav-tabs').css('display','block');
				}else{
					// $('.select').css('display','block');
					$('.menuContainer').css('display','block');
					$('.nav.nav-tabs').css('display','none');
				}
			});
			$('.wrapper').css('top','50px');

			$(left).css('visibility','visible');
			$(right).css('visibility','visible');
		});    

		$('.grid__item').click(function( event ){
			slideout.close();

			$('.grid').css('overflow-y','hidden');
			$('.menu').delay(500).slideUp(1000, function(){
				if ( position == 0 ) {
					$(left).css('visibility','hidden');
				}

				if ( position == length - 1) {
					$(right).css('visibility','hidden');
				}				
				$('.wrapper').delay(1500).css('top','0px');
				// $('.select').css('display','none');
				
				$('.menuContainer').css('display','none');

				$('.nav.nav-tabs').css('display','none');

        		var imgs = $('img[data-src]');
				var thumbnail = imgs[position];
				thumbnail.src = $(thumbnail).attr('data-src');

				var picture = $(articles[position]).children()[1];
				media = $(picture).children()[0];
			});

			console.log( position );
		});

		$('.picture').on('click', function (event) {
			console.log('media click');
		});

		var pathname = location.pathname.split('/');
		var navbar = $('.nav.navbar-nav')[0].children;
		var index = where.indexOf( pathname[1] );

		if (  index > -1 ) {
			var a = navbar[index + 1].firstElementChild;
			$(a).css('text-decoration','underline');
			$(a).css('color','#B44242');
		}
	</script>

	<script type="text/javascript">
		'use strict';
		$('.nav.nav-tabs').click(function(event){
			var book = location.href.split('=');
			if ( book.length > 1) {
				var bookname = book[1];
				if ( bookname === 'modern') {
					var li = $($(event.target).parent()).prev()[0];
				}else{
					var li = $($(event.target).parent()).next()[0];
				}
				li.removeAttribute('class');
			}
		});

		if( "ontouchstart" in document ) {
	        $('[class="fa fa-close  glyphicon glyphicon-remove"]').css('top', '2vh');
	        $('[class="fa fa-chevron-left fa-2x pre"]').css('position', 'fixed');
	        $('[class="fa fa-chevron-right fa-2x next"]').css('position', 'fixed');
	    }

		var pdf = $('#placeholder');
		$(pdf).height(0);
		var html = pdf.context.children[0];
		console.log("click");
		$('#pdfgallery').click( function(event){
			$(pdf).height(600);
		});

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
				$("#panel>div:nth-child(6)").css("display","block");
			}else{
				$("#panel>div:nth-child(6)").css("display","none");
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

		var menuContainer = document.querySelector('.menuContainer>div'),
			ul = menuContainer.querySelector('ul'), 
			touchX = 0,
			touchCurX = 0,
			preLeft = Number(ul.style.left),
			menuWidth = menuContainer.getBoundingClientRect().width,
			ulWidth = ul.getBoundingClientRect().width;
			widthGap = menuWidth - ulWidth - 10;

		menuContainer.querySelector("ul").addEventListener('touchstart', function(event){
			touchX = event.touches[0].screenX;
		});

		menuContainer.querySelector("ul").addEventListener('touchmove', function(event){
			touchCurX = event.touches[0].screenX;

			if( preLeft + (touchCurX - touchX) > 10 || preLeft + (touchCurX - touchX) < widthGap ){
				return ;
			}
			preLeft += (touchCurX - touchX);
			ul.style.left = preLeft + "px";
			touchX = touchCurX;
		});

        $('.searchBtn').click( function (event) {
        	$('.search').css('display', 'block');
        });

        var toLeftBtn = $(".toLeft")[0],
        	toRightBtn = $(".toRight")[0],
        	down = new Event('down');

        toLeftBtn.addEventListener('down', function(){

        });

		$(toLeftBtn).mousedown( function (event) {

			if( preLeft <= widthGap ){
				return ;
			}
			preLeft -= 10;
			ul.style.left = preLeft + "px";
		});

		$(toRightBtn).mousedown( function (event) {
			if( preLeft >= 0 ){
				return ;
			}
			preLeft += 10;
			ul.style.left = preLeft + "px";
		});

		var searchBtn = document.querySelector('.searchBtn'),
			searchDiv = document.querySelector('div.search');
		$(searchBtn).click( function(event){
			searchDiv.style.display = "block";
		});

		$("div.search>div:nth-child(1)>form>input:nth-child(3)").click(function(event){
			searchDiv.style.display = "none";
		});
    </script>
@endsection