<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Place;
use Redirect,Input,Auth;

class PlaceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('admin.place.index')->withPlaces(Place::paginate(20));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.place.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:places|max:255',
			'description' => 'required',
		]);

		$place = Place::create(['name'=>Input::get('name')]);
		if($request->file('jiedao')){
			$jiedao = $place->name . '.' . 
		   $request->file('jiedao')->getClientOriginalExtension();
		  $request->file('jiedao')->move( base_path().'/public/content/place/', $jiedao);
		}

		if($request->file('jiepai')){
			$jiepai = $place->name . '街牌.' .
				$request->file('jiepai')->getClientOriginalExtension();
			$request->file('jiepai')->move( base_path().'/public/content/place/', $jiepai);
			// $place->jiepai = "jiepai/".$jiepai;
		}
		
		$place->region = Input::get('region');
		$place->mandarin = Input::get('mandarin');
		$place->beijing = Input::get('beijing');
		$place->traditional = Input::get('traditional');
		$place->description = Input::get('description');
		$place->explaination = Input::get('explaination');
		$place->user_id = Auth::user()->id;

		if ($place->save()) {
			return Redirect::to('admin/place');
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
		return view('project.place.show')->withPlace(Place::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.place.edit')->withPlace(Place::find($id));
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
			'name' => 'required|unique:places,name,'.$id.'|max:255',
			'description' => 'required',
		]);

		$place = place::find($id);
		
		$place->name = Input::get('name');
		if($request->file('jiedao')){
			$jiedao = Input::get('name') . '.' . 
		   $request->file('jiedao')->getClientOriginalExtension();
		  $request->file('jiedao')->move( base_path().'/public/content/place/', $jiedao);
		}

		if($request->file('jiepai')){
			$jiepai = Input::get('name') . '街牌.' .
				$request->file('jiepai')->getClientOriginalExtension();
			$request->file('jiepai')->move( base_path().'/public/content/place/', $jiepai);
			// $place->jiepai = "jiepai/".$jiepai;
		}
		
		$place->region = Input::get('region');
		$place->mandarin = Input::get('mandarin');
		$place->beijing = Input::get('beijing');
		$place->traditional = Input::get('traditional');
		$place->description = Input::get('description');
		$place->explaination = Input::get('explaination');
		$place->user_id = Auth::user()->id;

		if ($place->save()) {
			return Redirect::to('admin/place');
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
		$place = place::find($id);
		$place->delete();

		return Redirect::to('admin/place');
	}

}