<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Oral;
use Input;
class OralController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$search = Input::get('search');
		if($search){
			return view('project.oral')->withorals(Oral::where('name', 'like', '%'.$search.'%')->paginate(20))->withSearch($search);
		}else{
			return view('project.oral')->withorals(Oral::paginate(20))->withSearch($search);
		}
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
		$oral = oral::find($id);
		$file = public_path().'/content/oral/xml/'.$oral->speaker.'/'.$oral->xml.'.xml';
		$subtitle = '';
		$subtitleXML = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><tt xml:lang="en" xmlns="http://www.w3.org/2006/04/ttaf1"  xmlns:tts="http://www.w3.org/2006/04/ttaf1#styling">
		  <head>
		   <styling>
		      <style id="1" tts:textAlign="center" tts:backgroundColor="black" tts:color="white" tts:fontSize="20" tts:fontFamily="宋体, 宋体_GB2312"/>
		   </styling>
		  </head>
		  <body>
		   <div>
		   </div>
		  </body>
		</tt>');

		if(file_exists($file)){
			$xml = simplexml_load_file($file);

			foreach($xml->cue as $cue){
				$subtitle .= $cue->subtitle;
				$p = $subtitleXML->body->div[0]->addChild('p',$cue->subtitle);
				$p->addAttribute("begin",$cue['time']);
				$p->addAttribute("style","1");
			}
			if(!is_dir(public_path().'/content/oral/subtitle/'.$oral->speaker.'/')){
				mkdir(public_path().'/content/oral/subtitle/'.$oral->speaker.'/');
			}
			$subtitle_file = public_path().'/content/oral/subtitle/'.$oral->speaker.'/'.$oral->name.'.xml';
			file_put_contents($subtitle_file, $subtitleXML->asXML());
		}else{
			$xml = "不存在";
		}
		$oral->subtitle = $subtitle;

		$oral->save();
		return view('project.oral.show')->withOral(Oral::find($id));
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
