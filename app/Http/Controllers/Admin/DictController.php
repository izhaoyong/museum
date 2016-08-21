<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Dict;
use Redirect,Input,Auth;

class DictController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('admin.dict.index')->withDicts(Dict::paginate(20));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.dict.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'entry' => 'required|unique:dicts|max:255',
			// 'interpretation' => 'required',
		]);

		$dict= Dict::create([]);
		if($request->file('picture')){
			$picture = $dict->id . '.' .
				$request->file('picture')->getClientOriginalExtension();;
		  $request->file('picture')->move( base_path().'/public/content/dict/image/', $picture);
		  // File::copy( base_path().'/public/content/dict/picture/'.$picture,
		  // 	base_path().'/public/content/dict/thumbnails/picture/'.$picture);
		  $dict->dict_id = $dict->id;
		}
		if($request->file('sound')){
			$sound = $dict->id . '.' .
				$request->file('sound')->getClientOriginalExtension();
			$request->file('sound')->move( base_path().'/public/content/dict/sound/', $sound);
			$dict->dict_id = $dict->id;
		}

		$dict->entry = Input::get('entry');
		$dict->beijing_entry = Input::get('beijing_entry');
		$dict->category = Input::get('category');
		$dict->interpretation = Input::get('interpretation');

		$dict->user_id = Auth::user()->id;

		if ($dict->save()) {
			return Redirect::to('admin/dict');
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
		return view('project.dict.show')->withDict(Dict::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.dict.edit')->withDict(Dict::find($id));
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
			'entry' => 'required|unique:dicts,entry,'.$id.'|max:255',
			'interpretation' => 'required',
		]);

		$dict = dict::find($id);

		if($request->file('picture')){
			$picture = $dict->id . '.' .
				$request->file('picture')->getClientOriginalExtension();;
		  $request->file('picture')->move( base_path().'/public/content/dict/image/', $picture);
		  // File::copy( base_path().'/public/content/dict/picture/'.$picture,
		  // 	base_path().'/public/content/dict/thumbnails/picture/'.$picture);
		  $dict->dict_id = $dict->id;
		}
		if($request->file('sound')){
			$sound = $dict->id . '.' .
				$request->file('sound')->getClientOriginalExtension();
			$request->file('sound')->move( base_path().'/public/content/dict/sound/', $sound);
			$dict->dict_id = $dict->id;
		}

		$dict->entry = Input::get('entry');
		$dict->beijing_entry = Input::get('beijing_entry');
		$dict->pronunciation = Input::get('pronunciation');
		$dict->category = Input::get('category');
		$dict->interpretation = Input::get('interpretation');

		$dict->user_id = Auth::user()->id;

		if ($dict->save()) {
			return Redirect::to('admin/dict');
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
		$dict = dict::find($id);
		$dict->delete();

		return Redirect::to('admin/dict');
	}

}
