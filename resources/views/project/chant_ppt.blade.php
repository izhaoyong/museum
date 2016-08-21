@extends('project.chant')

@section('chant_content')
	<style type="text/css">

		#pdfgallery{
			counter-reset:sectioncounter 0;
		}

		ul>li.list-group-item:before{
			content:counter(sectioncounter) "、";
			counter-increment: sectioncounter;
			color: #9d9d9d;
		}

		.list-group-item>a{
			color: #9d9d9d;
		}

		.list-group-item>a:hover{
			color: #B44242;
		}
	</style>
	<div>
		<ul id="pdfgallery">
			@foreach ( $ppts as $ppt)
			<?php 
				// $basename = pathinfo($ppt,PATHINFO_BASENAME); 
				$basename = array_pop((explode('/',$ppt)));

				$arr_paper = array(
					'chendebing_jianjia'=> '陈德兵：《蒹葭》吟诵课件 ',
					'chengdebing_duangexing'=> '陈德兵：短歌行吟诵 ',
					'chenqin'=> '陈琴：素读经典的语文课堂 ',
					'laicailing'=>'赖彩舲：唱自己的歌  ',
					'mafanmei'=>'马凡美：《所见》 吟诵课件 ',
					'xujianshun_hanshiwen'=>'徐健顺：汉诗文声音的意义 ',
					'xujianshun_yinsong'=>'徐健顺：吟诵讲座课件 ',
					'xujianshun_yinsongjiaocheng'=>'徐健顺：吟诵教程201210定版 ',
					'xueruiping'=>'薛瑞萍：吟诵课件 ',
					'zhuchangsi'=>'朱畅思：吟诵第二课——我们一起来吟诵之蒙学 '
				);
				$filename = pathinfo($ppt, PATHINFO_FILENAME); 
			?>
			<li class="list-group-item">
				<a href="ppt/{{$basename}}">
					<?php echo $arr_paper[$filename.'']; ?>
				</a> 
			</li>

			@endforeach
			<iframe id="placeholder" src="" width="100%" height="600px" frameborder="0" ></iframe>
		</ul>
	</div>
@endsection