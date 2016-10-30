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

		#theGrid{
			overflow-y: auto;
		}
	</style>

	<div>

		<ul id="pdfgallery">
			@foreach ( $papers as $paper)

			<?php 
				// $basename = pathinfo($paper,PATHINFO_BASENAME); 
				// $filename = pathinfo($paper,PATHINFO_FILENAME); 
				// $path_parts = pathinfo($paper);
				// echo $path_parts['basename'];
				// $file = basename($paper);
			$arr_paper = array(
				'baijing'=> '白皛：古诗吟诵教学法初探',
				'chenqin'=> '陈琴：不妨试试吟诵法',
				'chenshaosong'=> '陈少松：用何种语言吟诵之我见',
				'daijianrong'=>'戴建荣：吟她千遍也不厌倦',
				'huafeng'=>'华锋：漫谈吟咏的节奏',
				'liuling'=>'刘玲：湘语吟诵音长关系的个案分析',
				'lvjunkai'=>'吕君忾：格律诗词之粤语吟诵',
				'qianmingqiang'=>'钱明锵：诗词吟诵八法',
				'qindexiang'=>'秦德祥：吟诵传承的价值、疑难与设想',
				'xuxianshun_hanshi'=>'徐健顺：汉诗文涵义的四个层次',
				'xujianshui_putong'=>'徐健顺：普通话吟诵之我见',
				'xujianshun_yinsong'=> '徐健顺：吟诵——中国式读书法',
				'xujianshun_guize'=> '徐健顺：吟诵的规则：一本九法',
				'xujianshun_jiazhi'=> '徐健顺：吟诵的门后——谈吟诵的当代价值',
				'xujianshundeng'=> '徐健顺等 韩国汉诗文吟诵初探',
				'yangxianguo'=> '杨先国：吟诵——“本色语文”的一个组成部分',
				'yejiaying'=> '叶嘉莹：余亦能高咏，斯人不可闻——关于传统吟诵的调查与思考',
				'zhulixia_jiaoyu'=> '朱立侠：试论吟诵的教育功能',
				'zhulixia_tangdiao'=> '朱立侠：唐调的吟诵方法',
				'zhulixia_yinsong'=> '朱立侠：吟诵概念辨析',
			);
			$basename = array_pop((explode('/',$paper)));
			$filename = pathinfo($basename,PATHINFO_FILENAME);
			//$basename = iconv('utf8', 'gbk', $basename);
			// $basename=mb_convert_encoding($basename, "gbk", "UTF-8"); 
			// echo $basename;

			
			// echo $filename;
				// echo "<br>".$basename."<br>";
				// echo $filename."<br>";
			?>
			<li class="list-group-item"><a href="paper/{{$basename}}"><?php echo $arr_paper[$filename.'']; ?></a> </li>

			@endforeach
			<iframe id="placeholder" src="" width="100%" height="600px" frameborder="0" ></iframe>
		</ul>
	</div>

@endsection