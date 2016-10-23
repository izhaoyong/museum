<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\English;
use Redirect,Input,Auth;

class EnglishController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('admin.english.index')->withEnglishes(English::paginate(20));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.english.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'content' => 'required|unique:englishes|max:255',
			'function' => 'required',
		]);

		$english = English::create([]);
		if($request->file('picture')){
			$picture = $english->id . '.' .
				$request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/english/picture/', $picture);
		}
		$english->picture = Input::get('picture_id');
		$english->content = Input::get('content');
		$english->function = Input::get('function');
		$english->category1 = Input::get('category1');
		$english->category2 = Input::get('category2');
		$english->recording_date = Input::get('recording_date');
		$english->recorder = Input::get('recorder');
		$english->commentator = Input::get('commentator');
		$english->place = Input::get('place');

		$english->user_id = Auth::user()->id;



		if ($english->save()) {
			return Redirect::to('admin/english');
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
		return view('project.english.show')->withEnglish(English::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.english.edit')->withEnglish(English::find($id));
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
			'content' => 'required',
			'function' => 'required',
		]);

		$english = english::find($id);
		if($request->file('picture')){
			$picture = $english->id . '.' .
				$request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/english/picture/', $picture);
		}
		$english->picture = Input::get('picture_id');
		$english->content = Input::get('content');
		$english->function = Input::get('function');
		$english->category1 = Input::get('category1');
		$english->category2 = Input::get('category2');
		$english->recording_date = Input::get('recording_date');
		$english->recorder = Input::get('recorder');
		$english->commentator = Input::get('commentator');
		$english->place = Input::get('place');
		$english->user_id = Auth::user()->id;

		if ($english->save()) {
			return Redirect::to('admin/english');
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
		$english = english::find($id);
		$english->delete();

		return Redirect::to('admin/english');
	}

}
