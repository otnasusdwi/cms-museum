<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
		->limit(4)
		->get();

		return view('front-end.news')->with(['data' => $data]);
	}

	public function detail($id)
	{
		$data =  DB::table('news')
		->where('id', '=', $id)
		->first();

		return view('front-end.detailnews')->with(['data' => $data]);
	}
}
