@extends('project.chant')

@section('chant_content')

 	<section class="grid" id="container">
		<header class="top-bar"></header>
		@foreach ($chants as $chant)
			<a class="grid__item" href="#">
				<h2 class="title "> {{$chant->title}} </h2>
				<?php 
					$filename = pathinfo($chant->media,PATHINFO_FILENAME);
					$media_class = pathinfo($chant->media,PATHINFO_EXTENSION);
				?>
				<div class="loader"></div>
				<span class="category">{{ $chant->media_class}}</span>
				<div class="meta meta--preview">
					<img class="lazy meta__avatar" src="{{ asset('/assets/img/logo.png') }}" data-original="{{ asset('content/chant')."/".$chant->category.'/'.$filename.".jpg" }}"  onerror="imgError(this);">
				</div>
			</a>
		@endforeach
	</section>

	<section class="content">
		<div class="scroll-wrap">
			@foreach ($chants as $chant)
				<article class="content__item">
					<div class="meta meta--full">
						<?php 
							$filename = pathinfo($chant->media,PATHINFO_FILENAME);
							$media_class = pathinfo($chant->media,PATHINFO_EXTENSION);
						?>
						<img src="{{ asset('/assets/img/logo.png') }}" style="width:236px; height: 38px; vertical-align: middle" >

						<img class="meta__avatar" data-src="{{ asset('content/chant')."/".$chant->category.'/'.$filename.".jpg" }}" alt="图片暂缺" onerror="imgError(this);">

						<div class="meta__misc--seperator">
							吟诵者:{{ $chant-> chanter}}<br/>
							媒体类型:{{ $chant-> media_class}}
						</div>

						<span class="fa fa-chevron-left fa-2x pre" aria-hidden="true" style="position: absolute; bottom: 15vh; left: 5vw; z-index: 999"></span>

						<span class="fa fa-chevron-right fa-2x next" aria-hidden="true" style="position: absolute; bottom: 15vh; right: 5vw; z-index: 999"></span>
					</div>

					<div class="picture">
						@if ($media_class == 'flv')
						<video class="video" style="" controls="controls" preload="none">
								<?php   $name = str_replace('flv', 'mp4', $chant->media); ?>
								<source src="{{ asset('content/chant')."/".$chant->category.'/'.$name }}"  />
								<?php   $name = str_replace('flv', 'ogg', $chant->media); ?>
								<source src="{{ asset('content/chant')."/".$chant->category.'/'.$name }}"  />
								<?php	$name = str_replace('flv', 'webm', $chant->media); ?>
								<source src="{{ asset('content/chant')."/".$chant->category.'/'.$name }}"  />
						</video>						
						@elseif ($media_class == 'mp3')
					    <audio controls="controls" preload="none" src="{{asset('content/chant')."/".$chant->category.'/'.$chant->media}}"></audio>
					  	@else
					  	@endif
					</div>

					<div class="detail" style="max-height: calc(85vh - 60px); overflow:auto;"></div>
				</article>
			@endforeach
		</div>
		<button class="close-button">
			<i class="fa fa-close  glyphicon glyphicon-remove"></i>
		</button>
	</section>

  	<nav>
		<ul class="pagination">
			<?php echo $chants->render(); ?>
		</ul>
	</nav>


@endsection