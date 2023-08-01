<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DB;
use App\User;
use App\Models\Gallery;
use Auth;
use File;

class GalleryController extends Controller
{
   public function index() {

		$data = DB::table('gallery')
		->orderBy('created_at', 'desc')
		->get();

		return view('back-end.gallery.view')->with(['data' => $data]);
	}

	public function add()
	{
		return view('back-end.gallery.add');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'judul' => 'required',
			'keterangan' => 'required',
		]);

		$gallery = new Gallery();
		$gallery->judul = $request->judul;
		$gallery->keterangan = $request->keterangan;

		if (empty($request->file('photo'))) {
			$gallery->photo = '';
		} else {
			$photo = 'gallery_'.str_replace(' ', '_', $request->judul).'_'.time().
			'.'.$request->file('photo')->getClientOriginalExtension();

			$photo_destination = base_path().'/public/foto/gallery';

			$request->file('photo')->move($photo_destination, $photo);
			$gallery->photo = $photo;
		}

		$gallery->save();

		return redirect('/admin/gallery')->with('alert', 'Data Berhasil Disimpan');
	}

	public function edit($id)
	{
		$data =  DB::table('gallery')
		->where('id', '=', $id)
		->first();

		return view('back-end.gallery.edit')->with(['data' => $data]);
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

			$gallery = Gallery::where('id', $request->id)->first();
			File::delete(base_path().'/public/foto/gallery/' . $gallery->photo);

			$file = $request->file('photo');

			$photo = 'gallery_'.str_replace(' ', '_', $request->judul).'_'.time().
			'.'.$request->file('photo')->getClientOriginalExtension();

			$photo_destination = base_path().'/public/foto/gallery';

			$request->file('photo')->move($photo_destination, $photo);
			$data['photo'] = $photo;
		}

		$update = DB::table('gallery')->where('id', $request->id)->update($data);

		if ($update) {
			return redirect('/admin/gallery')->with('alert', 'Data Berhasil Diupdate');
		}
	}

	public function delete($id)
	{
		$gallery = Gallery::where('id',$id)->first();

		File::delete(base_path().'/public/foto/gallery/' . $gallery->photo);

		$delete = DB::table('gallery')->where('id', $id)->delete();

		if ($delete) {
			return redirect('/admin/gallery')->with('alert', 'Data Berhasil Dihapus');
		}
	}
}
