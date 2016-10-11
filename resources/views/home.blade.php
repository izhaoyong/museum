@extends('app')

@section('content')
<!-- 	<div id="title" style="text-align: center;">
		<h1>北京语言文化博物馆</h1>
	</div>
	<hr>
	<div id="content">
		<h1>这是首页</h1>
	</div> -->
	<link href="{{ asset('/css/normalize-index.css') }}" rel="stylesheet">
	<!-- demo.css show the front page -->
	<link href="{{ asset('/css/demo.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/dragdealer.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/component.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/modernizr.custom-index.js')}}" ></script>

	<style type="text/css">
		.navigator{
			display: flex;
			flex-wrap: wrap;
			justify-content: flex-start;
		}

		.overlay{
			height: 60%;
			width: 60%;
			position: absolute;
			top: 0px;
			right: 0px;
			bottom: 0px;
			left: 0px;
			margin: auto;
			display: none;
		}

		#header{
			z-index: 1000;
		}

		#header>button:nth-child(1){
			position: absolute;
			height: 100%;
			/*font-size: 20px;*/
			background: transparent;
			border: none;
			outline: none;
			z-index: 99;
		}

		button.content-switch::before{
			content: '查看详情';
			top: 4px;
		}

		.show-content .current button.content-switch::before{
			content: '返回';
			top: 4px;
		}

		.show-content .current button.content-switch{
			opacity: 0.1;
		}

		.show-content .current button.content-switch:hover{
			opacity: 1;
		}

		.slide>a{
			position: absolute;
			height: 30px;
			width: 160px;
			margin-left: -80px;
			background: transparent;
			color: #fff;
			cursor: pointer;
			outline: none;
			opacity: 0.7;
			border: 2px solid #fff;
			font-size: 0.8em;
			top: 100%;
			left: 50%;
			padding: 0px;
			transform: translate3d(0%,-200%,0);
			display: none;
		}

		.slide>a>button{
			background: transparent;
			outline: none;
			border: none;
			font-size: 20px;
			position: absolute;
			padding: 0px;
			height: 100%;
			width: 100%;
			left: 0px;
			top: 0px;
			right: 0px;
			bottom: 0px;
			margin: auto;
		}

		body{
			font-size: 16px;
		}

		.codrops-header h1{
			font-weight: normal;
		}

		span.message{
			display: none;
		}

		@media screen and (max-width: 768px){
			.navigator>div{
				width: 33.33% !important;
			}			
		}

		@media screen and (max-width: 384px){
			.navigator>div{
				width: 50% !important;
			}
		}

		@media screen and (min-width: 384px){
			.pages .content.show h2{
				padding-bottom: 20px;
			}
		}

		.navigator>div{
			width: 25%;
			height: 200px;
		}

		.navigator>div>a{
			position: relative;
			display: block;
			margin: 10px;
			height: calc(100% - 20px);
			width: calc(100% - 20px);
			box-sizing: content-box;
			text-decoration: none;
		}

		.navigator>div>a>button{
			position: absolute;
			width: 100%;
			height: 100%;
			border: none;
			display: block;
			background: rgba(221, 221, 221, 0.5);
			visibility: hidden;
			font-weight: bold;
			outline: none;
		}

		.navigator>div>a>div{
			background-size: 100% 100%;
			width: 100%;
			height: 100%;
		}

		a>.place{
			background-image: url('/assets/img/index/2.jpg');
		}

		a>.book{
			background-image: url('/assets/img/index/3.jpg');
		}

		a>.chant{
			background-image: url('/assets/img/index/4.jpg');
		}
		
		a>.poem{
			background-image: url('/assets/img/index/5.jpg');
		}

		a>.dict{
			background-image: url('/assets/img/index/6.jpg');
		}

		a>.english{
			background-image: url('/assets/img/index/7.jpg');
		}

		a>.oral{
			background-image: url('/assets/img/index/8.jpg');
		}

		a>.oldbeijing{
			background-image: url('/assets/img/index/9.jpg');
		}
	</style>

	<style type="text/css">
		.door{
			width: 50%;
			position: absolute;
			overflow: hidden;
			background-color: #B29488;
			transition-duration: 3s;
			visibility: hidden;
		}

		.leftDoor{
			left: 0;
			height: 100%;
			transform-origin: left;
		}

		.leftDoor>div>img{
			left: 0;
			width: 200% !important;
		}

		.leftDoor>h2{left: 50%;}

		.leftDoor>button{left: 100%;}

		.rightDoor{
			right: 0;
			height: 100%;
			transform-origin: right;
		}

		.rightDoor>div>img{
			right: 0;
			width: 200% !important;
		}
		
		.rightDoor>h2{right: 50%;}

		.rightDoor>button{left: 0%;}

		.rotate90{
			transform: rotateY(90deg);
		}

		.rotate180{
			transform: rotateY(-90deg);
		}

		.rotate0{
			transform: rotateY(0deg);
			transition-duration: 3s;
		}

		.rotate360{
			transform: rotateY(0deg);
			transition-duration: 3s;
		}

		button.close{
			position: absolute;
			right: 5%;
			top: 5%;
			outline: none;
		}

		.will-hidden{
			/*visibility: hidden;*/
		}
	</style>

	<header id="header" class="codrops-header">
		<!-- <button id="tips">左右拖动查看更多项目</button> -->
		<h1 >左右拖动查看更多项目</h1>
		<span class="message">This mobile version does not have the slideshow switch</span>
		<button class="slider-switch">Switch view</button>
	</header>

	<div id="overlay" class="overlay">
		<div class="info">
			<h2>北京语言文化数字博物馆</br>参观说明</h2>
			<span class="info-drag">拖动页面</span>
			<span class="info-keys">使用箭头</span>
			<span class="info-switch">切换项目</span>
			<button>懂了！</button>	
		</div>
	</div>

	<div id="slideshow" class="dragslider">
		<section class="img-dragger img-dragger-large dragdealer">
			<div class="handle" style="">
				<div class="slide" data-content="content-1" style="">
					<div class="img-wrap will-hidden"><img src="{{ asset('/assets/img/index/1.jpg')}}" alt="北京语言文化博物馆"/></div>
					<h2 class="will-hidden">
						<em>北京语言文化博物馆</em>
						<img src="{{ asset('/assets/img/icon/logow.png')}}" class="logo">
						<span>开启老北京文化的奇妙旅程</span>
					</h2 class="will-hidden">
					<button class="content-switch will-hidden"></button>

					<div class="leftDoor door">
						<div class="img-wrap"><img src="{{ asset('/assets/img/index/1.jpg')}}" alt="北京语言文化博物馆"/></div>
						<h2>
							<em>北京语言文化博物馆</em>
							<img src="{{ asset('/assets/img/icon/logow.png')}}" class="logo">
							<span>开启老北京文化的奇妙旅程</span>
						</h2>
						<button class="content-switch"></button>
					</div>
					
					<div class="rightDoor door">
						<div class="img-wrap"><img src="{{ asset('/assets/img/index/1.jpg')}}" alt="北京语言文化博物馆"/></div>
						<h2>
							<em>北京语言文化博物馆</em>
							<img src="{{ asset('/assets/img/icon/logow.png')}}" class="logo">
							<span>开启老北京文化的奇妙旅程</span>
						</h2>
						<button class="content-switch"></button>
					</div>
				</div>
				
				<div class="slide" data-content="content-2">
					<div class="img-wrap"><img src="{{ asset('/assets/img/index/2.jpg')}}" alt="地名"/></div>
					<h2><em>地名</em><span>北京各个管辖区的地名</span></h2>
					<button class="content-switch" style="display: none;"></button>

					<a {{ (Request::path() == 'place' ? 'class=active' : '') }} href="{{ url('/place') }}">
						<button  value="地名" >立即参观</button>
					</a>
				</div>

				<div class="slide" data-content="content-4">
					<div class="img-wrap"><img src="{{ asset('/assets/img/index/4.jpg')}}" alt="北京话文献"/></div>
					<h2><em>北京话文献</em><span>北京话研究历史文献的叙录及目录</span></h2>
					<button class="content-switch" style="display: none;">Read more</button>
					<a {{ (Request::path() == 'book' ? 'class=active' : '') }} href="{{ url('/book') }}">
						<button  value="北京话文献" >立即参观</button>
					</a>
				</div>

				<div class="slide" data-content="content-5">
					<div class="img-wrap"><img src="{{ asset('/assets/img/index/5.jpg')}}" alt="吟诵"/></div>
					<h2><em>吟诵</em><span>展示北京话吟诵和普通话诗文吟诵资源</span></h2>
					<button class="content-switch" style="display: none;"></button>
					<a {{ (strpos(Request::path(),'chant')!==false ? 'class=active' : '') }} href="{{ url('/chant') }}">
						<button  value="吟诵" >立即参观</button>
					</a>
				</div>

				<div class="slide" data-content="content-6">
					<div class="img-wrap"><img src="{{ asset('/assets/img/index/6.jpg')}}" alt="清代御诗"/></div>
					<h2><em>清代御诗</em><span>北京园林诗集的数据收集和建设</span></h2>
					<button class="content-switch" style="display: none;"></button>
					<a {{ (Request::path() == 'poem' ? 'class=active' : '') }} href="{{ url('/poem') }}">
						<button  value="清代御诗" >立即参观</button>
					</a>
				</div>

				<div class="slide" data-content="content-7">
					<div class="img-wrap"><img src="{{ asset('/assets/img/index/7.jpg')}}" alt="土语词典"/></div>
					<h2><em>土语词典</em><span>方言土语</span></h2>
					<button class="content-switch" style="display: none;"></button>
					<a {{ (Request::path() == 'dict' ? 'class=active' : '') }} href="{{ url('/dict') }}">
						<button  value="土语词典" >立即参观</button>
					</a>
				</div>

				<div class="slide" data-content="content-8">
					<div class="img-wrap"><img src="{{ asset('/assets/img/index/8.jpg')}}" alt="外语"/></div>
					<h2><em>外语</em><span>包含汉语和对应英语的指示信息</span></h2>
					<button class="content-switch" style="display: none;"></button>
					<a {{ (Request::path() == 'dict' ? 'class=active' : '') }} href="{{ url('/english') }}">
						<button  value="外语" >立即参观</button>
					</a>
				</div>

				<div class="slide" data-content="content-9">
					<div class="img-wrap"><img src="{{ asset('/assets/img/index/9.jpg')}}" alt="口传文化"/></div>
					<h2><em>口传文化</em><span>老北京的商业叫卖</span></h2>
					<button class="content-switch" style="display: none;"></button>
					<a {{ (Request::path() == 'oral' ? 'class=active' : '') }} href="{{ url('/oral') }}">
						<button  value="口传文化" >立即参观</button>
					</a>
				</div>

				<div class="slide" data-content="content-10">
					<div class="img-wrap"><img src="{{ asset('/assets/img/index/10.jpg')}}" alt="话说老北京"/></div>
					<h2><em>话说老北京</em><span>记录老北京人的吃穿玩乐</span></h2>
					<button class="content-switch" style="display: none;"></button>
					<a {{ (Request::path() == 'oldbeijing' ? 'class=active' : '') }} href="{{ url('/oldbeijing') }}">
						<button  value="话说老北京" >立即参观</button>
					</a>
				</div>
			</div>
		</section>

		<section class="pages" style="position: absolute; top: 0px; height: 100%; z-index: -1">
			<div class="content" data-content="content-1" style="padding-top: 30px; height:100%; overflow-y:auto;">
				<button class="close">X</button>
				<h2 style="padding-top: 50px;">北京语言文化数字博物馆简介</h2>

				<div>
					<input type="text" name="search" placeholder="在此输入搜索内容" class="query" />
					<button class="search">GO</button>
				</div>
				
				<p>北京语言文化数字博物馆是全国第一家专门针对北京语言文化而建造的网上数字博物馆。面对着世界统一性的威胁，越来越多的人意识到要保护非物质文化遗产，北京语言文化的保护和发扬也变得迫在眉睫，这也是北京语言文化数字博物馆建立的重要意义。</p>
				<p>北京语言文化数字博物馆共包括<a href="{{ url('/oral') }}" style="display:inline; text-decoration: underline;">北京地域口传文化研究</a>、<a href="{{ url('/chant') }}" style="display:inline; text-decoration: underline;">北京话/普通话诗文吟诵研究</a>、北京皇家园林庙宇名人故居楹联匾额研究、<a href="{{ url('/place') }}" style="display:inline; text-decoration: underline;">北京地名文化研究</a>、<a href="{{ url('/poem') }}" style="display:inline; text-decoration: underline;">北京御制三山五园诗集数据库建设与研究</a>、<a href="{{ url('/dict') }}" style="display:inline; text-decoration: underline;">北京语言文化图解词典编创</a>、<a href="{{ url('/book') }}" style="display:inline; text-decoration: underline;">北京话研究历史文献叙录及目录</a>、<a href="{{ url('/english') }}" style="display:inline; text-decoration: underline;">北京外语使用情况研究</a>、<a href="{{ url('/chant') }}" style="display:inline; text-decoration: underline;">北京语言资源数字博物馆建设</a>等9 个子项目。该项目于2012 年5 月正式立项，预计3年内完成。项目总负责人是北京语言大学张维佳教授，首都师范大学、北京师范大学、北京语言大学10 多位专家和数十名研究生参与该项目研究。</p>

				<div class="navigator">
					<div>
						<a {{ (Request::path() == 'place' ? 'class=active' : '') }} href="{{ url('/place') }}">
							<button  value="地名" >地名</button>
							<div class="place"></div>
						</a>						
					</div>

					<div>
						<a {{ (Request::path() == 'book' ? 'class=active' : '') }} href="{{ url('/book') }}">
							<button  value="北京话文献" >北京话文献</button>
							<div class="book"></div>
						</a>						
					</div>

					<div>
						<a {{ (strpos(Request::path(),'chant')!==false ? 'class=active' : '') }} href="{{ url('/chant') }}">
							<button  value="吟诵" >吟诵</button>
							<div class="chant"></div>
						</a>						
					</div>

					<div>
						<a {{ (Request::path() == 'poem' ? 'class=active' : '') }} href="{{ url('/poem') }}">
							<button  value="清代御诗" >清代御诗</button>
							<div class="poem"></div>
						</a>						
					</div>

					<div>
						<a {{ (Request::path() == 'dict' ? 'class=active' : '') }} href="{{ url('/dict') }}">
							<button  value="土语词典" >土语词典</button>
							<div class="dict"></div>
						</a>						
					</div>

					<div>
						<a {{ (Request::path() == 'english' ? 'class=active' : '') }} href="{{ url('/english') }}">
							<button  value="外语" >外语</button>
							<div class="english"></div>
						</a>						
					</div>

					<div>
						<a {{ (Request::path() == 'oral' ? 'class=active' : '') }} href="{{ url('/oral') }}">
							<button  value="口传文化" >口传文化</button>
							<div class="oral"></div>
						</a>						
					</div>

					<div>
						<a {{ (Request::path() == 'oldbeijing' ? 'class=active' : '') }} href="{{ url('/oldbeijing') }}">
							<button  value="话说老北京" >话说老北京</button>
							<div class="oldbeijing"></div>
						</a>						
					</div>
				</div>
			</div>
		</section>
	</div>

	<script src="{{asset('js/dragdealer.js')}}"></script>
	<script src="{{asset('js/classie-index.js')}}"></script>
	<script src="{{asset('js/dragslideshow.js')}}"></script>
	<script>
		(function() {
			var overlay = document.getElementById( 'overlay' ),
				overlayClose = overlay.querySelector( 'button' ),
				header = document.getElementById( 'header' ),
				switchBtnn = header.querySelector( 'button.slider-switch' ),
				toggleBtnn = function() {
					if( slideshow.isFullscreen ) {
						classie.add( switchBtnn, 'view-maxi' );
					}
					else {
						classie.remove( switchBtnn, 'view-maxi' );
					}
				},
				toggleCtrls = function() {
					if( !slideshow.isContent ) {
						classie.add( header, 'hide' );
					}
				},
				toggleCompleteCtrls = function() {
					if( !slideshow.isContent ) {
						classie.remove( header, 'hide' );
					}
				},
				slideshow = new DragSlideshow( document.getElementById( 'slideshow' ), { 
					// toggle between fullscreen and minimized slideshow
					onToggle : toggleBtnn,
					// toggle the main image and the content view
					onToggleContent : toggleCtrls,
					// toggle the main image and the content view (triggered after the animation ends)
					onToggleContentComplete : toggleCompleteCtrls
				}),
				toggleSlideshow = function() {
					// $('.door').css('visibility','hidden');
					// $('.will-hidden').css('visibility','visible');
					slideshow.toggle();
					toggleBtnn();
				},
				closeOverlay = function() {
					classie.add( overlay, 'hide' );
				};

			// toggle between fullscreen and small slideshow
			switchBtnn.addEventListener( 'click', toggleSlideshow );
			// close overlay
			overlayClose.addEventListener( 'click', closeOverlay );
		}());
	</script>
	<script type="text/javascript">
		(function(){
			var isMouseDown = false, curSlide = 0;
			var prex = 0 , curx = 0, prey = 0, cury = 0, gapx , gapy ;
			$('.slide').mousedown(function( event){
				isMouseDown = true;
				prex = event.pageX;
				prey = event.pageY;
				$(this).on('mousemove',function(){
					if ( isMouseDown ) {
						cury = prey;
						curx = prex;
					}
				});
			});

			$('.slide').mouseup(function( event ){
				curx = event.pageX;
				cury = event.pageY;
				gapx = curx - prex;
				gapy = cury - prey;

				if ( gapx == 0 && gapy == 0 ) {
					if ( $(this).children().length == 4) {
						var href = $(this).children()[3];
						window.location.href = href.href;
					}
				}
				isMouseDown = false;
			});

			$('.navigator>div>a').mouseenter(function(event){
				var a = $(event.target).parent();
				$($(a).children()[0]).css('visibility','visible');
			});

			$('.navigator>div>a').mouseleave(function(event){
				var a = $(event.target).parent();
				$($(a).children()[0]).css('visibility','hidden');
			});


			if ( /mobile/ig.test(navigator.userAgent) ) {
				console.log('mobile');

		        $('.navigator button').each(function(){
		        	$(this).css('visibility', 'visible');
		        });
			}
			
			$(".handle>div:nth-child(1)").click(function (evt) {	
				if ( gapx == 0 && gapy == 0 ) {
					if (evt.currentTarget == $('.handle').children()[0]) {
						$('.will-hidden').css('visibility','hidden');
						$('.door').css('visibility', 'visible');

						$('.handle').css('background-color', 'transparent');
						$('.handle>div:nth-child(1)').css('background-color', 'transparent');
						$('.js .dragslider').css('background-color','transparent')

						$('.leftDoor').addClass('rotate90');
						$('.rightDoor').addClass('rotate180');

						$('#header').css('z-index', -1);
						$('.pages').css('z-index', 99);
						setTimeout(function(){
							$('.handle').css('visibility', 'hidden');
							$('.dragdealer').css('visibility', 'hidden');
							console.log('down');
						}, 3000);
					}
				}
			});

			$('.search').click(function(evt){
				console.log('jajdflkajdf');
			});

			$('.query').click(function(evt){
				// $(event.target).focus();
			});

			$('.query').keydown(function(evt){
				console.log('keydown');
			});

			$('.close').click(function(evt){
				$('.handle').css('visibility', 'visible');
				$('.dragdealer').css('visibility', 'visible');

				$('.leftDoor').removeClass('rotate90');
				$('.rightDoor').removeClass('rotate180');

				setTimeout(function(){
					$('.pages').css('z-index', -1);
					$('#header').css('z-index', 1000);
					$('.js .dragslider').css('background-color','#823030');
					$('.handle>div:nth-child(1)').css('background-color', '#B29488');
					$('.handle').css('background-color', 'white');

					$('.door').css('visibility', 'hidden');
					$('.will-hidden').css('visibility','visible');
				}, 3000);

			});
		})();
	</script>
@endsection