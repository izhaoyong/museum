<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Oral;
use Redirect,Input,Auth;
class OralController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('admin.oral.index')->withOrals(Oral::paginate(20));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.oral.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:orals|max:255',
			'video' => 'required',
			'speaker' => 'required',
		]);

		$oral = new Oral;

		if($request->file('picture')){
			$picture = Input::get('video') . '.' .
				$request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/oral/picture/'.Input::get('speaker').'/', $picture);
		}
		if($request->file('xmlfile')){
			$xmlfile = Input::get('xml') . '.' .
				$request->file('xmlfile')->getClientOriginalExtension();
			$request->file('xmlfile')->move( base_path().'/public/content/oral/xml/'.Input::get('speaker').'/', $xmlfile);
		}
		if($request->file('videofile')){
			$videofile = Input::get('video') . '.' .
				$request->file('videofile')->getClientOriginalExtension();
			// if(!is_dir(public_path().'/content/oral/subtitle/'.Input::get('speaker').'/')){
			// 	mkdir(public_path().'/content/oral/subtitle/'.Input::get('speaker').'/');
			// }
			$request->file('videofile')->move( base_path().'/public/content/oral/video/'.Input::get('speaker').'/', $videofile);
		}
		$oral->speaker = Input::get('speaker');
		$oral->name = Input::get('name');
		$oral->video = Input::get('video');
		$oral->xml = Input::get('xml');
		$oral->content = Input::get('content');

		$oral->user_id = Auth::user()->id;

		if ($oral->save()) {
			return Redirect::to('admin/oral');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
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
		return view('admin.oral.edit')->withOral(Oral::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'name' => 'required|unique:orals,name,'.$id.'|max:255',
			'video' => 'required',
		]);

		$oral = oral::find($id);

		if($request->file('picture')){
			$picture = Input::get('video') . '.' .
				$request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/oral/picture/'.$oral->speaker.'/', $picture);
		}
		if($request->file('xmlfile')){
			$xmlfile = Input::get('xml') . '.' .
				$request->file('xmlfile')->getClientOriginalExtension();
			$request->file('xmlfile')->move( base_path().'/public/content/oral/xml/'.$oral->speaker.'/', $xmlfile);
		}
		if($request->file('videofile')){
			$videofile = Input::get('video') . '.' .
				$request->file('videofile')->getClientOriginalExtension();
			$request->file('videofile')->move( base_path().'/public/content/oral/video/'.$oral->speaker.'/', $videofile);
		}

		$oral->name = Input::get('name');
		$oral->video = Input::get('video');
		$oral->xml = Input::get('xml');
		$oral->speaker = Input::get('speaker');
		$oral->content = Input::get('content');
		$oral->user_id = Auth::user()->id;

		

		if ($oral->save()) {
			return Redirect::to('admin/oral');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$oral = oral::find($id);
		$oral->delete();

		return Redirect::to('admin/oral');
	}

}