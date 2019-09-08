<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index() {
    	$page_name = 'dashboard';
    	return view('admin.dashboard',compact('page_name'));
    }
}
