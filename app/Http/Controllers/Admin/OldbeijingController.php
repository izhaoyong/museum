<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Oldbeijing;
use Redirect,Input,Auth;

class OldbeijingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('admin.oldbeijing.index')->withOldbeijings(Oldbeijing::paginate(20));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.oldbeijing.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'entry' => 'required|unique:oldbeijings|max:255',
			'interpretation' => 'required',
		]);

		$oldbeijing= Oldbeijing::create([]);
		if($request->file('picture')){
			$picture = $oldbeijing->id . '.' .
				$request->file('picture')->getClientOriginalExtension();
		  $request->file('picture')->move( base_path().'/public/content/oldbeijing/image/', $picture);
		  // File::copy( base_path().'/public/content/oldbeijing/picture/'.$picture,
		  // 	base_path().'/public/content/oldbeijing/thumbnails/picture/'.$picture);
		  // $oldbeijing->item_id = $oldbeijing->id;
		}
		if($request->file('sound')){
			$sound = $oldbeijing->id . '.' .
				$request->file('sound')->getClientOriginalExtension();
			$request->file('sound')->move( base_path().'/public/content/oldbeijing/sound/', $sound);
			// $oldbeijing->item_id = $oldbeijing->id;
		}
		$oldbeijing->item_id = Input::get('item_id');
		$oldbeijing->entry = Input::get('entry');
		$oldbeijing->beijing_entry = Input::get('beijing_entry');
		$oldbeijing->category = Input::get('category');
		$oldbeijing->interpretation = Input::get('interpretation');
		$page_id = intval($oldbeijing->id / 20)+1;
		if ($oldbeijing->save()) {
			// return Redirect::to('admin/oldbeijing');
			return Redirect::to('admin/oldbeijing/?page='.$page_id);
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
		return view('project.oldbeijing.show')->withOldbeijing(Oldbeijing::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.oldbeijing.edit')->withOldbeijing(Oldbeijing::find($id));
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
			'entry' => 'required|unique:oldbeijings,entry,'.$id.'|max:255',
			'interpretation' => 'required',
		]);

		$oldbeijing = oldbeijing::find($id);

		if($request->file('picture')){
			$picture = $oldbeijing->id . '.' .
				$request->file('picture')->getClientOriginalExtension();;
		  $request->file('picture')->move( base_path().'/public/content/oldbeijing/image/', $picture);
		  // File::copy( base_path().'/public/content/oldbeijing/picture/'.$picture,
		  // 	base_path().'/public/content/oldbeijing/thumbnails/picture/'.$picture);
		  // $oldbeijing->item_id = $oldbeijing->id;
		}
		if($request->file('sound')){
			$sound = $oldbeijing->id . '.' .
				$request->file('sound')->getClientOriginalExtension();
			$request->file('sound')->move( base_path().'/public/content/oldbeijing/sound/', $sound);
			// $oldbeijing->item_id = $oldbeijing->id;
		}
		$oldbeijing->item_id = Input::get('item_id');
		$oldbeijing->entry = Input::get('entry');
		$oldbeijing->beijing_entry = Input::get('beijing_entry');
		$oldbeijing->pronunciation = Input::get('pronunciation');
		$oldbeijing->category = Input::get('category');
		$oldbeijing->interpretation = Input::get('interpretation');

		$oldbeijing->user_id = Auth::user()->id;
		$page_id = intval($oldbeijing->id / 20)+1;
		if ($oldbeijing->save()) {
			// return Redirect::to('admin/oldbeijing');
			return Redirect::to('admin/oldbeijing/?page='.$page_id);
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
		$oldbeijing = oldbeijing::find($id);
		$oldbeijing->delete();

		return Redirect::to('admin/oldbeijing');
	}

}