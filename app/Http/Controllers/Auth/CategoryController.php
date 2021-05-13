<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
    	var_dump(Auth::user());
    	return'Category List';
    }

    public function View(Request $request)
    {
    	return'View category List';
    }

}
