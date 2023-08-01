<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\About;
use Auth;

class AboutController extends Controller
{
	public function index() {
		return view('back-end.about.view');
	}
}
