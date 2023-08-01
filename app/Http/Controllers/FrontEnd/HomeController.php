<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models\Gallery;
use App\Models\News;
use Auth;
use File;

class HomeController extends Controller
{

	public function index() {

   	$data = DB::table('gallery')
		->orderBy('created_at', 'desc')
		->get();

		$news = DB::table('news')
		->orderBy('created_at', 'desc')
		->limit(4)
		->get();

		return view('front-end.index')->with(['data' => $data, 'news' => $news]);
	}
}
