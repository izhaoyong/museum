<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Book;
use File;
use Redirect,Input,Auth;

class BookController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('admin.book.index')->withBooks(Book::paginate(20));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.book.create');
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
			'introduction' => 'required',
		]);

		$book = Book::create([]);
		if($request->file('fengmian')){
			$fengmian = 'f'.$book->id . '.' . 
		   $request->file('fengmian')->getClientOriginalExtension();
		  $request->file('fengmian')->move( base_path().'/public/content/book/fengmian/', $fengmian);
		  File::copy( base_path().'/public/content/book/fengmian/'.$fengmian,
		  	base_path().'/public/content/book/thumbnails/fengmian/'.$fengmian);
		  // $book->fengmian = "fengmian/".$fengmian;
		}

		if($request->file('mulu')){
			$mulu = 'm'.$book->id . '.' .
				$request->file('mulu')->getClientOriginalExtension();
			$request->file('mulu')->move( base_path().'/public/content/book/mulu/', $mulu);
			// File::copy( base_path().'/public/content/book/thumbnails/mulu/'.$mulu,
		 //  	base_path().'/public/content/book/thumbnails/mulu/'.$mulu);
			// $book->mulu = "mulu/".$mulu;
		}
		$book->fengmian = Input::get('fengmian');
		$book->mulu = Input::get('mulu');
		$book->type = Input::get('type');
		$book->title = Input::get('title');
		$book->author = Input::get('author');
		$book->edition = Input::get('edition');
		$book->publisher = Input::get('publisher');
		$book->introduction = Input::get('introduction');
		$book->note = Input::get('note');
		$book->user_id = Auth::user()->id;

		if ($book->save()) {
			return Redirect::to('admin/book');
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
		return view('project.book.show')->withBook(Book::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.book.edit')->withBook(Book::find($id));
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
			'title' => 'required|max:255',
			'introduction' => 'required',
		]);

		$book = book::find($id);

		if($request->file('fengmian')){
			$fengmian = 'f'.$book->id . '.' . 
		   $request->file('fengmian')->getClientOriginalExtension();
		  $request->file('fengmian')->move( base_path().'/public/content/book/fengmian/', $fengmian);
		  File::copy( base_path().'/public/content/book/fengmian/'.$fengmian,
		  	base_path().'/public/content/book/thumbnails/fengmian/'.$fengmian);
		  // $book->fengmian = "fengmian/".$fengmian;
		}
		if($request->file('mulu')){
			$mulu = 'm'.$book->id . '.' .
				$request->file('mulu')->getClientOriginalExtension();
			$request->file('mulu')->move( base_path().'/public/content/book/mulu/', $mulu);
			// File::copy( base_path().'/public/content/book/thumbnails/mulu/'.$mulu,
		 //  	base_path().'/public/content/book/thumbnails/mulu/'.$mulu);
			// $book->mulu = "mulu/".$mulu;
		}
		// if($request->file('pdf')){
		// 	$pdf = "pdf\/".$book->id . '.' .
		// 	$request->file('pdf')->getClientOriginalExtension();
		// }
		$book->fengmian = Input::get('fengmian');
		$book->mulu = Input::get('mulu');
		$book->type = Input::get('type');
		$book->title = Input::get('title');
		$book->author = Input::get('author');
		$book->edition = Input::get('edition');
		$book->publisher = Input::get('publisher');
		$book->introduction = Input::get('introduction');
		$book->note = Input::get('note');

		// $book->pdf = $pdf;
		$book->user_id = Auth::user()->id;

		
		
		// $request->file('pdf')->move(asset('content/book\/'), $pdf);

		if ($book->save()) {
			return Redirect::to('admin/book');
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
		$book = book::find($id);
		$book->delete();

		return Redirect::to('admin/book');
	}

}
