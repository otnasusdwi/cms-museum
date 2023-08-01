<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models\About;
use Auth;
use File;

class AboutController extends Controller
{
   public function index() {
		$data = DB::table('about')
		->where('id', '=' , 1)
		->first();

		return view('front-end.about')->with(['data' => $data]);
	}
}
