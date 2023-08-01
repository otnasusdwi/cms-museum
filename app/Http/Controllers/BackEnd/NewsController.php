<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\User;
use App\Models\News;
use Auth;
use File;


class NewsController extends Controller
{
	public function index() {

		$data = DB::table('news')
		->orderBy('created_at', 'desc')
		->get();

		return view('back-end.news.view')->with(['data' => $data]);
	}

	public function add()
	{
		return view('back-end.news.add');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'judul' => 'required',
			'keterangan' => 'required',
		]);

		$news = new News();
		$news->judul = $request->judul;
		$news->keterangan = $request->keterangan;

		if (empty($request->file('photo'))) {
			$news->photo = '';
		} else {
			$photo = 'News_'.str_replace(' ', '_', $request->judul).'_'.time().
			'.'.$request->file('photo')->getClientOriginalExtension();

			$photo_destination = base_path().'/public/foto/news';

			$request->file('photo')->move($photo_destination, $photo);
			$news->photo = $photo;
		}

		$news->save();

		return redirect('/admin/news')->with('alert', 'Data Berhasil Disimpan');
	}

	public function edit($id)
	{
		$data =  DB::table('news')
		->where('id', '=', $id)
		->first();

		return view('back-end.news.edit')->with(['data' => $data]);
	}

	public function update(Request $request)
	{
		$this->validate($request, [
			'id' => 'required',
			'judul' => 'required',
			'keterangan' => 'required',
		]);

		$data = array(
			'judul' => $request->judul,
			'keterangan' => $request->keterangan,
		);		

		if ($request->file('photo')) {

			$news = News::where('id', $request->id)->first();
			File::delete(base_path().'/public/foto/news/' . $news->photo);

			$file = $request->file('photo');

			$photo = 'News_'.str_replace(' ', '_', $request->judul).'_'.time().
			'.'.$request->file('photo')->getClientOriginalExtension();

			$photo_destination = base_path().'/public/foto/news';

			$request->file('photo')->move($photo_destination, $photo);
			$data['photo'] = $photo;
		}

		$update = DB::table('news')->where('id', $request->id)->update($data);

		if ($update) {
			return redirect('/admin/news')->with('alert', 'Data Berhasil Diupdate');
		}
	}

	public function delete($id)
	{
		$news = News::where('id',$id)->first();

		File::delete(base_path().'/public/foto/news/' . $news->photo);

		$delete = DB::table('news')->where('id', $id)->delete();

		if ($delete) {
			return redirect('/admin/news')->with('alert', 'Data Berhasil Dihapus');
		}
	}
}
