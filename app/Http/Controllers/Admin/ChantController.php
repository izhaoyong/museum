<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Chant;
use Redirect,Input,Auth;
class ChantController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.chant.index')->withChants(Chant::paginate(20));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return m_responsekeys(conn, identifier)
	 */
	public function create()
	{
		return view('admin.chant.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			// 'author' => 'required'
		]);
		$chant = new Chant;
		$media = pathinfo(Input::get('media'), PATHINFO_FILENAME);
		if($request->file('picture')){
			$picture = $media . '.' .
				$request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/chant/'.Input::get('category').'/', $picture);
		}
		if($request->file('scriptfile')){
			$scriptfile = Input::get('script');
			$request->file('scriptfile')->move( base_path().'/public/content/chant/'.Input::get('category').'/', $scriptfile);
		}
		if($request->file('mediafile')){
			$mediafile = Input::get('media');
			$request->file('mediafile')->move( base_path().'/public/content/chant/'.Input::get('category').'/', $mediafile);
		}

		$chant->title = Input::get('title');
		$chant->author = Input::get('author');
		$chant->media = Input::get('media');
		$chant->script = Input::get('script');
		$chant->content = Input::get('content');
		$chant->description = Input::get('description');
		// $chant->media_class = Input::get('media_class');
		$chant->category = Input::get('category');
		$chant->chanter = Input::get('chanter');
		$page_id = intval($chant->id / 20)+1;
		if($chant->save()) {
			// return Redirect::to('admin/chant');
			return Redirect::to('admin/chant/?page='.$page_id);
		}else {
			return Redirect::back()->withInput() ->withErrors('save fail');
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
		return view('admin.chant.edit')->withChant(Chant::find($id));
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
			'title' => 'required|unique:chants,title,'.$id.'|max:255',
		]);

		$chant = chant::find($id);
		$media = pathinfo(Input::get('media'), PATHINFO_FILENAME);
		if($request->file('picture')){
			$picture = $media . '.' .
				$request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/chant/picture/'.Input::get('category').'/', $picture);
		}
		if($request->file('scriptfile')){
			$scriptfile = Input::get('script');
			$request->file('scriptfile')->move( base_path().'/public/content/chant/'.Input::get('category').'/', $scriptfile);
		}
		if($request->file('mediafile')){
			$mediafile = Input::get('media');
			$request->file('mediafile')->move( base_path().'/public/content/chant/'.Input::get('category').'/', $mediafile);
		}

		$chant->title = Input::get('title');
		$chant->author = Input::get('author');
		$chant->media = Input::get('media');
		$chant->script = Input::get('script');
		$chant->content = Input::get('content');
		$chant->description = Input::get('description');
		// $chant->media_class = Input::get('media_class');
		$chant->category = Input::get('category');
		$chant->chanter = Input::get('chanter');
		$chant->user_id = Auth::user()->id;
		$page_id = intval($chant->id / 20)+1;
		if ($chant->save()) {
			// return Redirect::to('admin/chant');
			return Redirect::to('admin/chant/?page='.$page_id);
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
		$chant = chant::find($id);
		$chant->delete();

		return Redirect::to('admin/chant');
	}

}
