<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input,Redirect;
use App\Chant;
class ChantController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($category = null)
	{
		$search = Input::get('search');
		if($search){
			return view('project.chant_beijing')->withChants(Chant::where('title', 'like', '%'.$search.'%')->paginate(20))->withSearch($search);
		}else{
			if($category == 'beijing'){
				// echo "string";
				return view('project.chant_beijing')->withChants(Chant::where('category', '=', 'beijing')->paginate(20))->withSearch($search);
			}elseif ($category == 'normal') {
				return view('project.chant_normal')->withChants(Chant::where('category', '=', 'normal')->paginate(20))->withSearch($search);
			}elseif ($category == 'other') {
				return view('project.chant_other')->withChants(Chant::where('category', '=', $category)->paginate(20))->withSearch($search);
			}elseif ($category == 'teach') {
				return view('project.chant_teach')->withChants(Chant::where('category', '=', $category)->paginate(20))->withSearch($search);
			}elseif ($category == 'book') {
				// echo "string";
				$book = Input::get('book');
				$books = $this->getBook();
				return view('project.chant_book')->withBooks($books)->withCategory($book)->withSearch($search);
			}elseif ($category == 'paper') {
				$path_paper = public_path()."/content/chant/paper";
				$papers = $this->getPaper($path_paper);
				return view('project.chant_paper')->withpapers($papers)->withSearch($search);
			}elseif ($category == 'ppt') {
				$path_ppt = public_path()."/content/chant/ppt";
				$ppts = $this->getPPT($path_ppt);
				// print_r($ppts);
				return view('project.chant_ppt')->withppts($ppts)->withSearch($search);
			}else{
				return Redirect::to('chant/beijing');
			}
		}
		// return view('project.chant')->withChants($chants);
	}
	public function getBook(){
		$book = Input::get('book');
		$books = array();
		$handle = fopen(public_path()."/content/chant/book/".$book.".txt", "r");
		if($handle) {
			while(($line = fgets($handle)) !== false && $line!=='') {
				array_push($books, $line);
			}
			fclose($handle);
		} else {

		}
		return $books;
	}

	public function getPaper($path){
		return glob($path.'/*.pdf');
	}

	public function getPPT($path) {
		return glob($path.'/*.pdf');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$chant = chant::find($id);
		$file = public_path().'/content/chant/'.$chant->category.'/'.$chant->script;
		$filename = pathinfo($file, PATHINFO_FILENAME);
		$extension = pathinfo($file, PATHINFO_EXTENSION);
		if($extension == null){
			$file = $file.".ass";
		}
		// echo "$file\n";
		// $subtitle = '';
		
		$subtitleXML = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><tt xml:lang="en" xmlns="http://www.w3.org/2006/04/ttaf1"  xmlns:tts="http://www.w3.org/2006/04/ttaf1#styling">
		  <head>
		   <styling>
		      <style id="1" tts:textAlign="center" tts:backgroundColor="black" tts:color="white" tts:fontSize="20" tts:fontFamily="ËÎÌå, ËÎÌå_GB2312"/>
		   </styling>
		  </head>
		  <body>
		   <div>
		   </div>
		  </body>
		</tt>');

		if(file_exists($file)){
			$content = file_get_contents($file);
			$content = mb_convert_encoding($content, 'UTF-8', 'UTF-16LE');
			// echo "$content";
			// $output = mb_detect_encoding($content, 'utf-16le', TRUE);
			// echo "$content"."add";
			// $handle = fopen($file, 'r');
			// if ($extension == "srt") {
				
			// }
			if($content) {
				$lines = explode("\n", $content);
				foreach($lines as $line){
					// $line = mb_convert_encoding($line, 'UTF-8', 'utf-16le');
					
					// $line = iconv('UTF-16LE','UTF-8' ,$line);
					// echo "$line";
					$line = trim($line);
					if(preg_match("/^D\S+\s+([^,]+),([^,]+).+,([^,]+)$/" , $line, $matches)){
						// echo "$line";
						// echo "$matches[2]\n";
						// $result = iconv('UTF-16LE','UTF-8' ,$matches[3]);

						// $output = mb_convert_encoding( $matches[3], 'UTF-8' );
						// echo "$matches[3]\n";
						$p = $subtitleXML->body->div[0]->addChild('p',$matches[3]);
						$p->addAttribute("begin","$matches[2]");
						$p->addAttribute("style","1");
						// $title = $matches[3];
						// echo $matches[0];
					}
					if(!is_dir(public_path().'/content/chant/subtitle/')){
						mkdir(public_path().'/content/chant/subtitle/');
					}
					$subtitle_file = public_path().'/content/chant/subtitle/'.$chant->title.'.xml';
					file_put_contents($subtitle_file, $subtitleXML->asXML());
				}
			} else {
				echo "error opening the file!";
			}
			$chant->save();
			
			
		}else{
			// echo "not exist";
		}
		return view('project.chant.show')->withChant(Chant::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
