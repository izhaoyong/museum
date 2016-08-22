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
			z-index: 1000px;
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
			<div class="handle">
				<div class="slide" data-content="content-1">
					<div class="img-wrap">
						<img src="{{ asset('/assets/img/index/1.jpg')}}" alt="北京语言文化博物馆"/>
					</div>
					<h2>
						<em>北京语言文化博物馆</em>
						<img src="{{ asset('/assets/img/icon/logow.png')}}" class="logo">
						<span>开启老北京文化的奇妙旅程</span>
					</h2>
					<button class="content-switch"></button>
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

		<section class="pages">
			<div class="content" data-content="content-1" style="padding-top: 30px;">
				<h2 style="padding-top: 50px;">北京语言文化数字博物馆简介</h2>
				<p>北京语言文化数字博物馆是全国第一家专门针对北京语言文化而建造的网上数字博物馆。面对着世界统一性的威胁，越来越多的人意识到要保护非物质文化遗产，北京语言文化的保护和发扬也变得迫在眉睫，这也是北京语言文化数字博物馆建立的重要意义。</p>
				<p>北京语言文化数字博物馆共包括北京地域口传文化研究、北京话/普通话诗文吟诵研究、北京皇家园林庙宇名人故居楹联匾额研究、北京地名文化研究、北京御制三山五园诗集数据库建设与研究、北京语言文化图解词典编创、北京话研究历史文献叙录及目录、北京外语使用情况研究、北京语言资源数字博物馆建设等9 个子项目。该项目于2012 年5 月正式立项，预计3年内完成。项目总负责人是北京语言大学张维佳教授，首都师范大学、北京师范大学、北京语言大学10 多位专家和数十名研究生参与该项目研究。</p>

				<div class="navigator">
					<div>
						<a {{ (Request::path() == 'place' ? 'class=active' : '') }} href="{{ url('/place') }}">
							<button  value="地名" >地名</button>
							<div class="place "></div>
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

			<div class="content" data-content="content-2">
				<h2>地名</h2>
				<p>本项目是对北京地名文化研究。项目收集了北京市各个管辖区的地名加以归纳整理，并对这些地名进行相应的历史典故介绍，同时附上每个地名对应的北京话发音和普通话发音。项目累计条目及照片2千余条。项目由杨建国老师负责。</p>
				<!-- <a {{ (Request::path() == 'place' ? 'class=active' : '') }} href="{{ url('/place') }}">
					<button class="project-switch" value="立即参观" >立即参观</button>
				</a> -->
			</div>

			<div class="content" data-content="content-3">
				<h2>楹联</h2>
				<p>
					本项目住傲视对北京皇家园林庙宇名人故居楹联匾额研究。展示包括北京20多个地点如皇家园林、古刹、名人故居的楹联匾额，网站展示的数据会包括地点，匾额图片或者楹联图片，文本内容，注释，赏析以及平仄等。
				</p>
			</div>

			<div class="content" data-content="content-4">
				<h2>北京话文献</h2>
				<p>
					本项目是对北京话研究历史文献叙录及目录进行归纳和整理。项目收集北京话研究历史文献的叙录及目录，进行资源建设与研究。共包括三个部分，分别是：直接记录现当代北京方言土语或口语的辞书和准辞书；用北京话撰写的文学作品中的语汇辞书和语汇索引书；清代国家机关主持编撰的多体《清文鉴》类辞书和准辞书的现代整理本
				</p>
				<a {{ (Request::path() == 'book' ? 'class=active' : '') }} href="{{ url('/book') }}">
					<button class="project-switch" value="立即参观" >立即参观</button>
				</a>				
			</div>

			<div class="content" data-content="content-5">
				<h2>吟诵</h2>
				<p>
					吟诵是指对北京话/普通话诗文吟诵研究，主要以视频的形式展示北京话吟诵和普通话诗文的吟诵资源。资源共分为四个部分：文献论文，北京话吟诵，其他方言吟诵及吟诵教学。
				</p>
				<a {{ (strpos(Request::path(),'chant')!==false ? 'class=active' : '') }} href="{{ url('/chant') }}">
					<button class="project-switch" value="立即参观" >立即参观</button>
				</a>
			</div>

			<div class="content" data-content="content-6">
				<h2>清代御诗</h2>
				<p>
					清代御诗主要是对北京御制三山五园诗集数据库建设与研究，包括对北京皇家园林、名园、清代帝王御制三山五园诗集的数据收集和建设。展示的内容包括标题、诗作、注释、年代、作者、以及图片等。
				</p>
				<a {{ (Request::path() == 'poem' ? 'class=active' : '') }} href="{{ url('/poem') }}">
					<button class="project-switch" value="立即参观" >立即参观</button>
				</a>
			</div>

			<div class="content" data-content="content-7">
				<h2>土语词典</h2>
				<p>
					土语词典是对北京语言资源数字博物馆的建设。方言土语承载着传统文化，过去的节庆礼仪有哪些，贩夫走卒、市井街道是什么样的，太太小姐的吃穿用度都有哪些，随着时间的推移，这些过去的事物都在渐渐消失，方言土语词正在被今天的新生词语所取代，为了方言土语能够以声音、图像、释义相结合的方式呈现给大众，邀请到文化名人解读、专业人士注音、名校硕博团队写作，共同收集制作本部分内容。
				</p>
				<a {{ (Request::path() == 'dict' ? 'class=active' : '') }} href="{{ url('/dict') }}">
					<button class="project-switch" value="立即参观" >立即参观</button>
				</a>
			</div>

			<div class="content" data-content="content-8">
				<h2>外语</h2>
				<p>
					外语项目主要是对北京外语使用情况进行研究。项目收集包含汉语和对应英语的指示信息，如地铁指示牌、景区导引等，并收集照片，记录地点。
				</p>
				<a {{ (Request::path() == 'english' ? 'class=active' : '') }} href="{{ url('/english') }}">
					<button class="project-switch" value="立即参观" >立即参观</button>
				</a>
			</div>

			<div class="content" data-content="content-9">
				<h2>口传文化</h2>
				<p>
					本项目是对北京地域口传文化进行研究。项目以数名土生土长的北京著名老艺人为采集对象，以老北京人聚居的城区为采集布点，观察、记录、描述、分析北京商业叫卖。
				</p>
				<a {{ (Request::path() == 'oral' ? 'class=active' : '') }} href="{{ url('/oral') }}">
					<button class="project-switch" value="立即参观" >立即参观</button>
				</a>
			</div>
			
			<div class="content" data-content="content-10">
				<h2>话说老北京</h2>
				<p>
					话说老北京主要是对北京语言文化图解词典编创。本项目以《话说老北京》这部京味图画书为蓝本，整理成为一部能听能看的老北京故事图鉴，通过图鉴记录过去的人玩什么、吃什么、穿什么，街道上卖什么，流行什么。
				</p>
				<a {{ (Request::path() == 'oldbeijing' ? 'class=active' : '') }} href="{{ url('/oldbeijing') }}">
					<button class="project-switch" value="立即参观" >立即参观</button>
				</a>
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
			var isMouseDown = false;
			var prex = 0 , curx = 0, prey = 0, cury = 0, gapx , gapy ;
			$('.slide').mousedown(function( event ){
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


			if( "ontouchstart" in document ) {
		        $('.navigator button').each(function(){
		        	$(this).css('visibility', 'visible');
		        });
		    }
		})();
	</script>
@endsection
 