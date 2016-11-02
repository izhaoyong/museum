<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Poem;
use Redirect,Input,Auth;

class poemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('admin.poem.index')->withPoems(Poem::paginate(20));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.poem.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			// 'title' => 'required|unique:poems|max:255',
			'content' => 'required',
		]);

		$poem = Poem::create([]);
		if($request->file('picture')){
			$picture = $poem->id . '.' . 
		   $request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/poem/image/', $picture);
		  // $poem->picture = "picture/".$picture;

		}
		$poem->picture = Input::get('picture_name');
		$poem->title = Input::get('title');
		$poem->content = Input::get('content');
		$poem->comment = Input::get('comment');
		$poem->year = Input::get('year');
		$poem->author = Input::get('author');
		$poem->category = Input::get('category');
		$poem->user_id = Auth::user()->id;
		$page_id = intval($poem->id / 20)+1;
		if ($poem->save()) {
			// return Redirect::to('admin/poem');
			return Redirect::to('admin/poem/?page='.$page_id);
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
		return view('project.poem.show')->withPoem(Poem::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.poem.edit')->withPoem(Poem::find($id));
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
			// 'title' => 'required|unique:poems,title,'.$id.'|max:255',
			'content' => 'required',
		]);

		$poem = poem::find($id);
		if($request->file('picture')){
			$picture = $poem->id . '.' . 
		   $request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/poem/image/', $picture);
		  // $poem->picture = "picture/".$picture;

		}
		$poem->picture = Input::get('picture_name');
		$poem->title = Input::get('title');
		$poem->content = Input::get('content');
		$poem->comment = Input::get('comment');
		$poem->year = Input::get('year');
		$poem->author = Input::get('author');
		$poem->category = Input::get('category');
		$poem->user_id = Auth::user()->id;
		$page_id = intval($poem->id / 20)+1;
		if ($poem->save()) {
			// return Redirect::to('admin/poem');
			return Redirect::to('admin/poem/?page='.$page_id);
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
		$poem = poem::find($id);
		$poem->delete();

		return Redirect::to('admin/poem');
	}

}